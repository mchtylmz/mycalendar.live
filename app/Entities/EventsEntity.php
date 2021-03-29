<?php namespace App\Entities;

use CodeIgniter\Entity;
use Exception;
use \App\Models\UserModel;
use \App\Models\EventSubscriberModel;

class EventsEntity extends Entity
{
    public function getRoute()
    {
        return route_to('eventDetail.index', $this->attributes['slug'], $this->attributes['id']);
    }

    public function getOwner()
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

    public function getCategory()
    {
        return category('id', $this->attributes['category']);
    }

    public function getStartDate()
    {
        return turkish_long_date('d M', $this->attributes['start_datetime']);
    }

    public function getLongStartDate()
    {
        return turkish_long_date('d M, l', $this->attributes['start_datetime']);
    }

    public function getFullStartDate()
    {
        return turkish_long_date('l, j F Y', $this->attributes['start_datetime']);
    }

    public function getStartTime()
    {
        return date('H:i', strtotime($this->attributes['start_datetime']));
    }

    public function getEndDate()
    {
        return turkish_long_date('d M', $this->attributes['end_datetime']);
    }

    public function getLongEndDate()
    {
        return turkish_long_date('d M, l', $this->attributes['end_datetime']);
    }

    public function getFullEndDate()
    {
        return turkish_long_date('l, j F Y', $this->attributes['end_datetime']);
    }

    public function getEndTime()
    {
        return date('H:i', strtotime($this->attributes['end_datetime']));
    }

    public function getSubscriberCount()
    {
        $cache_name = "event_subscribe_count_{$this->attributes['id']}";
        // is exists cache
        $counts = cache($cache_name);
        if (!$counts) {
            $counts = (new EventSubscriberModel())->where('event_id', $this->attributes['id'])->countAllResults();
            if ($counts)
                cache()->save($cache_name, $counts, 1800);
        } // not found
        return $counts;
    }

    public function isSubscriber(int $user_id = null)
    {
        $subscriber = (new EventSubscriberModel())
            ->select('request_subscribe')
            ->where('event_id', $this->attributes['id'])
            ->where('user_id', $user_id ?? auth_user()->id)
            ->first();
        if (!$subscriber) return false;
        return $subscriber->request_subscribe;
    }

    public function getMapsLink(array $maps)
    {
        return anchor('https://www.google.com/maps/place/' . (trim($maps[0]) ?? '0,0'), 'Google Haritalar', [
            'title' => 'Google Haritalar',
            'target' => '_blank',
        ]);
    }

    public function getPhoneLink(string $phone)
    {
        return tel($phone, $phone, ['title' => $phone]);
    }

    public function getLink(string $link, string $key = 'site'): string
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
            case 'instagram':
                $uri = 'https://instagram.com/' . $link;
                $title = '@' . $link;
                break;
            case 'web':
                $uri = 'https://' . $link;
                $title = str_replace(
                    ['http', 'HTTPS', 'http', 'HTTP', 'www.', 'WWW.', '://'],
                    ['', '', '', '', '', '', ''],
                    $link
                );
                break;
            default:
                $uri = $this->getRoute();
        }
        return anchor($uri ?? $link, $title ?? $this->attributes['title'], [
            'title' => $title ?? $this->attributes['title'],
            'target' => '_blank',
        ]);
    }

    public function getLocation()
    {
        try {
            $location = $this->parseMeta();
            if ($location) {
                foreach (array_keys($location) as $key) :
                    $link = $this->parseMeta($key);
                    if ($link) return $link;
                endforeach;
            }
            return $this->getLink('detail');
        } catch (Exception $e) {
            return null;
        }
    }

    public function parseMeta(string $key = '')
    {
        try {
            $metas = json_decode($this->attributes['location'], true);
            if (!$key)
                return $metas;
            if (isset($metas[$key]) && $metas[$key]) :
                if ($key == 'maps') {
                    if (empty($metas['maps'][0])) return null;
                    return $this->getMapsLink($metas['maps']);
                }
                if ($key == 'phone') {
                    return $this->getPhoneLink($metas['phone']);
                }
                return $this->getLink($metas[$key], $key);
            endif;
            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    public function instagramTags()
    {
        try {
            $tags = explode(',', $this->attributes['tags']);
            if ($tags) {
                $instagramTags = [];
                foreach ($tags as $key => $tag) {
                    $tag = trim($tag);
                    $instagramTags[] = anchor("https://www.instagram.com/explore/tags/{$tag}", "#{$tag}", [
                        "title" => "#{$tag}",
                        "target" => "_blank",
                        "class" => "bg-secondary pt-1 pb-1 pl-2 pr-2 mb-2 d-inline-block"
                    ]);
                }
                return implode(' ', $instagramTags);
            }
            return $this->attributes['tags'];
        } catch (Exception $e) {
            return $this->attributes['tags'];
        }
    }

    public function edit(string $column)
    {
        return $this->original[$column];
    }


}