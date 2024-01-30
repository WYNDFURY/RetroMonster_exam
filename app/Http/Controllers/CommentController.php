<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        // Create a new comment
        $comment = Comment::create([
            'content' => $validatedData['content'],
            'monster_id' => $request->monster_id,
            'user_id' => auth()->id(),
        ]);


        return response()->json($comment);
    }
}
