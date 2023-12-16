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
    
    public function edit(Movie $movie) {
        return view('movies.edit', ["movie" => $movie]);
    }

    public function update(Movie $movie, Request $request) {
        $data = $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => "nullable",
        ]);

        $movie->update($data);
        return redirect(route('movies.index'))->with('success', 'Le film a bien été mis à jour');
    }

    public function delete(Movie $movie) {
        $movie->delete();
        return redirect(route('movies.index'))->with('success', 'Le film a bien été supprimé');
    }

}
