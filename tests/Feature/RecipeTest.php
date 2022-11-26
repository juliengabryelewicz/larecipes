<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $recipe = Recipe::factory()->create(['title' => 'Carbonade flamande']);
        Recipe::factory()->count(2)->create();

        $this->get('/')
            ->assertOk()
            ->assertSee('Nos recettes')
            ->assertSee($recipe->title);
    }

    public function testSearch()
    {
        Recipe::factory()->count(3)->create();
        $recipe = Recipe::factory()->create(['title' => 'Carbonade flamande']);

        $this->get('/search?q=carbo')
            ->assertOk()
            ->assertSee($recipe->title);
    }

    public function testShow()
    {
        $recipe = Recipe::factory()->create();
        $comment = Comment::factory()->create(['recipe_id' => $recipe->id, 'approved' => true]);

        $this->get("/recipes/{$recipe->slug}")
            ->assertOk()
            ->assertSee($recipe->content)
            ->assertSee($recipe->title)
            ->assertSee($comment->name);
    }
}
