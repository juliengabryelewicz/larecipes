<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testShow()
    {
        $category = Category::factory()->create(['title' => 'Gastronomie Flamande']);
        $recipe = Recipe::factory()->create();
        $recipe->categories()->attach($category);

        $this->get("/categories/{$category->slug}")
            ->assertOk()
            ->assertSee($category->title)
            ->assertSee($recipe->title);
    }
}
