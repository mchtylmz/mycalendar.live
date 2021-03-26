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
            'start_datetime' => date('Y-m-d H:i:s'),
            'end_datetime'   => date('Y-m-d H:i:s', strtotime('+ 10 days'))
        ];

        // Simple Queries
        $this->db->query(
            "INSERT INTO events (slug, title, owner, start_datetime, end_datetime) VALUES(:slug:, :title:, :owner:, :start_datetime:, :end_datetime:)",
            $data
        );

        // Using Query Builder
        $this->db->table('events')->insert($data);
	}
}
