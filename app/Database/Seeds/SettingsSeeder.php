<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingsSeeder extends Seeder
{
	public function run()
	{
		$data = [
            'name'   => 'admin_url',
            'value'  => 'panel'
        ];

        // Simple Queries
        $this->db->query(
            "INSERT INTO settings (name, value) VALUES(:name:, :value:)",
            $data
        );

        // Using Query Builder
        $this->db->table('settings')->insert($data);
	}
}
