<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuralesController extends Controller
{
    public function index()
    {
        return view('works.murales');
    }
}
