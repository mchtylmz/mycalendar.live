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
    /**
     * @var int
     */
    private $per_page;

    public function __construct()
	{
		$this->event = new EventsModel();
		$this->event_subscriber = new EventSubscriberModel();
		$this->event_message = new EventMessageModel();
		$this->per_page = 12;
	}

    public function index(string $slug, int $event_id)
    {
        $data['FixedTopNav'] = true;
        $data['event'] = $this->findEvent($slug, $event_id);
        $data['PageTitle'] = $data['event']->title;

        return view('event/detail/index', $data);
    }

    public function messages(string $slug, int $event_id)
    {
        $data['FixedTopNav'] = true;
        $data['event'] = $this->findEvent($slug, $event_id);
        $data['PageTitle'] = 'Mesajlar - '. $data['event']->title;

        $data['messages'] = $this->event_message
            ->where('event_id', $data['event']->id)
            ->orderBy('created_at', 'DESC')
            ->paginate($this->per_page);
        $data['pager'] = $this->event_message->pager;

        return view('event/detail/messages', $data);
    }

    public function users(string $slug, int $event_id)
    {
        $data['FixedTopNav'] = true;
        $data['event'] = $this->findEvent($slug, $event_id);
        $data['PageTitle'] = 'Üyeler - ' . $data['event']->title;

        $data['Subscribers'] = $this->event_subscriber
            ->where('event_id', $data['event']->id)
            ->orderBy('request_subscribe', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->paginate($this->per_page);
        $data['pager'] = $this->event_subscriber->pager;

        return view('event/detail/users', $data);
    }

    public function requestPost(string $slug, int $event_id)
    {
        post_method();

        $event = $this->findEvent($slug, $event_id);

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
            // Notifications
            if ($action == 'left_by_owner') {
                $message = "{$event->title} etkinliğinden çıkarıldınız!.";
                notification()->send([
                    'user_id' => $user_id,
                    'message' => $message,
                    'link' => $event->getRoute('users')
                ]);
            }
            // succcess
            return redirect()->back()->with('success', lang('Event.subscribe.left'));
        }

        $new_data = [
            'event_id' => $event->id,
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
            // Notifications
            $message = auth_user()->fullname . " üyesi {$event->title} etkinliğinize ";
            if ($event->subscribe_status)
                $message .= " katılıyor.";
            else
                $message .= " katılma talebi gönderdi.";
            notification()->send([
                'user_id' => $event->owner->id,
                'message' => $message,
                'link' => $event->getRoute('users')
            ]);
            // success join
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
            // Notifications
            $message = "{$event->title} etkinliğinize katılma talebiniz onaylandı";
            notification()->send([
                'user_id' => $new_data['user_id'],
                'message' => $message,
                'link' => $event->getRoute('users')
            ]);
            // succcess
            return redirect()->back()->with('success', lang('Event.subscribe.join'));
        }

        // error
        return redirect()->back()->with('error', lang('Event.subscribe.error'));
    }

    public function messagePost(string $slug, int $event_id)
    {
        post_method();

        $event = $this->findEvent($slug, $event_id);

        // Delete
        if ($message_id = clean_number($this->request->getPost('comment_id'))) {
            if (auth_user()->id != $event->owner->id) {
                return redirect()->back()->with('error', lang('Event.message.delete_error'));
            }
            $delete = $this->event_message
                ->where('event_id', $event->id)
                ->where('message_id', $message_id)
                ->delete();
            if (!$delete) {
                return redirect()->back()->with('error', lang('Event.message.delete_error'));
            }
            return redirect()->back()->with('success', lang('Event.message.delete_success'));
        }

        // New Message
        $new_data = [
            'event_id' => $event->id,
            'user_id'  => auth_user()->id,
            'message'  => clean_string($this->request->getPost('comment'))
        ];
        try {
            if (!$this->event_message->save($new_data))
                throw new Exception(lang('Event.message.error'));
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        $message = auth_user()->fullname . " üyesinden {$event->title} etkinliği için yeni mesajınız var!.";
        notification()->send([
            'user_id' => $event->owner->id,
            'message' => $message,
            'link' => $event->getRoute('messages')
        ]);

        // success
        return redirect()->back()->with('success', lang('Event.message.success'));
    }

    private function findEvent(string $slug, int $event_id): object
    {
        $eventDetail = myCache("eventDetail_{$slug}_{$event_id}", function () use ($slug, $event_id) {
            return $this->event
                ->where('slug', clean_string($slug))
                ->where('id', clean_number($event_id))
                ->first();
        });

        // Not found
        if (!$eventDetail) {
            show404();
        }

        // private
        if (!auth_check() && $eventDetail->status == '1') {
            session()->setFlashdata('error', 'Etkinliği görüntülemek için üye girişi yapılmalıdır!.');
            throw new \CodeIgniter\Router\Exceptions\RedirectException(route_to('auth.login'));
        }

        return $eventDetail;
    }
}
