<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorialesController extends Controller
{
    public function index()
    {
        return view('works.editoriales');
    }
}
