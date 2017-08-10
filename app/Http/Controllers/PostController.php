<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDashboard()
    {
        $posts = Post::all();
        return view('dashboard', compact('posts'));
    }

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

    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        $post->delete();

        return redirect()->route('dashboard')->with(['message' => 'Post Removed!']);
    }
}
