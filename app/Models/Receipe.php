<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'time', 'description', 'status',
    ];
}