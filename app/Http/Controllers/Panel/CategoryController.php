<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::with('parent')->paginate(15);
        $parentCategory = Category::mainCategory();
        return view('panel.categories.index', compact('categories', 'parentCategory'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['required', 'string', 'max:100', Rule::unique('categories')],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);
        Category::query()->create([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'category_id' => $data['category_id'],
        ]);

        alert()->success('دسته بندی با موفقیت ایجاد شد', 'موفقیت آمیز');
        return redirect(route('categories.index'));

    }


    public function edit(Category $category)
    {
        $parentCategories = Category::mainCategory();
        return view('panel.categories.edit',compact('category','parentCategories'));
    }


    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);
        $category->update($data);
        alert()->success('دسته بندی با موفقیت ویرایش شد', 'موفقیت آمیز');
        return redirect(route('categories.index'));
    }


    public function destroy(Category $category)
    {
        $category->delete();
        alert()->success('دسته بندی با موفقیت حذف شد', 'موفقیت آمیز');
        return back();
    }
}
