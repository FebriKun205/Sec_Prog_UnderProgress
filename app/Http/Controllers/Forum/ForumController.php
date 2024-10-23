<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Forum;

class ForumController extends Controller
{
    // Display a paginated list of all forums
    public function index()
    {
        $forums = Forum::orderBy('created_at', 'desc')
            ->orderBy('title', 'desc')
            ->paginate(15);
        
        return view('forum', compact('forums'));
    }

    // Show a specific forum with its comments and replies
    public function show($forumId)
    {
        // Find the forum
        $forum = Forum::findOrFail($forumId); // Use findOrFail for automatic 404
        
        // Retrieve the comments related to the forum, including replies
        $comments = Comment::where('forum_id', $forum->id)
            ->whereNull('parent_id') // Fetch only root comments (no parent)
            ->with('replies') // Load replies using eager loading
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        // Return view with forum and its comments
        return view('forum.show-forum', compact('forum', 'comments'));
    }
}
