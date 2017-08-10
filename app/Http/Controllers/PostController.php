<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreatePost(Request $request)
    {
        $post = new Post();
        $post->body = $request->body;
//      $post->user_id = $request->user()->id;
//      $post->save();
        $request->user()->posts()->save($post);

        return redirect()->route('dashboard');
    }
}
