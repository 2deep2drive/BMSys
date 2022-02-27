<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth','verified']);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        /**
         * functions related to ADMIN panel
         */
        $admin = DB::table('role_user')
            ->where('role_id', 1)
            ->count();
        $mod = DB::table('role_user')
            ->where('role_id', 2)
            ->count();
        $user = DB::table('role_user')
            ->where('role_id', 3)
            ->count();
        /**
         *  functions related to USER panel
         */

        // total No of post
        $posts = Post::where('user_id', Auth::id())
            ->count();

        // total no of like got by a perticuler author
        $post_id = Post::where('user_id', Auth::id())->pluck('id')->toArray();

        // --- Total no of likes on your post
        $NOL = Rating::whereIn('post_id', $post_id)->sum('like');

        // --- Total no of comments on your post
        $NOC = Comment::whereIn('post_id', $post_id)->count('title');

        $listOfTotalNoOfIndivisualLike = Post::where('user_id', Auth::id())->where('status', 1)
            ->withCount([
                'ratings as like_count' => function ($query) {
                    $query->where('like', 1);},

            ])
            ->pluck('like_count', 'id')->toArray();
        arsort($listOfTotalNoOfIndivisualLike);
        reset($listOfTotalNoOfIndivisualLike);

        $idOfTheMostLikedPOst = key($listOfTotalNoOfIndivisualLike);
        // $LikedPostDetails = Post::with('catagory:id,title', 'tags:id,title', 'user:id,uname')->find($idOfTheMostLikedPOst);
        $LikedPostDetails = Post::find($idOfTheMostLikedPOst);

                // --- Most commented post
        $listOfTotalNoOfIndivisualComment = Post::whereIn('id', $post_id)->where('status', 1)->withCount('comments')->pluck('comments_count', 'id')->toArray();
        arsort($listOfTotalNoOfIndivisualComment);
        reset($listOfTotalNoOfIndivisualComment);
        $idOfTheMostCommentedPOst = key($listOfTotalNoOfIndivisualComment);
        // $CommentedPostDetails = Post::with('catagory:id,title', 'tags:id,title', 'user:id,uname')->find($idOfTheMostCommentedPOst);

        $CommentedPostDetails = Post::find($idOfTheMostCommentedPOst);
        return view('dashboard', compact('posts', 'NOL', 'NOC', 'LikedPostDetails', 'CommentedPostDetails', 'admin', 'mod', 'user'));

    }

}
