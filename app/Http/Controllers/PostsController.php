<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostsController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }

    public function index() {

        $posts = Post::all();
        $comments = Comment::all();

        return view('posts.list')->with('posts', $posts)->with('comments', $comments);
    }

    public function create() {

        return view('posts.create');
    }

    public function store() {

        request()->validate([
            'image_path' => ['required', 'image']
        ]);

        $post = Post::create([
                    'user_id' => auth()->id(),
                    'image_path' => request()->file('image_path')->store('posts', 'public'),
                    'description' => request('description'),
                    'filter' => request('filter'),
                    'likes' => 0
                ])->save();


        return redirect('posts');
    }

    public function like($id) {
        $post = Post::findOrFail($id);

        $post->likes += 1;
        $post->save();

        return redirect()->route('list_fotos');
    }

    public function dislike($id) {
        $post = Post::findOrFail($id);
        if ($post->likes > 0) {
            $post->likes -= 1;
            $post->save();
            return redirect()->route('list_fotos');
        } else {
            return redirect()->route('list_fotos');
        }
    }
    
    public function excluir($id) {
        $excluir = Post::destroy($id);
        return redirect()->route('list_fotos');
    }

}
