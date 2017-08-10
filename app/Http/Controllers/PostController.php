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
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);

        $post = new Post();
        $post->body = $request->body;
//      $post->user_id = $request->user()->id;
//      $post->save();
        $message = 'There was an error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post created!';
        }

        return redirect()->route('dashboard')
            ->with(['message' => $message]);
    }
}
