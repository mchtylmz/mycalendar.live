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
            ]
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
