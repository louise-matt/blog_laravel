<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    function index() {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    function create() {
        return view('movies.create');
    }

    public function save(Request $request) {
        $data = $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => "nullable",
        ]);

        $newMovie = Movie::create($data);
        return redirect(route('movies.index'));

    }

}
