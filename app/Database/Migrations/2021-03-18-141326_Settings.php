<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Settings extends Migration
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings', false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable('settings');
	}
}
