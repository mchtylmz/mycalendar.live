<?php namespace App\Entities;

use CodeIgniter\Entity;
use Exception;
use \App\Models\UserModel;
use \App\Models\EventSubscriberModel;

class EventsEntity extends Entity
{
    public function getRoute(string $method = 'index')
    {
        return route_to("eventDetail.{$method}", $this->attributes['slug'], $this->attributes['id']);
    }

    public function getOwner()
    {
        return user($this->attributes['owner']);
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
        $event_id = $this->attributes['id'];
        return myCache("event_subscribe_count_{$event_id}", function () use($event_id) {
            return (new EventSubscriberModel())
                ->where('event_id', $event_id)
                ->countAllResults();
        });
    }

    public function isSubscriber(int $user_id = null)
    {
        $event_id = $this->attributes['id'];
        $user_id = $user_id ?? auth_user()->id;
        return myCache("event_isSubscribe_{$event_id}_user_{$user_id}", function () use ($event_id, $user_id) {
            $subscriber = (new EventSubscriberModel())
                ->select('request_subscribe')
                ->where('event_id', $event_id)
                ->where('user_id', $user_id)
                ->first();
            if (!$subscriber)
                return false;
            return $subscriber->request_subscribe;
        }, true);
    }

    public function isPast() : bool
    {
        return !(strtotime($this->attributes['start_datetime']) >= time());
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