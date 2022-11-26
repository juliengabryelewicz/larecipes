<?php

namespace Tests\Feature\Admin;

use App\Models\Comment;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $admin = User::factory()->admin()->create();
        $recipe = Recipe::factory()->create(['user_id' => $admin->id, 'title' => 'Welsh']);
        Recipe::factory()->count(3)->create();

        $this->actingAsAdmin()
            ->get('/admin/recipes')
            ->assertOk()
            ->assertSee($recipe->title);
    }

    public function testCreate()
    {
        $this->actingAsAdmin()
            ->get('/admin/recipes/create')
            ->assertOk()
            ->assertSee('calories')
            ->assertSee('Créer une recette')
            ->assertSee('Sauvegarder');
    }

    public function testStore()
    {
        $params = $this->getValidParams();

        $this->actingAsAdmin()
            ->post('/admin/recipes', $params)
            ->assertStatus(302);

        $this->assertDatabaseHas('recipes', $params);
    }

    public function testStoreFail()
    {
        $params = $this->getValidParams(['title' => null]);

        $this->actingAsAdmin()
            ->post('/admin/recipes', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');
    }

    public function testEdit()
    {
        $recipe = Recipe::factory()->create(['user_id' => $this->admin()->id]);

        $this->actingAsAdmin()
            ->get("/admin/recipes/{$recipe->slug}/edit")
            ->assertOk()
            ->assertSee('Modifier la recette')
            ->assertSee($recipe->title)
            ->assertSee($recipe->content);
    }

    public function testUpdate()
    {
        $recipe = Recipe::factory()->create();
        $params = $this->getValidParams();

        $response = $this->actingAsAdmin()->patch("/admin/recipes/{$recipe->slug}", $params);

        $recipe->refresh();

        $response->assertRedirect("/admin/recipes/{$recipe->slug}/edit");

        $this->assertDatabaseHas('recipes', $params);
        $this->assertEquals($params['content'], $recipe->content);
    }

    public function testDelete()
    {
        $recipe = Recipe::factory()->create();
        Comment::factory()
            ->count(2)
            ->create()
            ->each(function ($comment) use ($recipe) {
                $comment->recipe_id = $recipe->id;
                $comment->save();
            });

        $this->actingAsAdmin()
            ->delete("/admin/recipes/{$recipe->slug}")
            ->assertStatus(302);

        $this->assertDatabaseMissing('recipes', $recipe->toArray());
        $this->assertTrue(Comment::all()->isEmpty());
    }

    /**
     * Valid params for updating or creating a resource
     *
     * @param  array  $overrides new params
     * @return array Valid params for updating or creating a resource
     */
    private function getValidParams($overrides = [])
    {
        return array_merge([
            'title' => 'Carbonade flamande',
            'content' => 'Contenu de la recette',
            'difficulty' => 1,
            'serving' => 2,
            'calories' => 500,
            'preparation_time' => '45 minutes',
            'user_id' => $this->admin()->id,
        ], $overrides);
    }
}
