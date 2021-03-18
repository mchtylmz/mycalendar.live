<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
	public function run()
	{
        $data = [
            'first_name' => 'admin',
            'last_name'  => 'admin',
            'email'      => 'admin@admin.com',
            'role'       => 'admin',
            'password'   => '123456'
        ];

        // Simple Queries
        $this->db->query(
            "INSERT INTO users (first_name, last_name, email, role, password) VALUES(:first_name:, :last_name:, :email, :role, :password)",
            $data
        );

        // Using Query Builder
        $this->db->table('users')->insert($data);
	}
}
