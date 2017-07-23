<?php

namespace App\Http\Controllers;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
	public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

	public function index(){
		$posts =Post::latest()->filter(request(['month', 'year']))->get();

		$archives = Post::archives();
		return view('posts.index', compact('posts', 'archives'));

		// if($month = request('month')){
		// 	$posts->whereMonth('created_at', Carbon::parse($month)->month);
		// }
		// if($year = request('year')){
		// 	$posts->whereYear('created_at' , $year);
		// }

		// $posts = $posts->get();
	}

	public function show(Post $post){
		return view('posts.show', compact('post'));
	}

	public function create(){
		return view('posts.create');
	}

	public function store(Post $post){
		$this->validate(request(), [
			'title' => 'required|max:255',
			'body' => 'required',
		]);

		auth()->user()->publish(
			new Post(request(['title', 'body']))

		// $post = new Post;
		// $post->title = request('title');
		// $post->body = request('body');

		// $post->save();
		// $post->create([
		// 	'title' => request('title'),
		// 	'body' => request('body'),
		// 	'user_id' => auth()->id(),
		// ]);

		);

		return redirect('/');

	}
}
