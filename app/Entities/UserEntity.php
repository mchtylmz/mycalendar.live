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
            $events = $this->eventsModel(false)->findAll($limit);
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
            $events = $this->eventsModel(true, false)->findAll($limit);
            if ($events)
                cache()->save($cache_name, $events, 1800);
        } // not found
        return $events;
    }

    protected function eventsModel(bool $subscriber = true, bool $owner = true): EventsModel
    {
        $eventsModel = (new EventsModel())
            ->orderBy('start_date', 'DESC')
            ->orderBy('start_time', 'ASC');
        if ($subscriber && $owner) {
            $eventsModel->withSubscriber()
                ->orWhere('user_id', $this->attributes['id'])
                ->orWhere('owner', $this->attributes['id']);
        } elseif ($subscriber) {
            $eventsModel->withSubscriber()->where('user_id', $this->attributes['id']);
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
