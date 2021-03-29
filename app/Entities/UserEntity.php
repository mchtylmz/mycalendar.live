<?php

namespace App\Entities;

use CodeIgniter\Entity;
use \App\Models\EventsModel;

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
        $cache_name = "users_{$this->attributes['id']}_myevents_{$limit}";
        if (!auth_check())
            $cache_name .= "_guest";
        // is exists cache
        $events = cache($cache_name);
        if (!$events) {
            $events = $this->eventsModel(false)
                ->orderBy('start_datetime', 'DESC')
                ->findAll($limit);
            if ($events)
                cache()->save($cache_name, $events, 1800);
        } // not found
        return $events;
    }

    public function mySubscribers(int $limit = 4) : array
    {
        $cache_name = "users_{$this->attributes['id']}_mysubcribers_{$limit}";
        if (!auth_check())
            $cache_name .= "_guest";
        // is exists cache
        $events = cache($cache_name);
        if (!$events) {
            $events = $this->eventsModel(true, false)
                ->orderBy('start_datetime', 'DESC')
                ->findAll($limit);
            if ($events)
                cache()->save($cache_name, $events, 1800);
        } // not found
        return $events;
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
                       date('Y-m-d H:i:0', strtotime(($this->attributes['event_upcoming'] ?? 7) . ' days'))
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
        $cache_name = "users_{$this->attributes['id']}_notifications_{$limit}";
        // is exists cache
        $notifications = cache($cache_name);
        if (!$notifications) {
            $notifications = notification()
                ->where('user_id', $this->attributes['id'])
                ->where('is_read', '0')
                ->orderBy('is_read', 'DESC')
                ->findAll($limit);
            if ($notifications)
                cache()->save($cache_name, $notifications, 1800);
        } // not found
        return $notifications;
    }

    public function getNotificationCount()
    {
        $cache_name = "users_{$this->attributes['id']}_notificationcount";
        // is exists cache
        $notifications = cache($cache_name);
        if (!$notifications) {
            $notifications = notification()
                ->where('user_id', $this->attributes['id'])
                ->where('is_read', '0')
                ->countAllResults();
            if ($notifications)
                cache()->save($cache_name, $notifications, 1800);
        } // not found
        return $notifications;
    }

    protected function eventsModel(bool $subscriber = true, bool $owner = true): EventsModel
    {
        $eventsModel = (new EventsModel());
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
