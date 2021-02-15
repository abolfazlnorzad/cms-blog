<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query()->where('title','LIKE',"%{$request->search}%")->paginate();
        return view('landing',compact('posts'));
    }
}
