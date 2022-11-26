<?php

namespace Tests\Feature\Admin;

use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $comment = Comment::factory()->create(['name' => 'Je recommande cette recette']);
        Comment::factory()->count(3)->create();

        $this->actingAsAdmin()
            ->get('/admin/comments')
            ->assertOk()
            ->assertSee($comment->name);
    }

    public function testApprove()
    {
        $comment = Comment::factory()->create(['approved' => false]);

        $this->actingAsAdmin()
            ->get('/admin/comments/approve/'.$comment->id)
            ->assertStatus(302);

        $comment = Comment::first();

        $this->assertEquals($comment->approved, true);
    }

    public function testReject()
    {
        $comment = Comment::factory()->create(['approved' => true]);

        $this->actingAsAdmin()
            ->get('/admin/comments/reject/'.$comment->id)
            ->assertStatus(302);

        $comment = Comment::first();

        $this->assertEquals($comment->approved, false);
    }

    public function testDelete()
    {
        $comment = Comment::factory()->create();
        Comment::factory()->count(2)->create();

        $this->actingAsAdmin()
            ->delete("/admin/comments/{$comment->id}")
            ->assertStatus(302);

        $this->assertDatabaseMissing('comments', $comment->toArray());
    }
}
