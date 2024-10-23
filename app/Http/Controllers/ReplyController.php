<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyStoreRequest;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    // Function for storing reply
    public function store(ReplyStoreRequest $request, $forumId, $parentId = null){
        $validated = $request->validated();

        Reply::create([
            "forum_id"=> $forumId,
            "parent_id"=> $parentId,
            "user_id"=> Auth::user()->id,
            "content"=> $validated["reply"],
        ]);

        return redirect()->route('forum.show', $forumId)->with('success','Reply successfully upload');
    }

    // Function for displaying replies through API
    public function show($commentId){
        $replies = Reply::where('parent_id', $commentId)
        ->orderBy('created_at', 'desc')
        ->orderBy('content', 'desc');

        return $replies;
    }
}
