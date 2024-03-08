<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->paginate(10);

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request)
    {
        Post::create([
            'image_path' => $request->image ? $request->image->store('public/posts') : null,
            'description' => $request->description,
            'title' => $request->title,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('admin.posts.index')->with('success', '¡Tu post ha sido agregado con exito!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = $post->title;
        $post->description = $post->description;
        if ($request->image) $post->image_path = $request->image->store('public/posts');
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', '¡Tu post ha sido actualizado con exito!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', '¡El post ha sido eliminado!');
    }
}
