<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
	public function run()
	{
		$data = [
            'id'   => '1',
            'slug' => 'mycalendar',
            'name' => 'myCalendar'
        ];

        // Simple Queries
        $this->db->query(
            "INSERT INTO events (id, slug, name) VALUES(:id:, :slug:, :name:)",
            $data
        );

        // Using Query Builder
        $this->db->table('category')->insert($data);
	}
}
