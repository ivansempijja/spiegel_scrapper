<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
