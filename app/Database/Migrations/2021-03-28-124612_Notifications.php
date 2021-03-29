<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notifications extends Migration
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
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'message' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'link' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true
            ],
        ]);
        $this->forge->addField("created_at timestamp NULL DEFAULT current_timestamp()");
        $this->forge->addKey('id', true);
        $this->forge->createTable('notifications', false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable('notifications');
	}
}
