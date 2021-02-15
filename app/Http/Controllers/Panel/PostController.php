<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\CreatePostRequest;
use App\Http\Requests\Panel\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $posts = Post::with('user');
        if ($request->search){
            $posts = $posts->where('title',"LIKE", "%{$request->search}%" );
        }

        if (auth()->user()->role === 'admin') {
            $posts = $posts->paginate();
        } else {
            $posts = $posts->where('user_id', auth()->user()->id)->paginate();

        }
        return view('panel.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('panel.posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        $categoryIds = Category::query()->whereIn('name', $request->categories)
            ->pluck('id')->toArray();
        $file = $request->file('banner');
        $file_name = $file->getClientOriginalName();
        $file->storeAs('images/banners', $file_name, 'public_files');
        $data = $request->validated();
        $data['banner'] = $file_name;
        $data['user_id'] = auth()->user()->id;
        $post = Post::query()->create($data);
        $post->categories()->sync($categoryIds);
        alert()->success('پست مورد نظر با موفقیت ایجاد شد', 'موفقیت آمیز');
        return redirect(route('posts.index'));

    }


    public function edit(Post $post)
    {
        return view('panel.posts.edit', compact('post'));
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $categoryIds = Category::query()->whereIn('name', $request->categories)
            ->pluck('id')->toArray();
        $data = $request->validated();

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('images/banners', $file_name, 'public_files');
            $data['banner'] = $file_name;
        }


        $post->update($request->validated());
        $post->categories()->sync($categoryIds);
        alert()->success('مقاله با موفقیت ویرایش شد', 'موفقیت آمیز');
        return redirect(route('posts.index'));

    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        alert()->success('مقاله به درستی حذف شد', 'موفقیت آمیز');
        return back();
    }
}
