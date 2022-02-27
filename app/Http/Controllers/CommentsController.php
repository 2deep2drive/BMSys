<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function getData(Request $request, $id)
    {
        //  $id;
        $comments = Comment::where('post_id', $id)->where('user_id', Auth::id())->orderBy('created_at', 'desc')->with('user:id,uname,img_path')->first();

        return response()->json(['code' => 1, 'msg' => $comments]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $validator = Validator::make($request->all(), [
            'title' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            // return response()->json(['code' => 1, 'success' => 'ok']);

            $comment->user_id = Auth::id();
            $comment->post_id = $request->post_id;
            $comment->title = $request->title;
            $query = $comment->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
            } else {

                return response()->json(['code' => 1, 'msg' => ' Commented Successfully']);

            }

        }
    }
}
