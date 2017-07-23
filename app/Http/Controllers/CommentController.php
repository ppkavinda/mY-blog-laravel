<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    public function store(Post $post){
    	$this->validate(request(),[
    		'body' => 'required|min:2',
    	]);
    	Comment::create([
    		'body' => request('body'),
    		'post_id' => $post->id,
            'user_id' => auth()->id(),
    	]);


    	// $post->addComment(request('body'));
    	return redirect()->back();
    }
}
