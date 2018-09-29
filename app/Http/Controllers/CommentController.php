<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // FRONTEND-----------

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Comment $comment)
    {
        // if($comment->user_id != auth()->user()->id && auth()->user()->is_admin == false) {
        //     flash()->overlay("You can't delete other peoples comment.");
        //     return redirect('/admin/posts');
        // }

        $narrative_id = $comment->narrative_id;

        $comment->delete();
        // flash()->overlay('Comment deleted successfully.');

        return redirect('/narrative/' . $narrative_id);
    }

    // FRONTEND-----------
    
    public function index()
    {
        return Comment::all();
    }

    public function show(Comment $comment)
    {
        return $comment;
    }
    public function showByIdNarrative($id)
    {
        $comment = Comment::where('narrative_id', $id)->get();
        return $comment;
    }
    public function showByIdUser($id)
    {
        $comment = Comment::where('user_id', $id)->get();
        return $comment;
    }
    public function showByStatus($id)
    {
        $comment = Comment::where('status', $id)->get();
        return $comment;
    }

    public function store(Request $request)
    {
        $comment = Comment::create($request->all());

        return response()->json($comment, 201);
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());

        return response()->json($comment, 200);
    }

    // public function delete(Comment $comment)
    // {
    //     $comment->delete();

    //     return response()->json(null, 204);
    // }
}
