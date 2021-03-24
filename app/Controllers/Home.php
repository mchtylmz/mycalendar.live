<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function index()
    {
        $data['PageTitle'] = 'Etkinlikler';
        $data['FixedTopNav'] = true;
        return view('index', $data);
    }

    public function category(string $slug)
    {
        $data['PageTitle'] = 'Etkinlikler';

        $category = category('slug', $slug);
        if ($category) {
            $data['PageTitle'] = $category->getName();
        }

        return view('index', $data);
    }

    public function contact()
    {
        $data['PageTitle'] = 'İletişim';
        return view('index', $data);
    }
}
