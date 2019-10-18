<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    //
    public function index()
    {
        // $post = \App\Post::all(); use 前 -> use 後 (use App\Post)
        // $posts = Post::orderBy('created_at', 'desc'); // 最新順に並べる

        $posts = Post::latest()->get(); // 最新順に並べる

        // dd($posts->toArray()); // dump die
        
        // return view('posts.index', ['posts' => $posts]);
        return view('posts.index')->with('posts', $posts);

    }

    // public function show(int $id)
    public function show(Post $post) // Implicit Binding
    {
        // $post = Post::findOrFail($id); // Implicit Bindingの場合はいらない
        return view('posts.show')->with('post', $post);
    }
}
