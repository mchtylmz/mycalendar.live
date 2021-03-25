<?php

namespace App\Controllers;

use \App\Models\EventsModel;
use App\Models\EventSubscriberModel;
use \App\Models\UserModel;

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

    public function __construct()
	{
		$this->event = new EventsModel();
		$this->event_subscriber = new EventSubscriberModel();
	}

    public function index(string $slug, int $event_id)
    {
        d($slug);
        d($event_id);
        d('index');
    }

    public function messages(string $slug, int $event_id)
    {
        d($slug);
        d($event_id);
        d('messages');
    }

    public function users(string $slug, int $event_id)
    {
        d($slug);
        d($event_id);
        d('users');
    }

    public function requests(string $slug, int $event_id)
    {
        d($slug);
        d($event_id);
        d('requests');
    }

    public function requestPost(string $slug, int $event_id)
    {
        d($slug);
        d($event_id);
        d('requestPost');
    }
}
