<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    function index() {
        $movies = Movie::inRandomOrder()
            ->get();
        
            return view('movies.index', compact('movies'));
    }
}
