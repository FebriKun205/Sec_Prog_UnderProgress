<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForumStoreRequest;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;

class CreateForumController extends Controller
{
    // Display create forum form
    public function index(){
        return view('forum.create-forum');
    }

    public function store(ForumStoreRequest $request){
        // Retrieve the validated input data
        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('forum-images', 'public'); 
        }else{
            $imagePath = null;
        }

        // Create the forum post
        Forum::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'forum_images_path' => $imagePath, 
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('forum.create')->with('success', 'Forum post created successfully!');
    }
}
