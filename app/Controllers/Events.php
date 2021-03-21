<?php

namespace App\Controllers;

use \App\Models\EventsModel;
use \App\Models\EventMeta;
use \App\Models\EventMessageModel;

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

    public function __construct()
	{
		$this->event = new EventsModel();
		$this->event_meta = new EventMeta();
		$this->event_message = new EventMessageModel();
	}

	public function new()
	{
		$data['PageTitle'] = 'Yeni Etkinlik Oluştur';

		return view('event/new', $data);
	}

}
