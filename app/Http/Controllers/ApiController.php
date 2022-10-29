<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function get_articles()
    {
        $articles = Article::latest()->paginate(50);
        return response()->json($articles);
    }
}
