<?php

namespace App\Controllers;

use \App\Models\EventsModel;
use App\Models\EventSubscriberModel;
use \App\Models\UserModel;
use CodeIgniter\I18n\Time;

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
		$this->perPage = 12;
	}

    public function index(): string
    {
        $data['PageTitle'] = 'Etkinlikler';
        $data['FixedTopNav'] = true;

        if (!auth_check()) {
            $this->event->where('status', '2');
        }

		$data['events'] = $this->event
            ->where('start_datetime >=', date('Y-m-d H:i:s'))
            ->search()
            ->orderBy('start_datetime', 'ASC')
            ->paginate($this->perPage);
		$data['pager'] = $this->event->pager;

        return view('index', $data);
    }

    public function category(string $slug)
    {
        $data['PageTitle'] = 'Etkinlikler';

        $category = category('slug', $slug);
        if (!$category) {
            show404();
        }

        $data['PageTitle'] = $category->name;

        if (!auth_check()) {
            $this->event->where('status', '2');
        }

        $data['events'] = $this->event
            ->where('category', $category->id)
            ->where('start_datetime >=', date('Y-m-d H:i:s'))
            ->orderBy('start_datetime', 'ASC')
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
