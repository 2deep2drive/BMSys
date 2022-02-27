<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function like(Request $request)
    {
        $userCount = Rating::where('user_id', Auth::id())->where("post_id", $request->pId)->first();
        //when there is no user present related to that post
        if (is_null($userCount)) {
            $rating = new Rating;
            $rating->user_id = Auth::id();
            $rating->post_id = $request->pId;
            $rating->like = 1;
            $rating->isClicked = 1;
            $query = $rating->save();
            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
            } else {
                $like = Rating::where("like", 1)->where('post_id', $request->pId)->count();
                return response()->json(['code' => 1, 'status' => 1, 'msg' => 'u have like the post for the first time', 'like' => $like]);
            }
        } 
        else {
            // like the post when everything is nutral
            if ($userCount->isClicked == 0 && $userCount->like == 0 && $userCount->dislike == 0) {
                $userCount->like = 1;
                $userCount->dislike = 0;
                $userCount->isClicked = 1;
                $query = $userCount->save();
                if (!$query) {
                    return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
                } else {

                    $like = Rating::where("like", 1)->where('post_id', $request->pId)->count();
                    return response()->json(['code' => 1, 'status' => 2, 'msg' => 'u like the post from nutral', 'like' => $like]);
                }
            }
            // u like the post when it was dislike
            elseif ($userCount->isClicked == 1 && $userCount->dislike == 1 && $userCount->like == 0) {
                $userCount->like = 1;
                $userCount->dislike = 0;
                $userCount->isClicked = 1;
                $query = $userCount->save();
                if (!$query) {
                    return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
                } else {
                    $like = Rating::where("like", 1)->where('post_id', $request->pId)->count();
                    $dislike = Rating::where("dislike", 1)->where('post_id', $request->pId)->count();
                    return response()->json(['code' => 1, 'status' => 3, 'msg' => 'u like the post when it was dislike', 'like' => $like, 'dislike' => $dislike]);
                }
            }
            // u removed ur like and make it nutral
            else {
                $userCount->like = 0;
                $userCount->isClicked = 0;
                $query = $userCount->save();
                if (!$query) {
                    return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
                } else {
                    $like = Rating::where("like", 1)->where('post_id', $request->pId)->count();
                    return response()->json(['code' => 1, 'status' => 4, 'msg' => 'u removed ur like and make it nutral', 'like' => $like]);
                }
            }

        }

        // }

    }

    public function dislike(Request $request)
    {

        $userCount = Rating::where('user_id', Auth::id())->where("post_id", $request->pId)->first();
        // dd($userCount);
        if (is_null($userCount)) {
            $rating = new Rating;
            $rating->user_id = Auth::id();
            $rating->post_id = $request->pId;
            $rating->dislike = 1;
            $rating->isClicked = 1;
            $query = $rating->save();
            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
            } else {
                $dislike = Rating::where("dislike", 1)->where('post_id', $request->pId)->count();
                return response()->json(['code' => 1, 'status' => 1, 'msg' => 'u have dislike the post for the first time', 'dislike' => $dislike]);
            }
        } else {
            if ($userCount->isClicked == 0 && $userCount->like == 0 && $userCount->dislike == 0) {
                $userCount->like = 0;
                $userCount->dislike = 1;
                $userCount->isClicked = 1;
                $query = $userCount->save();
                if (!$query) {
                    return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
                } else {
                    $dislike = Rating::where("dislike", 1)->where('post_id', $request->pId)->count();
                    return response()->json(['code' => 1, 'status' => 2, 'msg' => 'u dislike the post from nutral', 'dislike' => $dislike]);
                }
            } elseif ($userCount->isClicked == 1 && $userCount->like == 1 && $userCount->dislike == 0) {
                //u dislike the post when it was like

                $userCount->like = 0;
                $userCount->dislike = 1;
                $userCount->isClicked = 1;
                $query = $userCount->save();
                if (!$query) {
                    return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
                } else {

                    $like = Rating::where("like", 1)->where('post_id', $request->pId)->count();
                    $dislike = Rating::where("dislike", 1)->where('post_id', $request->pId)->count();

                    return response()->json(['code' => 1, 'status' => 3, 'msg' => 'u dislike the post when it was like', 'like' => $like, 'dislike' => $dislike]);
                }
            } else {
                // u removed ur dislike and make it nutral
                $userCount->dislike = 0;
                $userCount->isClicked = 0;
                $query = $userCount->save();
                if (!$query) {
                    return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
                } else {
                    $dislike = Rating::where("dislike", 1)->where('post_id', $request->pId)->count();
                    return response()->json(['code' => 1, 'status' => 4, 'msg' => 'u removed ur dislike and make it nutral', 'dislike' => $dislike]);
                }
            }

        }

    }

}
