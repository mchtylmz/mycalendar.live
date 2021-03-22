<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Events extends Migration
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
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '300',
                'null' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '300',
                'null' => false
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'owner' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => true
            ],
            'location_text' => [
                'type' => 'VARCHAR',
                'constraint' => '300',
                'null' => true
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1', '2', '3'],
                'default' => '3',
            ],
            'message_status' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '1',
            ],
            'subscribe_status' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '0',
            ],
            'start_date' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null
            ],
            'end_date' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null
            ],
            'start_time' => [
                'type' => 'TIME',
                'null' => true,
                'default' => null
            ],
            'end_time' => [
                'type' => 'TIME',
                'null' => true,
                'default' => null
            ],
        ]);
        $this->forge->addField("updated_at timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()");
        $this->forge->addField("created_at timestamp NULL DEFAULT current_timestamp()");
        $this->forge->addField("deleted_at timestamp NULL DEFAULT NULL");
        $this->forge->addKey('id', true);
        $this->forge->createTable('events', false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable('events');
	}
}
