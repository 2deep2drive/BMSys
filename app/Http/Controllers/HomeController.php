<?php

namespace App\Http\Controllers;

use App\Models\bookmark;
use App\Models\Catagory;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     *  Showing data into index page
     */
    public function index()
    {
        $postDetails = Post::where('status', 1)->with('catagory:id,title', 'tags:id,title', 'user:id,uname,isVerified,avatar,img_path', 'ratings')
            ->withCount([
                'ratings as like_count' => function ($query) {
                    $query->where('like', 1);},
                'ratings as dislike_count' => function ($query) {
                    $query->where('dislike', 1);},
                'ratings as cliclkCount' => function ($query) {
                    $query->select('isClicked')->where('user_id', Auth::id());},
                'ratings as likedByUser' => function ($query) {
                    $query->where('user_id', Auth::id())->where('like', 1);},
                'ratings as dislikedByUser' => function ($query) {
                    $query->where('user_id', Auth::id())->where('dislike', 1);},
            ])
            ->paginate(2);

        $tags = Tag::all();
        $catagories = Catagory::all();

        return view('index')->with(compact('postDetails'))->with(compact('tags'))->with(compact('catagories'));
    }
    /**
     *  Recently published Post
     */
    public function recentPost()
    {
        $postDetails = Post::orderBy('published_at', 'desc')->where('status', 1)->with('catagory:id,title', 'tags:id,title', 'user:id,uname', 'ratings')
            ->withCount([
                'ratings as like_count' => function ($query) {
                    $query->where('like', 1);},
                'ratings as dislike_count' => function ($query) {
                    $query->where('dislike', 1);},
                'ratings as cliclkCount' => function ($query) {
                    $query->select('isClicked')->where('user_id', Auth::id());},
                'ratings as likedByUser' => function ($query) {
                    $query->where('user_id', Auth::id())->where('like', 1);},
                'ratings as dislikedByUser' => function ($query) {
                    $query->where('user_id', Auth::id())->where('dislike', 1);},

            ])
            ->paginate(2);
        $tags = Tag::all();
        $catagories = Catagory::all();

        return view('home.recentPost')->with(compact('postDetails'))->with(compact('tags'))->with(compact('catagories'));
    }
    /**
     *  Oldest published Post
     */
    public function oldestPost()
    {
        $postDetails = Post::orderBy('published_at', 'asc')->where('status', 1)->with('catagory:id,title', 'tags:id,title', 'user:id,uname', 'ratings')
            ->withCount([
                'ratings as like_count' => function ($query) {
                    $query->where('like', 1);},
                'ratings as dislike_count' => function ($query) {
                    $query->where('dislike', 1);},
                'ratings as cliclkCount' => function ($query) {
                    $query->select('isClicked')->where('user_id', Auth::id());},
                'ratings as likedByUser' => function ($query) {
                    $query->where('user_id', Auth::id())->where('like', 1);},
                'ratings as dislikedByUser' => function ($query) {
                    $query->where('user_id', Auth::id())->where('dislike', 1);},

            ])
            ->paginate(2);
        $tags = Tag::all();
        $catagories = Catagory::all();
        return view('home.oldestPost')->with(compact('postDetails'))->with(compact('tags'))->with(compact('catagories'));
    }

    /**
     *  Showing Data By Catagory
     */
    public function byCatagory($id)
    {
        $postDetails = Post::where('catagory_id', $id)->where('status', 1)->with('catagory:id,title', 'tags:id,title', 'user:id,uname', 'ratings')
            ->withCount([
                'ratings as like_count' => function ($query) {
                    $query->where('like', 1);},
                'ratings as dislike_count' => function ($query) {
                    $query->where('dislike', 1);},
                'ratings as cliclkCount' => function ($query) {
                    $query->select('isClicked')->where('user_id', Auth::id());},
                'ratings as likedByUser' => function ($query) {
                    $query->where('user_id', Auth::id())->where('like', 1);},
                'ratings as dislikedByUser' => function ($query) {
                    $query->where('user_id', Auth::id())->where('dislike', 1);},
            ])
            ->paginate(2);
        $tags = Tag::all();
        $catagories = Catagory::all();

        return view('home.byCatagory')->with(compact('postDetails'))->with(compact('tags'))->with(compact('catagories'));
    }

    /**
     *  Showing Indivisual post
     */
    public function singlePost($id)
    {

        $postDetails = Post::find($id)->where('status', 1)->with('catagory:id,title', 'tags:id,title', 'user:id,uname', 'comments')
            ->withCount(['ratings',
                'ratings as like_count' => function ($query) {
                    $query->where('like', 1);},
                'ratings as dislike_count' => function ($query) {
                    $query->where('dislike', 1);},
                'ratings as cliclkCount' => function ($query) {
                    $query->select('isClicked')->where('user_id', Auth::id());},
                'ratings as likedByUser' => function ($query) {
                    $query->where('user_id', Auth::id())->where('like', 1);},
                'ratings as dislikedByUser' => function ($query) {
                    $query->where('user_id', Auth::id())->where('dislike', 1);},
            ])
            ->withCount([
                'comments as Clike_count' => function ($query) {
                    $query->where('like', 1);},
                'comments as Cdislike_count' => function ($query) {
                    $query->where('dislike', 1);},
            ])
            ->find($id);
        return view('home.singlePost')->with('postDetails', $postDetails);

    }
    /**
     *  Bookmark System
     */
    public function addBookmark($id)
    {
        $bookmark = new Bookmark;
        $bookmark->user_id = Auth::id();
        $bookmark->post_id = $id;
        $bookmark->status = 1;
        $query = $bookmark->save();
        if (!$query) {
            return response()->json(['code' => 0, 'error' => 'Something went Wrong']);
        } else {
            return response()->json(['code' => 1, 'error' => 'Bookmarked successfully']);
        }

    }
    public function removeBookmark($id)
    {

        $bookmark = Bookmark::where('post_id', $id);
        $query = $bookmark->delete();
        if (!$query) {
            return response()->json(['code' => 0, 'error' => 'Something went Wrong']);
        } else {
            return response()->json(['code' => 1, 'error' => 'Bookmarked  deleted successfully']);
        }

    }

}
