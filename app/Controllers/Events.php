<?php

namespace App\Controllers;

use \App\Models\EventsModel;
use \App\Models\EventMessageModel;
use App\Models\EventSubscriberModel;
use Exception;

class Events extends BaseController
{
     /**
     * @var EventsModel
     */
    protected $event;

    /**
     * @var EventMessageModel
     */
    protected $event_message;
    /**
     * @var int
     */
    protected $perPage;
    /**
     * @var EventSubscriberModel
     */
    protected $event_subscriber;

    public function __construct()
	{
		$this->event = new EventsModel();
		$this->event_message = new EventMessageModel();
		$this->event_subscriber = new EventSubscriberModel();
		$this->perPage = 6;
	}

	public function index()
	{
		$data['PageTitle'] = 'Etkinliklerim';
        $data['FixedTopNav'] = true;

		$data['active_tab'] = '2';
		if ($this->request->getGet('page_all')) {
		    $data['active_tab'] = '1';
        } elseif ($this->request->getGet('page_pen')) {
            $data['active_tab'] = '3';
        } elseif ($this->request->getGet('page_past')) {
		    $data['active_tab'] = '4';
        }

		$data['tabs'] = ['all', 'upcoming', 'waiting', 'past'];
        foreach ($data['tabs'] as $key => $value) {
            $event_model = auth_user()
                ->getEvents($value)
                ->search();
            $data['events'][$value] = $event_model->paginate($this->perPage, $value);
            $data['pages'][$value] = $event_model->pager;
        }

		return view('event/index', $data);
	}

	public function calendar()
	{
		$data['PageTitle'] = 'Etkinlik Takvimi';
		return view('event/calendar', $data);
	}

	public function new()
	{
		$data['PageTitle'] = 'Yeni Etkinlik Oluştur';
		return view('event/new', $data);
	}

	public function store($event_id = null)
	{
	    post_method();

	    $getRule = $this->event->getRule($event_id ? 'update':'insert');
		$this->event->setValidationRules($getRule);

		$start_datetime = $this->request->getPost('start_date') .' '. $this->request->getPost('start_time');
		$end_datetime = $this->request->getPost('end_date') .' '. $this->request->getPost('end_time');

        $event_data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'owner' => auth_user()->id,
            'status' => intval($this->request->getPost('status') ?? 0),
            'location' => json_encode([
                'maps' => [
                    $this->request->getPost('latlng'),
                    $this->request->getPost('address')
                ],
                'phone' => $this->request->getPost('phone'),
                'meet' => $this->request->getPost('meet'),
                'youtube' => $this->request->getPost('youtube'),
                'twitch' => $this->request->getPost('twitch'),
                'zoom' => $this->request->getPost('zoom'),
                'instagram' => $this->request->getPost('instagram'),
                'web' => $this->request->getPost('website')
            ]),
            'message_status' => $this->request->getPost('message_status'),
            'subscribe_status' => $this->request->getPost('subscribe_status'),
            'category' => $this->request->getPost('category'),
            'tags' => $this->request->getPost('tags'),
            'start_datetime' => date('Y-m-d H:i:00', strtotime($start_datetime)),
            'end_datetime' => date('Y-m-d H:i:00', strtotime($end_datetime)),
        ];

        // event_id
        if ($event_id = clean_number($event_id)) {
            $event_data['id'] = $event_id;
        }

		try {
            if (!$this->event->save($event_data))
                return redirect()->back()->withInput()->with('errors', $this->event->errors());
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
        // cache clean
        cache()->clean();

        // redirect
		if ($redirect = session('redirect_after_event_edit')) {
		    session()->remove('redirect_after_event_edit');
		    return redirect()->to($redirect);
        }

        // success
        return redirect()->route('my.events')->with('success', lang('Event.save.success'));
	}

	public function edit(int $event_id)
	{
		$event = $this->event->where('id', clean_number($event_id))->first();
		if (!$event) {
            return redirect()->back()->with('error', lang('Event.notFound'));
        }

		$data['event'] = $event;
		$data['PageTitle'] = $event->title .' - Etkinlik Düzenle';

		if ($referrer = service('request')->getUserAgent()->getReferrer()) {
	        session()->set('redirect_after_event_edit', $referrer);
        }

		return view('event/edit', $data);
	}

	public function remove(int $event_id)
	{
	    post_method();

	    $event_id = clean_number($event_id);
		if ($this->event->where('owner', auth_user()->id ?? 0)->delete($event_id)) {
		    // cache clean
            cache()->clean();
            // success
		    return redirect()->back()->with('success', lang('Event.delete.success'));
        }
        // error
		return redirect()->back()->with('error', lang('Event.notFound'));
	}

}
