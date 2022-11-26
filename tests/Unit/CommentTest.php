<?php

namespace Tests\Unit;

use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function testApproved()
    {
        Comment::factory()->create(['name' => 'Commentaire 1', 'approved' => true]);
        Comment::factory()->create(['name' => 'Commentaire 2', 'approved' => true]);
        Comment::factory()->create(['name' => 'Commentaire 3', 'approved' => false]);

        $this->assertCount(2, Comment::approved()->get());
    }
}
