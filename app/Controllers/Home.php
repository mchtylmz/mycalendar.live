<?php

namespace App\Controllers;

use \App\Models\EventsModel;
use App\Models\EventSubscriberModel;
use \App\Models\UserModel;

class Home extends BaseController
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
     * @var int
     */
    protected $perPage;

    public function __construct()
	{
		$this->event = new EventsModel();
		$this->event_subscriber = new EventSubscriberModel();
		$this->perPage = 18;
	}

    public function index()
    {
        $data['PageTitle'] = 'Etkinlikler';
        $data['FixedTopNav'] = true;

        $this->event
            ->where('start_date >=', date('Y-m-d'))
            ->where('start_time >=', date('H:i:s'));
        if (!auth_check()) {
            $this->event->where('status', '2');
        }
		if ($search_category = service('request')->getGet('c')) {
		    $this->event->where('category', clean_number($search_category));
        }
		if ($search_title = service('request')->getGet('q')) {
		    $search_title = clean_string($search_title);
		    $this->event->groupStart();
		    $this->event->orLike('title', $search_title);
		    $this->event->orLike('content', $search_title);
		    $this->event->orLike('tags', $search_title);
		    $this->event->groupEnd();
        }

		$data['events'] = $this->event
            ->orderBy('start_date', 'ASC')
            ->paginate($this->perPage);
		$data['pager'] = $this->event->pager;

        return view('index', $data);
    }

    public function category(string $slug)
    {
        $data['PageTitle'] = 'Etkinlikler';

        $category = category('slug', $slug);
        if (!$category)
            return redirect()->to('/');

        $data['PageTitle'] = $category->name;

        if (!auth_check()) {
            $this->event->where('status', '2');
        }

        $data['events'] = $this->event
            ->where('category', $category->id)
            ->where('start_date >=', date('Y-m-d'))
            ->where('start_time >=', date('H:i:s'))
            ->orderBy('start_date', 'ASC')
            ->paginate($this->perPage);
		$data['pager'] = $this->event->pager;

        return view('category', $data);
    }

    public function users()
    {
        $data['PageTitle'] = 'Üyeler';

        $users = new UserModel();
        $data['users'] = $users
            ->orderBy('first_name', 'ASC')
            ->paginate($this->perPage);
		$data['pager'] = $users->pager;

        return view('users', $data);
    }
}
