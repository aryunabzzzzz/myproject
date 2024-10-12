<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(CommentRequest $request)
    {
        try {
            $request->validate([]);
            $data = $request->all();

            $trip = Trip::find($data['tripId']);

            $comment = new Comment();
            $comment->author_id = Auth::user()->id;
            $comment->comment = $data['comment'];

            $trip->comments()->save($comment);

            return response()->json([
                'message' => 'Комментарий успешно сохранен.',
                'username' => $comment->author->username,
                'avatar' => $comment->author->avatar_path,
                'comment' => $comment->comment,
                'created_at' => date($comment->created_at)
            ], 200);
        } catch (\Throwable $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
