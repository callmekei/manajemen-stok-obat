<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if(session()->get('logged_in')){
            return view('dashboard');
        }else{
            return redirect()->to(base_url('login'));
        }
    }
}

