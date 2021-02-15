<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ShowCategoryController extends Controller
{
    public function index(Category $category)
    {
          $posts = $category->posts()->paginate();
          return view('landing',compact('posts'));
    }
}
