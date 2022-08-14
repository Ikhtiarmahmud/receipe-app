<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceipeStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'receipe_id',
        'title',
        'image',
        'description',
        'status'
    ];
}
