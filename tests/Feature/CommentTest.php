<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        $recipe = Recipe::factory()->create();

        $params = $this->getValidParams(['recipe_id' => $recipe->id]);

        $this->post('/comments', $params)
            ->assertStatus(302);

        $this->assertDatabaseHas('comments', $params);

        $comment = Comment::first();

        $this->assertEquals($comment->approved, false);
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
            'name' => 'Une excellente recette d\'hiver',
            'content' => 'Je recommande chaudement',
            'recipe_id' => 1,
        ], $overrides);
    }
}
