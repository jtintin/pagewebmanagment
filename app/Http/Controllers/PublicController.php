<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    //return page web welcome.blade.php
    public function index()
    {
        return view('welcome');
    }
}
