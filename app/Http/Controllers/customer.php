<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customer extends Controller
{
    public function dashboard()
    {
        return view('dashboard.customer');
    }
}
