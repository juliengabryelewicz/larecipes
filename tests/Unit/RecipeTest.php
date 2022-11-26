<?php

namespace Tests\Unit;

use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    public function testSlug()
    {
        $recipe = Recipe::factory()->create(['title' => 'Carbonade flamande']);
        $this->assertEquals($recipe->slug, 'carbonade-flamande');
    }

    public function testSearch()
    {
        Recipe::factory()->create(['title' => 'Carbonade flamande']);
        Recipe::factory()->create(['title' => 'Carbonara']);

        $this->assertCount(0, Recipe::search('Jambalaya')->get());
        $this->assertCount(1, Recipe::search('flamande')->get());
        $this->assertCount(2, Recipe::search('Carbo')->get());
    }
}
