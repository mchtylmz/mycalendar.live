<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EventMeta extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => false
            ],
            'value' => [
                'type' => 'TEXT',
                'null' => true
            ]
        ]);
        $this->forge->addField("created_at timestamp NULL DEFAULT current_timestamp()");
        $this->forge->addKey('id', true);
        $this->forge->createTable('event_meta', false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable('event_meta');
	}
}
