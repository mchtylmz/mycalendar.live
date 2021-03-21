<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['PageTitle'] = 'Etkinliklerim';

		return view('index', $data);
	}

	public function events() {
	   $data['PageTitle'] = 'Etkinliklerim';

		return view('index', $data);
    }
}
