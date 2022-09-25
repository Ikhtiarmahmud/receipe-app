<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Receipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'title', 'image', 'time', 'description', 'status',
    ];

    /**
     * @return HasMany
     */
    public function ingredients(): HasMany
    {
        return $this->hasMany(ReceipeIngredient::class);
    }

    /**
     * @return HasMany
     */
    public function steps(): HasMany
    {
        return $this->hasMany(ReceipeStep::class);
    }
}
