<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Admin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        try {
            if (!auth_check()) {
                session()->destroy();
                return redirect()->route('auth.login');
            }
            if (auth_user()->role != 'admin') {
                return redirect()->route('my.calendar');
            }
        } catch (\Exception $e) {
            return redirect()->to('/');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
