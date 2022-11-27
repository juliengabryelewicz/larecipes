<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        return view('recipes.index', [
            'recipes' => Recipe::latest()->paginate(12),
        ]);
    }

    public function show(Recipe $recipe)
    {
        $comments = $recipe->comments()->approved()->latest()->get();

        return view('recipes.show', [
            'recipe' => $recipe,
            'comments' => $comments,
        ]);
    }

    public function search(Request $request)
    {
        return view('recipes.index', [
            'recipes' => Recipe::search($request->input('q'))->orderBy('updated_at', 'desc')->paginate(12)
        ]);
    }
}
