<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class SendCommentController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'content' => ['required', 'string', 'min:3'],
            'post_id' => ['required', 'exists:posts,id'],
            "comment_id"=>['nullable', 'exists:comments,id']
        ]);
        $data['user_id'] = auth()->user()->id;

        Comment::query()->create($data);
        return back();
    }
}
