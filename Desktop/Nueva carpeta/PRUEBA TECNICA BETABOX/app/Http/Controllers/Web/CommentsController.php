<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentsRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(StoreCommentsRequest $request)
    {
        Comment::create([
            'message' => $request->message,
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id
        ]);

        return redirect()->back()->with('success', 'El comentario ha sido realizado exitosamente.');
    }
}
