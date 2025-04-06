<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Post $post){
        return view('achievements/comment', compact('post'));
    }
    
    public function save(PostRequest $request, Post $post){
        
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $post->id;
        $comment->URL = $request['URL'];
        $comment->body = $request['body'];
        $comment->save();
        return redirect('/achievement');
    }
    
    public function show(Post $post){
        
        $comments = $post->comments;
        return view('achievements/show', compact('comments', 'post'));
    }
}
