<?php

namespace App\Controllers;

use \App\Models\EventsModel;
use \App\Models\EventMeta;
use \App\Models\EventMessageModel;
use Exception;

class Events extends BaseController
{
     /**
     * @var EventsModel
     */
    protected $event;

    /**
     * @var EventMeta
     */
    protected $event_meta;

    /**
     * @var EventMessageModel
     */
    protected $event_message;
    /**
     * @var int
     */
    private $perPage;

    public function __construct()
	{
		$this->event = new EventsModel();
		$this->event_meta = new EventMeta();
		$this->event_message = new EventMessageModel();
		$this->perPage = 9;
	}

	public function index()
	{
		$data['PageTitle'] = 'Etkinliklerim';

		$data['active_tab'] = '2';
		if ($this->request->getGet('page_all')) {
		    $data['active_tab'] = '1';
        } elseif ($this->request->getGet('page_pen')) {
            $data['active_tab'] = '3';
        } elseif ($this->request->getGet('page_past')) {
		    $data['active_tab'] = '4';
        }

		/*
		 * dd(
		    $this->event->join('event_meta', 'event_meta.event_id = events.id', 'LEFT')->findAll()
        );
		*/
        $data['events_all'] = $this->event
            ->where('owner', auth_user()->id)
            ->orderBy('id', 'DESC')
            ->paginate($this->perPage, 'all');

        $events_upcoming =  new EventsModel();
		$data['events_upcoming'] = $events_upcoming->paginate($this->perPage, 'up');
		/*
		 * $data['events_pendign'] = $this->event->paginate($this->perPage, 'pen');
		$data['events_past'] = $this->event->paginate($this->perPage, 'past');
		*/
		$data['pager'] = $this->event->pager;
		$data['pager_up'] = $events_upcoming->pager;

		return view('event/index', $data);
	}

	public function new()
	{
		$data['PageTitle'] = 'Yeni Etkinlik Oluştur';

		return view('event/new', $data);
	}

	public function newPost()
	{
	    post_method();

	    $getRule = $this->event->getRule('insert');
		$this->event->setValidationRules($getRule);

        $new_data = [
            'slug' => generate_permalink($this->request->getPost('title')),
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'owner' => auth_user()->id,
            'status' => intval($this->request->getPost('status') ?? 0),
            'location' => $this->request->getPost('location_id'),
            'location_text' => $this->request->getPost('location'),
            'message_status' => $this->request->getPost('message_status'),
            'subscribe_status' => $this->request->getPost('subscribe_status'),
            'start_date' => date('Y-m-d', strtotime($this->request->getPost('start_date'))),
            'end_date' => date('Y-m-d', strtotime($this->request->getPost('end_date'))),
            'start_time' => date('H:i', strtotime($this->request->getPost('start_time'))),
            'end_time' => date('H:i', strtotime($this->request->getPost('end_time'))),
        ];

		try {
            if (!$this->event->insert($new_data))
                return redirect()->back()->withInput()->with('errors', $this->event->errors());

            $meta_data = [
                'event_id' => $this->event->getInsertID(),
                'name'  => $this->request->getPost('location_id'),
                'value' => $this->request->getPost($this->request->getPost('location_id'))
            ];
            // maps
            if ($meta_data['name'] == 'maps') {
                $meta_data['value'] = serialize([
                    $this->request->getPost('latlng'),
                    $this->request->getPost('address')
                ]);
            }

            // meta insert
            if (!$this->event_meta->insert($meta_data))
                return redirect()->back()->withInput()->with('errors', $this->event->errors());
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        // success
        return redirect()->route('my.calendar')->with('success', lang('Event.save.success'));
	}

	public function edit(int $id)
	{
		$data['PageTitle'] = 'Etkinlik Düzenle';
		$event = $this->event->where('id', $id)->first();
		if (!$event) {
            return redirect()->back()->with('error', lang('Event.notFound'));
        }
		$data['event'] = $event;

		return view('event/edit', $data);
	}
}
