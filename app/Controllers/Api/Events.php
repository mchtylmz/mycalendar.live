<?php

namespace App\Controllers\Api;

use \App\Controllers\BaseController;
use App\Models\EventsModel;
use CodeIgniter\API\ResponseTrait;

class Events extends BaseController
{
    use ResponseTrait;

    /**
     * @var EventsModel
     */
    private $events;

    public function __construct()
    {
        $this->events = new EventsModel();
    }

    public function index()
    {
        $start_date = strtotime($this->request->getGet('start'));
        $end_date = strtotime($this->request->getGet('end'));

        if (auth_check()) {
            $this->events = auth_user()->getEvents();
        }

        $events = $this->events
            ->where('start_datetime >=', date('Y-m-d H:i:s', $start_date))
            ->where('end_datetime <=', date('Y-m-d H:i:s', $end_date))
            ->findAll();

        if ($events) :
            $data = [];
            foreach ($events as $event) :
                $event_start = strtotime($event->start_datetime);
                $event_end = strtotime($event->end_datetime);
                for ($day = $event_start; $day <= $event_end; $day = $day + 86400) :
                    $data[] = [
                        'title' => $event->title,
                        'start' => date('Y-m-d', $day) . ' ' . $event->getStartTime(),
                        'end' => date('Y-m-d', $day) . ' ' . $event->getEndTime(),
                        'route' => $event->route,
                        'owner' => view('event/element/owner_modal', ['user' => $event->owner]),
                        'color' => $event->category->color ?? '#465af7',
                        'location' => $event->location,
                        'category' => $event->category->name ?? ' - '
                    ];
                endfor;
            endforeach;;
        endif;

        return $this->respond($data ?? [], 200);
    }

}