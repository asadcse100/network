<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;
use Carbon\Carbon;
use Response;

class BlogController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['permission:show all blogs'])->only('index');
    }

    public function index(Request $request)
    {
        $sort_search = null;
        $blogs = Blog::orderBy('created_at', 'desc');

        if ($request->search != null){
            $blogs = $blogs->where('title', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }

        $blogs = $blogs->paginate(20);
        $blog_categories = BlogCategory::all();

        return view('admin.blog.index', compact('blogs','sort_search','blog_categories'));
    }

    // public function create()
    // {
    //     $blog_categories = BlogCategory::all();
    //     return view('admin.blog.create', compact('blog_categories'));
    // }

    public function store(Request $request)
    {
        // dd($request->toArray());
        // $request->validate([
        //     'category_id' => 'required',
        //     'title' => 'required|max:255',
        // ]);

        $banner = null;
        $meta_img = null;

        if($request->file('banner')){
            $file= $request->file('banner');
            $banner = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('uploads'), $banner);
        }

        if($request->file('meta_img')){
            $file= $request->file('meta_img');
            $meta_img = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('meta_img'), $meta_img);
        }

        Blog::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'category_id' => $request->category_id,
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'image' => $banner,
                'meta_img' => $meta_img,
                'slug' => preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)),
                'short_description' => $request->short_description,
                'description' => $request->description,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
                'status' => $request->published,
                'created_at' => Carbon::now(),
            ]
        );

        return redirect()->route('blog.index');
    }

    public function change_status(Request $request) {
        $blog = Blog::find($request->id);
        $blog->status = $request->status;

        $blog->save();
        return 1;
    }

    public function destroy($id)
    {
        Blog::find($id)->delete();

        return redirect('admin/blogs');
    }

    public function all_blog() {
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'desc')->paginate(24);
        return view("blogs.blogs", compact('blogs'));
    }

    public function blog_details($slug) {
        $blog = Blog::where('slug', $slug)->orWhere('id', $slug)->first();

        return view("blogs.blog_details", compact('blog'));
    }

    public function getBlogAjax(Request $request)
    {
        $blog = Blog::find($request->id);
        return Response::json($blog);
    }
}
