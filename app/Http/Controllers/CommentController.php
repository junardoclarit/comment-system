<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use Carbon\Carbon;

class CommentController extends Controller
{
    /**
     * Fetch the comments and pass it to a api resource
     * @return array
     */
    public function index()
    {
        $comments = Comment::with([
                'replies',
                'replies.replies',
                'replies.replies.replies'
            ])
                ->whereNull('parent_id')
                ->latest()
                ->get();

        return CommentResource::collection(
            $comments
        );
    }

    /**
     * Insert's the comment to the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return object
     */
    public function store(Request $request)
    {
        $comment = Comment::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'avatar' => $request->avatar,
            'parent_id' => ($request->parent_id) ? $request->parent_id : null,
        ]);

        return [
            'id' => $comment->id,
            'name' => $comment->name,
            'comment' => $comment->comment,
            'avatar' => $comment->avatar,
            'replies' => [],
            'comment_date' => Carbon::parse($comment->created_at)->format('d-M-Y H:i:s')
        ];
    }
}
