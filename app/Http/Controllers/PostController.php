<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function latest(){
        
        $posts = Post::all();
        
        return view('posts.latest', compact('posts'));
    }
    
    public function post(Request $request){
        $post = new post;
        $post->todo = $request['todo'];
        $post->user_id = auth::id();
        $post->save();
        
        return redirect('/latest');
    }
}
