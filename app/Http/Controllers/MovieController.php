<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    function index() {
        $movies = Movie::inRandomOrder()
            ->get();
        
            return view('movies.index', compact('movies'));
    }
}
