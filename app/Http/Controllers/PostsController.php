<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(9);
        $currentDate = Carbon::now();
        return view('posts.index',compact('posts','currentDate'));
        /*$posts = Post::all();
        return response()->json([
            'posts' => $posts->toArray()
        ]);*/
    }

    public function show($id)
    {
        return view('posts.show');
    }
}
