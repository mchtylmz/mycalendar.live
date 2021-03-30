<?php

namespace App\Entities;

use CodeIgniter\Entity;
use \App\Models\EventsModel;
use CodeIgniter\I18n\Time;

class UserEntity extends Entity
{
    public function getFullname()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    public function getPrivacyPhone(): bool
    {
        return $this->privacyStatus('phone_privacy');
    }

    public function getPrivacyWhatsapp(): bool
    {
        return $this->privacyStatus('wa_privacy');
    }

    public function getImage()
    {
        if ($this->attributes['image']) {
            return uploads_url($this->attributes['image']);
        }
        return get_gravatar($this->attributes['email']);
    }

    public function myEvents(int $limit = 4) : array
    {
        $user = $this->eventsModel(false);
        return myCache("users_{$this->attributes['id']}_myevents_{$limit}", function () use ($user, $limit) {
            return $user->orderBy('start_datetime', 'DESC')->findAll($limit);
        }, true);
    }

    public function mySubscribers(int $limit = 4) : array
    {
        $user = $this->eventsModel(true, false);
        return myCache("users_{$this->attributes['id']}_mysubcribers_{$limit}", function () use ($user, $limit) {
            return $user->orderBy('start_datetime', 'DESC')->findAll($limit);
        }, true);
    }

    public function getEvents(string $tab = 'all'): EventsModel
    {
       $events = $this->eventsModel(true, true);
       switch ($tab) {
           case 'upcoming':
               $events
                   ->where('start_datetime >=', date('Y-m-d H:i:0'))
                   ->where(
                       'start_datetime <=',
                       (new Time(($this->attributes['event_upcoming'] ?? 7) . ' days'))->toDateTimeString()
                   )
                   ->orderBy('start_datetime', 'ASC');
               break;
           case 'past':
               $events
                   ->where('start_datetime <=', date('Y-m-d H:i:0'))
                   ->orderBy('start_datetime', 'DESC');
               break;
           case 'waiting':
               $events
                   ->where('start_datetime >=', date('Y-m-d H:i:0'))
                   ->where('request_subscribe', '0')
                   ->orderBy('start_datetime', 'DESC');
               break;
           default:
               $events->orderBy('start_datetime', 'DESC');
       }
       return $events;
    }

    public function getNotifications(int $limit = 5)
    {
        $user_id = $this->attributes['id'];
        return myCache("users_{$user_id}_notifications_{$limit}", function () use ($user_id, $limit) {
            return notification()
                ->where('user_id', $user_id)
                ->where('is_read', '0')
                ->orderBy('is_read', 'DESC')
                ->findAll($limit);
        }, true);
    }

    public function getNotificationCount()
    {
        $user_id = $this->attributes['id'];
        return myCache("users_{$user_id}_notificationcount", function () use ($user_id) {
            return notification()
                ->where('user_id', $user_id)
                ->where('is_read', '0')
                ->countAllResults();
        });
    }

    protected function eventsModel(bool $subscriber = true, bool $owner = true): EventsModel
    {
        $eventsModel = new EventsModel();
        if ($subscriber && $owner) {
            $eventsModel->withSubscriber()
                ->groupStart()
                ->orWhere('user_id', $this->attributes['id'])
                ->orWhere('owner', $this->attributes['id'])
                ->groupEnd()
                ->groupBy('id');
        } elseif ($subscriber) {
            $eventsModel->withSubscriber()
                ->where('user_id', $this->attributes['id'])
                ->groupBy('id');
        } elseif ($owner) {
            $eventsModel->where('owner', $this->attributes['id']);
        }
        if (!auth_check())
            $eventsModel->where('status', '2');
        return $eventsModel;
    }

    protected function privacyStatus(string $column): bool
    {
        if ($this->attributes[$column] == '2')
            return true;
        if (auth_check() && $this->attributes[$column] == '1')
            return true;
        if (auth_check() && $this->attributes[$column] == '0' && $this->attributes['id'] == auth_user()->id)
            return true;
        return false;
    }
}
