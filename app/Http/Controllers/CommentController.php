<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Models\Comment;
use App\Models\Recipe;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentsRequest $request)
    {
        $comment = Comment::create($request->only(['name', 'content', 'recipe_id']));

        $recipe = Recipe::findOrFail($request->get('recipe_id'));

        return redirect()->route('recipes.show', $recipe)->withSuccess('Merci pour votre commentaire! Il sera visible après approbation des rédacteurs.');
    }
}
