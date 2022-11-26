<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'approved',
        'recipe_id',
    ];

    /**
     * Return the comment's recipe
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function scopeApproved(Builder $query)
    {
        return $query->where('approved', true);
    }
}
