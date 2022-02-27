<?php

namespace App\Http\Controllers;

// use Carbon\Carbon;
use App\Models\Catagory;
use App\Models\Post;
use App\Models\Rating;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index');
    }
    public function getDataExceptUser()
    {
        $post = Post::with('catagory:id,title', 'tags:id,title', 'user:id,uname')->get();
        // dd($post);

        return DataTables::of($post)
            ->addColumn('Actions', function ($row) {

                return
                    '<div class="btn-group" role="group" aria-label="Basic mixed styles example">

                    <button type="button" class="btn btn-theme-warning"data-toggle="modal" data-target="#modal-view-post-exceptUser" id="modal-btn-view-post-exceptUser" data-id="' . $row['id'] . '">View</button>

                    <button type="button" class="btn btn-theme-danger"data-toggle="modal" data-target="#modal-delete-post-exceptUser" id="modal-btn-delete-post-exceptUser" data-id="' . $row['id'] . '">Delete</button>

                </div>';

            })
            ->addColumn('Status', function ($row) {
                if ($row['status'] == 0) {
                    return '<h5><span class="badge badge-warning" data-id="">Pending</span></h5>';
                } else {
                    return '<h5><span class="badge badge-success" data-id="">Published</span></h5>';
                }
            })
            ->addColumn('Catagory_Name', function ($row) {
                return $row['catagory']['title'];
            })
            ->addColumn('Author_Name', function ($row) {
                return $row['user']['uname'];
            })
            ->addColumn('Tags_Name', function ($row) {
                $totalTag = $row['tags'];
                while (count($totalTag) > 0) {
                    $tTitle = [];
                    foreach ($totalTag as $singleTag) {
                        $tTitle[] = $singleTag['title'];
                    }
                    return implode(", ", $tTitle);
                }
            })
            ->addColumn('Published_at', function ($row) {
                if ($row['status'] == 0) {
                    return 'Not avaliable';
                } else {
                    // return $row->published_at->format('d-M-Y');
                    $published_at = Carbon::parse($row->published_at);

                    return $published_at->format('d-M-Y');

                }

            })
            ->addColumn('Created_At', function ($row) {
                return $row->created_at->format('d-M-Y');

            })
            ->addColumn('Updated_At', function ($row) {
                return $row->updated_at->format('d-M-Y');
            })
            ->rawColumns(['Actions', 'Status', 'Catagory_Name', 'Author_Name', 'Tags_Name', 'Created_At', 'Updated_At', 'Published_at'])
            ->make(true);
    }
    /**
     *  Loading DataTables Data through Ajax Request
     */
    public function getData()
    {
        $post = Post::with('catagory:id,title', 'tags:id,title', 'user:id,uname')->where('user_id', Auth::id());

        // dd($post);
        return DataTables::of($post)
            ->addColumn('Actions', function ($row) {
                if ($row['status'] == 0) {
                    return
                        '<div class="btn-group" role="group" aria-label="Basic mixed styles example">

                        <button type="button" class="btn btn-theme-warning"data-toggle="modal" data-target="#modal-view-post" id="modal-btn-view-post" data-id="' . $row['id'] . '">View</button>

                        <a href="post/' . $row['id'] . '/edit" class="btn btn-theme-success stretched-link">Update</a>

                        <button type="button" class="btn btn-theme-danger"data-toggle="modal" data-target="#modal-delete-post" id="modal-btn-delete-post" data-id="' . $row['id'] . '">Delete</button>

                        <button type="button" class="btn btn-theme-info"data-toggle="modal" data-target="" id="post-btn-published" data-id="' . $row['id'] . '">Publish</button>

                </div>';
                } else {
                    return
                        '<div class="btn-group" role="group" aria-label="Basic mixed styles example">

                    <button type="button" class="btn btn-theme-warning"data-toggle="modal" data-target="#modal-view-post" id="modal-btn-view-post" data-id="' . $row['id'] . '">View</button>

                    <button type="button" class="btn btn-theme-danger"data-toggle="modal" data-target="#modal-delete-post" id="modal-btn-delete-post" data-id="' . $row['id'] . '">Delete</button>

                </div>';
                }

            })
            ->addColumn('Status', function ($row) {
                if ($row['status'] == 0) {
                    return '<h5><span class="badge badge-warning" data-id="">Pending</span></h5>';
                } else {
                    return '<h5><span class="badge badge-success" data-id="">Published</span></h5>';
                }
            })
            ->addColumn('Catagory_Name', function ($row) {
                return $row['catagory']['title'];
            })
            ->addColumn('Author_Name', function ($row) {
                return $row['user']['uname'];
            })
            ->addColumn('Tags_Name', function ($row) {
                $totalTag = $row['tags'];
                while (count($totalTag) > 0) {
                    $tTitle = [];
                    foreach ($totalTag as $singleTag) {
                        $tTitle[] = $singleTag['title'];
                    }
                    return implode(", ", $tTitle);
                }
            })
            ->addColumn('Published_at', function ($row) {
                if ($row['status'] == 0) {
                    return 'Not avaliable';
                } else {
                   
                    $published_at = Carbon::parse($row->published_at);
                    return $published_at->format('d-M-Y');
                }
            })
            ->addColumn('Created_At', function ($row) {
                return $row->created_at->format('d-M-Y');
               
            })
            ->addColumn('Updated_At', function ($row) {
                return $row->updated_at->format('d-M-Y');
            })
            ->rawColumns(['Actions', 'Status', 'Catagory_Name', 'Author_Name', 'Tags_Name', 'Created_At', 'Updated_At', 'Published_at'])
            ->make(true);
    }
    /**
     *  load data into view modal through Ajax
     */
    public function info($id)
    {
        $PostDetails = Post::with('catagory:id,title', 'tags:id,title', 'user:id,uname')->find($id);
        return response()->json(['PostDetails' => $PostDetails]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $showTags = Tag::select('id', 'title')->get();
        $showCats = Catagory::select('id', 'title')->get();
        $user_id = Auth::id();

        return view('post.create', compact('showTags', 'showCats', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            // return response()->json(['code' => 1, 'success' => 'ok']);

            $post->user_id = Auth::id();
            $post->catagory_Id = $request->input('selectCat');
            $post->title = $request->input('title');
            $post->metatitle = Str::slug($request->input('title'));
            $post->desc = $request->input('desc');
            $post->status = 0;
            $selectedTag = $request->input('selectedTag');

           
            $query = $post->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
            } else {
                $rating = new Rating;
                $rating->user_id = Auth::id();
                $rating->post_id = $post->id;
                $rating->save();

                $post->tags()->attach($selectedTag);

                return response()->json(['code' => 1, 'msg' => 'Successfully Created']);              
            }

        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $SelectedDetails = $post;
        $showTags = Tag::select('id', 'title')->get();
        $showCats = Catagory::select('id', 'title')->get();
        return view('post.edit', compact('SelectedDetails', 'showTags', 'showCats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            // 'selectCat' => 'required',
            // 'selectTag' => 'required',
            'title' => 'required',
            'desc' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $SelectedDetails = $post->with('catagory:id,title', 'tags:id,title', 'user:id,uname')->find($post->id);
            $tagId = [];
            foreach ($SelectedDetails->tags as $key => $value) {
                $tagId[] = $value->id;
            }
            $post->title = $request->input('title');
            $post->metatitle = Str::slug($request->input('title'));
            $post->desc = $request->input('desc');
            $post->status = 0;
            $post->created_at = Carbon::now();
            $post->updated_at = Carbon::now();
            $selectedTag = $request->input('selectedTag');
            $query = $post->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
            } else {
                $rating = new Rating();
                $rating->user_id = Auth::id();
                $rating->post_id = $post->id;
                $rating->save();
                //-----
                $post->tags()->detach($tagId);
                $post->tags()->attach($selectedTag);
                return response()->json(['code' => 1, 'msg' => 'Successfully Created']);

            }

        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach($post->id);

        $query = $post->delete();
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        } else {

            return response()->json(['code' => 1, 'msg' => 'Post Deleted Successfully']);
        }
    }
    /**
     *  Published Functionality
     */
    public function publish(Request $request, Post $post)
    {
        if ($post->status != 0) {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        } else {
            $post->status = 1;
            $post->published_at = Carbon::now();
            $query = $post->save();
            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Post Published Successfully']);
            }
        }

    }
}
