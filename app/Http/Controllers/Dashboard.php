<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        return view('layouts.dashboard');
    }

    public function indexresponsivo()
    {
        return view('layouts.dashboard_resp');
    }
}
