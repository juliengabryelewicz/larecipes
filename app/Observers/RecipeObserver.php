<?php

namespace App\Observers;

use App\Models\Recipe;
use Illuminate\Support\Str;

class RecipeObserver
{
    public function saving(Recipe $recipe): void
    {
        $recipe->slug = Str::slug($recipe->title, '-');
    }
}
