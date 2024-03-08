<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::when($request->search, fn ($query, $search) => $query->where(function ($subQuery) use ($search) {
            $subQuery->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->whereRelation('user', 'name', 'like', "%$search%");
        }))->paginate(4);

        return view('web.home.index', [
            'posts' => $posts->appends(request()->input())
        ]);
    }

    function post(Request $request, Post $post)
    {
        $comments = $post->comments()->orderBy('created_at', 'DESC')->paginate(15);

        return view('web.post', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
