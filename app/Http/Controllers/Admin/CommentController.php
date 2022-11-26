<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:comment-list|comment-approve-reject|comment-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:comment-approve-reject', ['only' => ['approve', 'delete']]);
        $this->middleware('permission:comment-delete', ['only' => ['destroy']]);
    }

    /**
     * Show the application comments index.
     */
    public function index(): View
    {
        return view('admin.comments.index', [
            'comments' => Comment::with('recipe')->latest()->paginate(10),
        ]);
    }

    public function approve($id): RedirectResponse
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['approved' => true]);

        return redirect()->route('admin.comments.index')->withSuccess('Commentaire approuvé');
    }

    public function reject($id): RedirectResponse
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['approved' => false]);

        return redirect()->route('admin.comments.index')->withSuccess('Commentaire rejeté');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')->withSuccess('Commentaire supprimé avec succès');
    }
}
