<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EventsSeeder extends Seeder
{
	public function run()
	{
		$data = [
            'slug'   => 'ornek-etkinlik',
            'title'  => 'Örnek Etkinlik',
            'owner'  => 1,
        ];

        // Simple Queries
        $this->db->query(
            "INSERT INTO events (slug, title, owner) VALUES(:slug:, :title:, :owner:)",
            $data
        );

        // Using Query Builder
        $this->db->table('events')->insert($data);
	}
}
