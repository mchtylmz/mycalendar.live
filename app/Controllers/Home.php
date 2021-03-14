<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		d(
			env('CI_ENVIRONMENT')
		);
		return view('welcome_message');
	}
}
