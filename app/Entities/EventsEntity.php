<?php namespace App\Entities;

use CodeIgniter\Entity;
use Exception;
use \App\Models\UserModel;

class EventsEntity extends Entity
{
    public function getUser()
    {
        $user_id = $this->attributes['owner'];
        $cache_name = "users_{$user_id}";
        // is exists cache
        $user = cache($cache_name);
        if (!$user) {
            $user = (new UserModel())->where('id', $user_id)->first();
            if ($user)
                cache()->save($cache_name, $user, 1800);
        } // not found
        return $user;
    }

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

    public function getMapsLink(array $maps)
    {
        return anchor('https://www.google.com/maps/place/' . (trim($maps[0]) ?? '0,0'), $maps[1] ?? 'Google Maps', [
            'title' => $maps[1] ?? 'Google Maps',
            'target' => '_blank',
        ]);
    }

    public function getPhoneLink(string $phone)
    {
        return tel($phone, $phone, ['title' => $phone]);
    }

    public function getUrl(string $link, string $key = 'site'): string
    {
        switch ($key) {
            case 'meet':
                $uri = 'https://meet.google.com/' . $link;
                $title = 'Google Meet';
                break;
            case 'youtube':
                $uri = 'https://youtube.com/' . $link;
                $title = 'Youtube';
                break;
            case 'zoom':
                $uri = 'https://zoom.us/j/' . $link;
                $title = 'Zoom';
                break;
            case 'twitch':
                $uri = 'https://twitch.tv/' . $link;
                $title = 'Twitch';
                break;
        }
        return anchor($uri ?? $link, $title ?? $this->attributes['title'], [
            'title' => $title ?? $this->attributes['title'],
            'target' => '_blank',
        ]);
    }

    public function getLocation(string $key = 'maps')
    {
        try {
            $location = json_decode($this->attributes['location'], true);
            if ($location && is_array($location)) {
                foreach (array_keys($location) as $key) :
                    if (isset($location[$key]) && $location[$key]) {
                        if ($key == 'maps') {
                            if (empty($location['maps'][0])) continue;
                            return $this->getMapsLink($location['maps']);
                        }
                        if ($key == 'phone') {
                            return $this->getPhoneLink($location['phone']);
                        }
                        return $this->getUrl($location[$key], $key);
                    }
                endforeach;
            }
            return $this->getUrl('site');
        } catch (Exception $e) {
            return null;
        }
    }
}