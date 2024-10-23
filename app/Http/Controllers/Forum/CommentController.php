<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Store a new comment for a forum
    public function store(CommentStoreRequest $request, $forumId, $parentId = null)
    {
        $validated = $request->validated();

        Comment::create([
            'forum_id' => $forumId,
            'parent_id'=> $parentId,
            'user_id' => Auth::id(),
            'content' => $request->input('comment'),
        ]);

        return redirect()->route('forum.show', $forumId)->with('success', 'Comment added successfully.');
    }
}
