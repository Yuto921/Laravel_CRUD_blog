<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $comment = new Comment(['body' => $request->body]);
        $post->comments()->save($comment);
        return redirect()->action('PostsController@show', $post);
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }

}
