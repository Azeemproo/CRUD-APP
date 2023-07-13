<?php

namespace App\Http\Controllers;
use App\Models\Post;
USE App\Models\ser;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function actuallyUpdatePOST(Post $post,Request $request){
        $incomingFields= $request->validate([
            'title'=> 'required',
            'body'=> 'required'
        ]
        );
    }
    public function showEditScreen(Post $post){
        return view('edit-post',['post' => $post]);
    }
    public function createPost(Request $request){
        $incomingFields = $request->validate([
            'title' =>'required',
            'body'=> 'required'
        ]);
        $incomingFields['title']=strip_tags($incomingFields['title']);
        $incomingFields['body']=strip_tags($incomingFields['body']);
        $incomingFields['user_id']=auth()->id();
        Post::create($incomingFields);
        return redirect('/');
    }
}
