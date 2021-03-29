<?php

namespace App\Controllers\Api;

use \App\Controllers\BaseController;
use \App\Models\NotificationsModel;
use CodeIgniter\API\ResponseTrait;

class Notifications extends BaseController
{
    use ResponseTrait;

    /**
     * @var NotificationsModel
     */
    private $notification;

    public function __construct()
	{
		$this->notification = new NotificationsModel();
	}

	public function read()
    {
        $update_ids = [];
        foreach (auth_user()->notifications as $notification) {
            $update_ids[] = $notification->id;
        }
        if ($update_ids) {
            try {
                $update = $this->notification->update($update_ids, ['is_read' => '1']);
                 if ($update) {
                     cache()->clean();
                     return $this->respond(['status' => 'success'], 200);
                 }
            } catch (\ReflectionException $e) {}
        }
        return $this->failNotFound('Bildirim bulunamadı!.');
    }

}
