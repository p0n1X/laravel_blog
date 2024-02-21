<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('category.show', ['categories' => $categories]);
    }

    public function show(Category $category)
    {
        $categories = Category::all();
        $posts = $category->post;
        return view('category', ['posts' => $posts, 'categories' => $categories]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $category_name = $request->name;
        $category = new Category();
        $category->name = $category_name;
        $category->save();

        return redirect('/dashboard');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();

        return redirect('/dashboard');
    }

    public function delete()
    {
        $post = Category::find(request()->delete_id);
        $post->delete();

        return redirect('/dashboard');
    }

}
