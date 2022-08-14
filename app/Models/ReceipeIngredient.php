<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceipeIngredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'receipe_id',
        'name',
        'quantity',
        'status'
    ];
}
