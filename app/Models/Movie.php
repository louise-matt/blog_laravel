<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'director',
        'release_date',
        'description',
        'image'
    ];

    
    public function category() {
        return $this->belongsTo(Category::class);
    }

}
