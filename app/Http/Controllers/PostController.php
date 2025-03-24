<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function latest(){
        
        $user_id = Auth::id();
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(2);
        
        return view('posts.latest', compact('posts', 'user_id'));
    }
    
    public function post(Request $request){
        
        $post = new post;
        $post->todo = $request['todo'];
        $post->user_id = auth::id();
        $post->save();
        
        return redirect('/bucketlist');
    }
    
    public function done(Post $post){
        
        $post->isDone = true;
        $post->save();
        
        return redirect('/bucketlist');
    }
    
    public function bucketlist(){
        
        $user_id = auth::id();
        $posts = Post::where('user_id', $user_id)->where('isDone', false)->orderBy('updated_at', 'DESC')->paginate(5);
        
        return view('posts.bucketlist', compact('posts'));
    }
    
    public function achievement(){
        
        $user_id = auth::id();
        $posts = Post::where('user_id', $user_id)->where('isDone', true)->orderBy('updated_at', 'DESC')->paginate(2);
        
        return view('posts.achievement', compact('posts'));
    }
}
