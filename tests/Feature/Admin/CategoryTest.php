<?php

namespace Tests\Feature\Admin;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $category = Category::factory()->create(['title' => 'Gastronomie']);
        Category::factory()->count(3)->create();

        $this->actingAsAdmin()
            ->get('/admin/categories')
            ->assertOk()
            ->assertSee($category->title);
    }

    public function testCreate()
    {
        $this->actingAsAdmin()
            ->get('/admin/categories/create')
            ->assertOk()
            ->assertSee('Créer une catégorie')
            ->assertSee('Sauvegarder');
    }

    public function testStore()
    {
        $params = $this->getValidParams();

        $this->actingAsAdmin()
            ->post('/admin/categories', $params)
            ->assertStatus(302);

        $this->assertDatabaseHas('categories', $params);
    }

    public function testStoreFail()
    {
        $params = $this->getValidParams(['title' => null]);

        $this->actingAsAdmin()
            ->post('/admin/categories', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');
    }

    public function testEdit()
    {
        $category = Category::factory()->create();

        $this->actingAsAdmin()
            ->get("/admin/categories/{$category->slug}/edit")
            ->assertOk()
            ->assertSee('Modifier la catégorie')
            ->assertSee($category->title)
            ->assertSee($category->content);
    }

    public function testUpdate()
    {
        $category = Category::factory()->create();
        $params = $this->getValidParams();

        $response = $this->actingAsAdmin()->patch("/admin/categories/{$category->slug}", $params);

        $category->refresh();

        $response->assertRedirect("/admin/categories/{$category->slug}/edit");

        $this->assertDatabaseHas('categories', $params);
        $this->assertEquals($params['content'], $category->content);
    }

    public function testDelete()
    {
        $category = Category::factory()->create();
        $this->actingAsAdmin()
            ->delete("/admin/categories/{$category->slug}")
            ->assertStatus(302);

        $this->assertDatabaseMissing('categories', $category->toArray());
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
            'title' => 'Gastronomie japonaise',
            'content' => 'Contenu de la catégorie',
        ], $overrides);
    }
}
