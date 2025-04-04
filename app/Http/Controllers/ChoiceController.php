<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\ChoiceCategory;
use App\Models\Choice;

class ChoiceController extends Controller
{
    public function show(Post $post){
        
        $choiceCategories = choiceCategory::all();
        return view('latests.choice', compact('post', 'choiceCategories'));
    }
    
    public function save(request $request, Post $post){
        
        $user_id = Auth::id();
        $post_id = $post->id;
        $choiceCategory_id = $request['choiceCategory_id'];
        $alreadyChosen = Choice::where('user_id', $user_id)->where('post_id', $post_id)->exists();
        
        if($alreadyChosen){
        Choice::where('user_id', $user_id)->where('post_id', $post_id)->delete();
        }
        
        $choice = new Choice;
        $choice->user_id = $user_id;
        $choice->post_id = $post_id;
        $choice->choiceCategory_id = $choiceCategory_id;
        $choice->save();
        
        return redirect('/latest');
    }
}
