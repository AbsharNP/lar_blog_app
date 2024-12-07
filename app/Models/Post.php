<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'name', 
        'date', 
        'author', 
        'content', 
        'image'
    ];

    // Optionally, if you want to cast 'date' to a Carbon instance:
    protected $casts = [
        'date' => 'date',
    ];
}
