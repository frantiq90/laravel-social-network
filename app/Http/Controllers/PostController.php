<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
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
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }

        $post->delete();

        return redirect()->route('dashboard')->with(['message' => 'Post Removed!']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        if (Auth::user() != $post->user) {
            return redirect()->back();
        }

        $post = Post::find($request->postId);
        $post->body = $request->body;
        $post->update();

        return response()->json(['new_body' => $post->body],200);

    }
}
