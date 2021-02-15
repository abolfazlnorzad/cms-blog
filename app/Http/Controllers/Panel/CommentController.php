<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index(Request $request)
    {
        if (isset($request->approved)){
        $comments = Comment::query()->where('approved',!! $request->approved)->with(['user', 'post'])->withCount('replies')->paginate();
        }else{
            $comments = Comment::query()->with(['user', 'post'])->withCount('replies')->paginate();

        }

        return view('panel.comments.index', compact('comments'));
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();
        alert()->success('دیدگاه با موفقیت حذف شد', 'موفقیت آمیز');
        return back();
    }

    public function update(Comment $comment)
    {
        $comment->update([
            'approved' => !$comment->approved
        ]);
        alert()->success('دیدگاه با موفقیت ویرایش شد', 'موفقیت آمیز');
        return redirect(route('comments.index'));

    }
}
