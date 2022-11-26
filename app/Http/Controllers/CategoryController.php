<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $recipes = $category->recipes()->paginate(12);

        return view('categories.show', [
            'category' => $category,
            'recipes' => $recipes,
        ]);
    }
}
