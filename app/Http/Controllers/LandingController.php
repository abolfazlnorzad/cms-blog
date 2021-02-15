<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $posts = Post::query()->with('user')->paginate(15);
        return view('landing',compact('posts'));
    }
}
