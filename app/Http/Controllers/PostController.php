<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function dashboard()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('post.index', compact('posts'));
    }
    public function index(Request $request)
    {

        $posts = Post::orderBy('id', 'desc')->paginate(10);
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

    public function post_get_api()
    {
        $posts = Post::all();
        $data = [
            'status' => 200,
            'posts' => $posts
        ];

        return response()->json($data);
    }

    public function post_post_api(Request $request)
    {
        $validator =  Validator::make($request->all(),
        [
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'errors' => $validator->errors()
            ];
        } else {
            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->category_id = 1;     //Default Category 1
            $post->user_id = 1;         //Default User 1
            $post->save();

            $data = [
                'status' => 200,
                'post' => 'Data uploaded successfully!'
            ];

        };

        return response()->json($data);
    }

    public function post_edit_api(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'title' => 'required',
                'description' => 'required',
            ]);
        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'errors' => $validator->errors()
            ];
        } else {
            $post = Post::find($id);
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();

            $data = [
                'status' => 200,
                'post' => 'Data updated successfully!'
            ];

        };

        return response()->json($data);
    }

    public function post_delete_api($id)
    {
        $post = Post::find($id);
        $post->delete();
        $data = [
            'status' => 200,
            'post' => 'Data deleted successfully!'
        ];
        return response()->json($data);
    }
}
