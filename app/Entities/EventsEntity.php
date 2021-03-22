<?php namespace App\Entities;

use CodeIgniter\Entity;

class EventsEntity extends Entity
{
    public function getStartDate()
    {
        return date('d M', strtotime($this->attributes['start_date']));
    }

    public function getStartTime()
    {
        return date('H:i', strtotime($this->attributes['start_time']));
    }

    public function getEndDate()
    {
        return date('d M', strtotime($this->attributes['end_date']));
    }

    public function getEndTime()
    {
        return date('H:i', strtotime($this->attributes['end_time']));
    }

    public function getLocation()
    {
        $event_meta = new \App\Models\EventMeta();
        $meta = $event_meta
            ->where('event_id', $this->attributes['id'])
            ->where('name', $this->attributes['location'])
            ->first();
        switch ($this->attributes['location']) {
            case 'meet':
                $meta_url = 'https://meet.google.com/';
                break;
            case 'zoom':
                $meta_url = 'https://zoom.us/j/';
                break;
            case 'youtube':
                $meta_url = 'https://youtube.com/';
                break;
            case 'twitch':
                $meta_url = 'https://twitch.tv/';
                break;
            case 'phone':
                return tel($meta->value, $this->attributes['location_text'], [
                    'title' => $this->attributes['location_text'],
                    'class' => 'text-dark'
                ]);
                break;
            case 'maps':
                $maps = unserialize($meta->value);
                return anchor('https://www.google.com/maps/place/' . $maps[0], $maps[1], [
                    'title' => $maps[1],
                    'target' => '_blank',
                    'class' => 'text-dark'
                ]);
                break;
        }
        return anchor(($meta_url ?? site_url()) . $meta->value, $this->attributes['location_text'], [
            'title' => $this->attributes['location_text'],
            'target' => '_blank',
            'class' => 'text-dark'
        ]);
    }
}
