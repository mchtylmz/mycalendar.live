<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Models\EventMessageModel;
use \App\Models\EventSubscriberModel;

class EventsModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Entities\EventsEntity';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'slug', 'title', 'content', 'owner', 'status', 'location', 'message_status', 'subscribe_status', 'start_datetime', 'end_datetime', 'tags', 'category'
    ];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $dynamicRules = [
        'insert' => [
            'title' => 'required|string|min_length[3]|max_length[300]',
            'owner' => 'required|numeric',
            'slug' => 'string|permit_empty|max_length[300]'
        ],
        'update' => [
            'title' => 'string|min_length[3]|max_length[300]',
            'owner' => 'numeric',
            'slug' => 'string|max_length[300]'
        ]
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $allowCallbacks = true;
    protected $beforeInsert = ['slug'];
    protected $afterInsert = [];
    protected $beforeUpdate = ['slug'];
    protected $afterUpdate = [];
    protected $afterDelete = ['clear'];

    public function getRule(string $rule): array
    {
        return $this->dynamicRules[$rule];
    }

    public function slug(array $data)
    {
        $data['data']['slug'] = generate_permalink($data['data']['slug'] ?? $data['data']['title']);
        return $data;
    }

    public function clear(array $data)
    {
        if (isset($data['purge']) && $data['purge']) {
            // message clear
            $event_message = new EventMessageModel();
            $event_message->where('event_id', $data['id'] ?? 0)->delete();
            // subscriber clear
            $event_subscriber = new EventSubscriberModel();
            $event_subscriber->where('event_id', $data['id'] ?? 0)->delete();
        }
        return $data;
    }

    public function withSubscriber()
    {
        $this->select(
            'events.*, 
          event_subscriber.subscribe_id, 
          event_subscriber.user_id, 
          event_subscriber.event_id, 
          event_subscriber.request_subscribe, 
          event_subscriber.request_message, 
          event_subscriber.updated_at as subscriber_updated_at, 
          event_subscriber.created_at as subscriber_created_at'
        )->join('event_subscriber', 'event_subscriber.event_id = events.id', 'LEFT');
        return $this;
    }

    public function search()
    {
        if ($search_category = service('request')->getGet('c')) {
            $this->where('category', clean_number($search_category));
        }
        if ($search_title = service('request')->getGet('q')) {
            $search_title = clean_string($search_title);
            $this->groupStart();
            $this->orLike('title', $search_title);
            $this->orLike('content', $search_title);
            $this->orLike('tags', $search_title);
            $this->groupEnd();
        }
        return $this;
    }
}
