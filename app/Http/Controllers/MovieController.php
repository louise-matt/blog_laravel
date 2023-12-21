<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\FileUpload;
use App\Models\Category;

class MovieController extends Controller
{
    function index() {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    function create() {
        $categories = Category::all();
        return view('movies.create', ["categories"=> $categories, "title"=>"Ajouter un film"]);
    }

    public function save(Request $request) {

        $data = $request->validate([
            "title" => "required",
            "category" => "required|numeric",
            "director" => "required",
            "release_date" => "required|numeric",
            "description" => "required",
            'image' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $fileUpload = new FileUpload;
        if(!empty($data["image"])) {
            $file_name = time().'_'.$data["image"]->getClientOriginalName();
            $file_path = $request->file('image')->storeAs('uploads', $file_name, 'public');
            
            $fileUpload->name = time().'_'.$data["image"]->getClientOriginalName();
            $fileUpload->path = '/storage/' . $file_path;
            $fileUpload->save();
            $data["image"] = '/storage/' . $file_path;
        }

        $newMovie = Movie::create($data);
        return redirect(route('movies.index'));

    }
    
    public function edit(Movie $movie) {
        $categories = Category::all();
        return view('movies.edit', ["movie" => $movie, "categories"=> $categories, "title"=>"Modifier ce film"]);
    }

    public function update(Movie $movie, Request $request) {
        $data = $request->validate([
            "title" => "required",
            "category" => "required|numeric",
            "director" => "required",
            "release_date" => "required|numeric",
            "description" => "required",
            'image' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $fileUpload = new FileUpload;
        if(!empty($data["image"])) {
            $file_name = time().'_'.$data["image"]->getClientOriginalName();
            $file_path = $request->file('image')->storeAs('uploads', $file_name, 'public');
            
            $fileUpload->name = time().'_'.$data["image"]->getClientOriginalName();
            $fileUpload->path = '/storage/' . $file_path;
            $fileUpload->save();
            $data["image"] = '/storage/' . $file_path;
        }

        $movie->update($data);
        return redirect(route('movies.index'))->with('success', 'Le film a bien été mis à jour');
    }

    public function delete(Movie $movie) {
        $movie->delete();
        return redirect(route('movies.index'))->with('success', 'Le film a bien été supprimé');
    }

}
