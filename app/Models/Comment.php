<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'forum_id',
        'user_id',
        'parent_id',
        'content',        
    ];

    // A comment can have a parent comment (if it's a reply)
    public function parent(){
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    // A comment can have many replies (self-referential relationship)
    public function replies(){
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // A comment belongs to a forum
    public function forum(){
        return $this->belongsTo(Forum::class);
    }

    // A comment belongs to a user
    public function user(){
        return $this->belongsTo(User::class);
    }
}
