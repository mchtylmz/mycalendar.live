<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
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
                'constraint' => '90',
                'null' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '90',
                'null' => false
            ],
            'color' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'default' => '#465af7'
            ],
        ]);
        $this->forge->addField("updated_at timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()");
        $this->forge->addField("created_at timestamp NULL DEFAULT current_timestamp()");
        $this->forge->addKey('id', true);
        $this->forge->createTable('category', false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable('category');
	}
}
