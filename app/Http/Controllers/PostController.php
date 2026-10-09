<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        //$posts = $post->scopeLatest();
        $posts = Post::latest()->take(3)->get();

        return view('welcome', ['posts' => $posts]);
    }

    public function indexPosts()
    {
        $filters = request()->only('category');

        return view('posts.index', ['posts' => Post::filter($filters)->latest()->get()]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function create()
    {
        $categories = Post::$categories;

        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:75',
            'author' => 'required|max:50',
            'category' => 'required',
            'content' => 'nullable'
        ]);

        $post = Post::create($validatedData);

        return view('posts.show', compact('post'));
    }
}
