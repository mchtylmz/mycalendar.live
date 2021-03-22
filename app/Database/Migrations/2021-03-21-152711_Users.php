<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => '300',
                'null' => false
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => '300',
                'null' => false
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => true
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '300',
                'null' => false
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'user'],
                'default' => 'user',
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true
            ],
            'appkey' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
                'null' => true
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '300',
                'null' => false
            ],
            'reset_token' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ],
            'about' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true
            ],
            'facebook' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true
            ],
            'twitter' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true
            ],
            'instagram' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true
            ],
            'youtube' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true
            ],
            'linkedin' => [
                'type' => 'VARCHAR',
                'constraint' => '500',
                'null' => true
            ],
            'email_notification' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '1',
            ],
            'sms_notification' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '0',
            ],
            'event_upcoming' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'default' => 7,
            ],
        ]);
        $this->forge->addField("last_seen timestamp NULL DEFAULT NULL");
        $this->forge->addField("updated_at timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()");
        $this->forge->addField("created_at timestamp NULL DEFAULT current_timestamp()");
        $this->forge->addField("deleted_at timestamp NULL DEFAULT NULL");
        $this->forge->addKey('id', true);
        $this->forge->createTable('users', false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
        $this->forge->dropTable('users');
	}
}
