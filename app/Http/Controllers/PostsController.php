<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(9);
        return view('posts.index',compact('posts'));
    }

    public function show($id)
    {
        return view('posts.show');
    }
}
