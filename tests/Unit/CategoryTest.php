<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testSlug()
    {
        $category = Category::factory()->create(['title' => 'Cuisine japonaise']);
        $this->assertEquals($category->slug, 'cuisine-japonaise');
    }
}
