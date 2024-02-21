<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function dashboard()
    {
        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
    }
    public function index(Request $request)
    {

        $posts = Post::paginate(10);
            $categories = Category::all();
            return view('blog', ['posts' => $posts, 'categories' => $categories]);

    }

    public function show(Post $post)
    {
        $categories = Category::all();
        return view('post.show', ['post' => $post, 'categories' => $categories ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Auth::user()->post()->create($data);
        return redirect('/dashboard');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update()
    {

        DB::table('posts')
            ->where('id', request()->id)
            ->update(['title' => request()->title,
                'category_id' => request()->category,
                'description' => request()->description]);

        return redirect('/dashboard');
    }

    public function delete()
    {
        $post = Post::find(request()->delete_id);
        $post->delete();

        return redirect('/dashboard');
    }
}
