<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likePost(Request $request){
        
        $user_id = Auth::id();
        $post_id = $request->post_id;
        $alreadyLiked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();
        
        if(!$alreadyLiked){
            
            $postLike = new Like;
            $postLike->user_id = $user_id;
            $postLike->post_id = $post_id;
            $postLike->save();
            
        }
        else{
            
            Like::where('user_id', $user_id)->where('post_id', $post_id)->delete();
            
        }
        
        $post = Post::find($post_id);
        $likesCount = $post->likes->count();
        $param = ['likesCount' =>  $likesCount];
        return response()->json($param);
        
    }
}
