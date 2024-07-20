<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        session(['active_session' => 'masterdata']);
        return view('template.menu');

    }
}
