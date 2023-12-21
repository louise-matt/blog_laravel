<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function categories() {
        $categories = Category::all();
        dd($categories);
    }
}
