<?php

namespace App\Controllers;

use \App\Models\EventsModel;
use App\Models\EventSubscriberModel;
use App\Models\EventMessageModel;
use Exception;

class EventDetail extends BaseController
{
    /**
     * @var EventsModel
     */
    protected $event;
    /**
     * @var EventSubscriberModel
     */
    protected $event_subscriber;
    /**
     * @var EventMessageModel
     */
    protected $event_message;

    public function __construct()
	{
		$this->event = new EventsModel();
		$this->event_subscriber = new EventSubscriberModel();
		$this->event_message = new EventMessageModel();
	}

    public function index(string $slug, int $event_id)
    {
        $data['FixedTopNav'] = true;

        if (!$data['event'] = $this->findEvent($slug, $event_id)) {
            dd('404');
        }

        $data['PageTitle'] = $data['event']->title;

        return view('event/detail/index', $data);
    }

    public function messages(string $slug, int $event_id)
    {
        d($slug);
        d($event_id);
        d('messages');
    }

    public function users(string $slug, int $event_id)
    {
        $data['FixedTopNav'] = true;

        if (!$data['event'] = $this->findEvent($slug, $event_id)) {
            dd('404');
        }

        $data['PageTitle'] = $data['event']->title;
        $data['Subscribers'] = $this->event_subscriber
            ->where('event_id', $data['event']->id)
            ->orderBy('request_subscribe', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->paginate('12');
        $data['pager'] = $this->event_subscriber->pager;

        return view('event/detail/users', $data);
    }

    public function requestPost(string $slug, int $event_id)
    {
        if (!$event = $this->findEvent($slug, $event_id)) {
            dd('404');
        }

        // cache
        cache()->clean();

        // action
        $action = clean_string($this->request->getPost('action'));

        // LEFT
        if ($action == 'left' || $action == 'left_by_owner') {
            $user_id = auth_user()->id;
            if ($action == 'left_by_owner') {
                $user_id = clean_number($this->request->getPost('user_id') ?? 0);
            }
            $delete = $this->event_subscriber
                ->where('event_id', $event->id)
                ->where('user_id', $user_id)
                ->delete();
            if (!$delete) {
                return redirect()->back()->with('error', lang('Event.subscribe.error'));
            }
            return redirect()->back()->with('success', lang('Event.subscribe.left'));
        }

        $new_data = [
            'event_id' => clean_number($event_id),
            'user_id' => auth_user()->id,
            'request_subscribe' => $event->subscribe_status
        ];
        // JOIN
        if ($action == 'join') {
            try {
                if (!$this->event_subscriber->save($new_data))
                    throw new Exception(lang('Event.subscribe.error'));
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
            return redirect()->back()->with('success', lang('Event.subscribe.join'));
        }

        // JOIN By Owner
        if ($action == 'join_by_owner') {
            try {
                $subscribe_id = clean_number($this->request->getPost('subscribe_id'));
                $new_data = [
                    'user_id' => clean_number($this->request->getPost('user_id') ?? 0),
                    'request_subscribe' => 1
                ];
                if (!$this->event_subscriber->update($subscribe_id, $new_data))
                    throw new Exception(lang('Event.subscribe.error'));
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
            return redirect()->back()->with('success', lang('Event.subscribe.join'));
        }

        // error
        return redirect()->back()->with('error', lang('Event.subscribe.error'));
    }

    private function findEvent(string $slug, int $event_id): object
    {
		$cache_name = "eventDetail_{$slug}_{$event_id}";
        // is exists cache
        $eventDetail = cache($cache_name);
        if (!$eventDetail) {
            $eventDetail = $this->event
                ->where('slug', clean_string($slug))
                ->where('id', clean_number($event_id))
                ->first();
            if ($eventDetail)
                cache()->save($cache_name, $eventDetail, 1800);
        } // not found
        return $eventDetail;
    }
}
