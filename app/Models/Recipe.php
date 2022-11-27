<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Recipe extends Model
{
    use HasFactory, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'difficulty',
        'calories',
        'preparation_time',
        'serving',
        'slug',
        'user_id',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Return the recipe's comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /*public function scopeSearch(Builder $query, ?string $q)
    {
        if ($q) {
            return $query->where('title', 'LIKE', "%{$q}%")
            ->orWhere('content', 'LIKE', "%{$q}%");
        }
    }*/

    public function toSearchableArray()
    {
        return [
          'title' => $this->title,
          'content' => $this->content,
        ];
    }
}
