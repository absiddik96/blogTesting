<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostsController extends Controller
{
    public function show($id)
    {
        try {
            $post = Post::findOrFail($id);
            return view('post.show')
                    ->withPost($post);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Page not Found');
        }


    }
}
