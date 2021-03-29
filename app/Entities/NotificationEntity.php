<?php namespace App\Entities;

use App\Models\UserModel;
use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class NotificationEntity extends Entity
{
    public function getUserId()
    {
        return user($this->attributes['user_id']);
    }

    public function getLink()
    {
        return site_url($this->attributes['link']);
    }

    public function getLongDate()
    {
        return turkish_long_date('j F, H:i', $this->attributes['created_at']);
    }

    public function getTimeAgo()
    {
        $time = Time::parse($this->attributes['created_at'], 'Europe/Istanbul', 'tr_TR');
        return $time->humanize();
    }
}