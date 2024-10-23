<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditForumController extends Controller
{
    public function index(){
        return view('forum.edit-forum');
    }
}
