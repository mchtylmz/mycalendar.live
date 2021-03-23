<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EventSubscriber extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'event_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'request_subscribe' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '1',
            ],
            'request_message' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '0',
            ],
        ]);
        $this->forge->addField("updated_at timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()");
        $this->forge->addField("created_at timestamp NULL DEFAULT current_timestamp()");
        $this->forge->addKey('id', true);
        $this->forge->createTable('event_subscriber', false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable('event_subscriber');
	}
}
