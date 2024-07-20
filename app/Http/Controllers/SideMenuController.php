<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SideMenuController extends Controller
{
    public function index()
    {
        session(['active_session' => 'masterdata']);

    }
}
