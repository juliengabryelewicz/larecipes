<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecipesRequest;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:recipe-list|recipe-create|recipe-edit|recipe-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:recipe-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:recipe-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:recipe-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        return view('admin.recipes.index', [
            'recipes' => Recipe::latest()->paginate(10),
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Recipe $recipe): View
    {
        $recipe = Recipe::findOrFail($recipe->id);
        $categories = Category::all()->pluck('title', 'id');

        return view('admin.recipes.edit', [
            'recipe' => $recipe,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $categories = Category::all()->pluck('title', 'id');

        return view('admin.recipes.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecipesRequest $request): RedirectResponse
    {
        $recipe = Recipe::create($request->only(['user_id', 'title', 'content', 'difficulty', 'calories', 'serving', 'preparation_time', 'categories', 'image']));

        if ($request->image !== null) {
            $image = $request->image;
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images_recipes'), $imageName);
            $recipe->image = $imageName;
            $recipe->save();
        }

        if (is_array($request->get('categories')) && count($request->get('categories')) >= 1) {
            $categories = Category::find($request->get('categories'));
            $recipe->categories()->attach($categories);
        }

        return redirect()->route('admin.recipes.edit', $recipe)->withSuccess('Recette créee avec succès');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RecipesRequest $request, Recipe $recipe): RedirectResponse
    {
        $recipe->update($request->only(['user_id', 'title', 'content', 'difficulty', 'calories', 'serving', 'preparation_time', 'categories', 'image']));

        if ($request->image !== null) {
            unlink(public_path('images_recipes').'/'.$recipe->image);
            $image = $request->image;
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images_recipes'), $imageName);
            $recipe->image = $imageName;
            $recipe->save();
        }

        $recipe->categories()->detach();

        if (is_array($request->get('categories')) && count($request->get('categories')) >= 1) {
            $categories = Category::find($request->get('categories'));
            $recipe->categories()->attach($categories);
        }

        return redirect()->route('admin.recipes.edit', $recipe)->withSuccess('Recette modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        if ($recipe->image !== null) {
            unlink(public_path('images_recipes').'/'.$recipe->image);
        }

        $recipe->delete();

        return redirect()->route('admin.recipes.index')->withSuccess('Recette suprimée avec succès');
    }
}
