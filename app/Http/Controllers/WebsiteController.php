<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.about');
    }
}
