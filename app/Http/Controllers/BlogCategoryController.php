<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['permission:show blog category'])->only('index');
    }

    public function index(Request $request)
    {
        $sort_search =null;
        $categories = BlogCategory::orderBy('category_name', 'asc');

        if ($request->has('search')){
            $sort_search = $request->search;
            $categories = $categories->where('category_name', 'like', '%'.$sort_search.'%');
        }

        $categories = $categories->paginate(15);
        return view('admin.blog.category.index', compact('categories', 'sort_search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:255',
        ]);

        $category = new BlogCategory;

        $category->category_name = $request->category_name;
        $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->category_name));

        $category->save();

        return redirect()->route('blog-category.index');
    }

    public function edit($id)
    {
        $cateogry = BlogCategory::find($id);
        $all_categories = BlogCategory::all();

        return view('admin.blog_system.category.edit',  compact('cateogry','all_categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|max:255',
        ]);

        $category = BlogCategory::find($id);

        $category->category_name = $request->category_name;
        $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->category_name));

        $category->save();

        return redirect()->route('blog-category.index');
    }

    public function destroy($id)
    {
        BlogCategory::find($id)->delete();

        return redirect('admin/blog-category');
    }
}
