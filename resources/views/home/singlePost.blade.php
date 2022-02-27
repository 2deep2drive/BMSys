@extends('layouts.home')

@section('content')
    <div class="col-md-8 ">
        {{--  --}}
        {{-- <div class="card custom_card mb-3 border-0 " >
            <div class="card-header custom-card-header border-0"> --}}
                <div class="card  mb-3 border-0 mb-5 shadow-1" style="border-left: 1px solid rgba(0, 0, 0, 0.05) !important">
                    <div class="card-header custom-card-header border-0 rounded-0" >
                <div class="d-flex flex-row">
                    <div class="p-1">
                        <img src="https://via.placeholder.com/60 " alt="" class="rounded-circle">
                    </div>
                    <div class="p-2">
                        <div class="d-flex flex-column">
                            <div class="">
                                <span><code style="font-size: 17px !important;">{{ $postDetails->user->uname }}</code></span>
                            </div>
                            <div>
                                <code class="text-dark">
                                  <span >  posted on <code>{{ date('dS,M-Y', strtotime($postDetails->created_at)) }}</code></span>
                                </code>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

               
                <div>
                    <h4 class="font-weight-bold pb-2">
                         {{ $postDetails->title }}
                    </h4>
                </div>
                <div class="">
                    <h6 class="px-2">
                        {{-- {{ $postDetail->catagory->title }} --}}
                        <a href="/post/byCatagory/{{ $postDetails->catagory->id }}" class="text-primary">
                            {{ $postDetails->catagory->title }}
                        </a>
                    </h6>

                </div>
                <div class="border-left">
                    <textarea name="" id="" cols="" rows="" class="postDesc d-none" disabled>
                    {{($postDetails->desc) }}
                     </textarea>

                </div>
                <div class="mt-2">
                           
                    @foreach ($postDetails->tags as $item)
                        {{-- <h2 class="badge badge-warning  ml-2 py-1 px-2" style="font-size:16px;cursor:pointer"><i class="fas fa-tag"></i>
                        {{($item->title)}}
                       </h2> --}}

                       <a href="/post/byTag/{{ $item->id }}" class="badge badge-theme-warning  p-2  m-1">
                        <i class="fas fa-tag"></i><span class="px-2"
                            style="font-size:14px;cursor:pointer">{{ $item->title }}</span>
                    </a>
                      
                    @endforeach
                </div>
            </div>
            <div class="card-footer custom-card-footer border-0 rounded-0 py-1">
                <div class="d-flex">
                    {{-- link & dislike --}}
                    <div class="p-2">
                        <div class="btn-group border rounded-pill rating" role="group" aria-label="Basic example">

                            @if ($postDetails->likedByUser == 1)
                            <div class="border like_gup" id="like-{{ $postDetails->id }}">

                                <button type="button" class="btn btn-default like"
                                    data-post_id="{{ $postDetails->id }}"
                                    data-likedByCurUser={{ $postDetails->likedByUser }}>
                                    <i class="fas fa-chevron-up icon_like" id="icon-like"></i>
                                </button>

                                <span class="pr-2 py-1 LC" style="font-size: 18px;" id="LC">
                                    {{ $postDetails->like_count }}
                                </span>
                            </div>
                        @else
                            <div class="border like_gup" id="like-{{ $postDetails->id }}">

                                <button type="button" class="btn btn-default like"
                                    data-post_id="{{ $postDetails->id }}"
                                    data-likedByCurUser={{ $postDetails->likedByUser }}>
                                    <i class="fas fa-chevron-up" id="icon-like"></i>
                                </button>

                                <span class="pr-2 py-1 LC" style="font-size: 18px;" id="LC">
                                    {{ $postDetails->like_count }}
                                </span>
                            </div>
                        @endif



                            @if ($postDetails->dislikedByUser == 1)
                                        <div class="border dislike_gup" id="dislike-{{ $postDetails->id }}">
                                            <button type="button" class="btn btn-default dislike"
                                                data-post_id="{{ $postDetails->id }}"
                                                data-dislikedByUser={{ $postDetails->dislikedByUser }}>
                                                <i class="fas fa-chevron-down icon_dislike" id="icon-dislike"></i>
                                            </button>

                                            <span class="pr-2 py-1 DLC" style="font-size: 18px;" id="DLC">
                                                {{ $postDetails->dislike_count }}
                                            </span>
                                        </div>
                                    @else
                                        <div class="border dislike_gup" id="dislike-{{ $postDetails->id }}">
                                            <button type="button" class="btn btn-default dislike"
                                                data-post_id="{{ $postDetails->id }}"
                                                data-dislikedByUser={{ $postDetails->dislikedByUser }}>
                                                <i class="fas fa-chevron-down" id="icon-dislike"></i>
                                            </button>

                                            <span class="pr-2 py-1 DLC" style="font-size: 18px;" id="DLC">
                                                {{ $postDetails->dislike_count }}
                                            </span>
                                        </div>
                                    @endif

                        </div>
                    </div>
                    {{-- comment --}}
                    <div class="p-2">
                        <div class=" btn-group-toggle border rounded-pill">
                            <a href="/post/{{ $postDetails->id }}" class="btn btn-default active">
                                <i class="far fa-comment"></i>
                            </a>
                        </div>
                    </div>
                    {{-- share --}}
                    <div class="p-2">
                        <div class=" btn-group-toggle border rounded-pill share_div" data-toggle="buttons">
                            <label class="btn btn-default l active">
                                <input type="checkbox" class="share" name="share">
                                <i class="far fa-paper-plane"></i>
                            </label>
                        </div>
                    </div>
                    {{-- bookmark --}}
                    {{-- <div class="ml-auto p-2">
                        <div class=" btn-group-toggle border rounded-pill bookmark_div" data-toggle="buttons">
                            <label class="btn btn-default">
                                <input type="checkbox" class="bookmark" name="bookmark"  data-post_id="{{ $postDetails->id }}">
                                <i class="far fa-bookmark"></i>
                            </label>
                        </div>
                    </div> --}}
                </div>

            </div>
            <!-- Comments type -->
            <div class="p-3 " id="comment_card" data-post_id="{{ $postDetails->id }}">
                <div class="card custom_card border-0 shadow-none">
                    <div class="card-header custom_card-header border-0">
                        <h4>
                            Leave a Comment
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('comment.store') }}" method="post" id="comment_form">
                            <input type="hidden" id="post_id" name="post_id" value="{{ $postDetails->id }}">

                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="title" name="title"></textarea>
                                <span class="text-danger error-text title_error"></span>
                            </div>
                            <div class="float-right">
                                <button type="reset" class="btn btn-theme-danger">Cancle</button>
                                <button type="submit" class="btn btn-theme-dark">Comment</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer custom_card-footer border-0">
                        <h4>
                            Comments
                        </h4>
                    </div>
                </div>

                <!--  -->
                <!-- single comment -->
                <div id="commentDiv"></div>

                <!-- single comment -->

                @foreach ($postDetails->comments as $comment)
                    <div class="media  pl-2 pr-3 pt-2 border-left mt-2 rounded-left" style="background-color:#F8F8F8">
                        <img class="d-flex mr-3 rounded-circle userImage" src="{{asset($comment->user->img_path) }}" alt="" >
                        <div class="media-body">
                            <div class="d-flex  justify-content-between">
                                <span><code style="font-size: 16px !important">{{ $comment->user->uname }}</code></span>
                                <span style="font-size: 14px !important"> Commented on: <code style="font-size: 14px !important">{{ date('M d, Y', strtotime($comment->created_at)) }}</code></span>
                            </div>

                            <p class="p-2 rounded" style="background-color:#E8E8E8"> {{ $comment->title }}</p>
                            <div class="d-flex">
                                {{-- link & dislike --}}
                                {{-- <div class="p-2">
                                    <div class="btn-group" role="group" aria-label="">

                                        <div class="border " id="Clike-{{ $postDetails->id }}">

                                            <button type="button" class="btn btn-default Clike"
                                                data-post_id="{{ $postDetails->comments }}" data-comment_id="">
                                                <i class="fas fa-chevron-up"></i>
                                            </button>

                                            <span class="pr-2 py-1 CLC" style="font-size: 18px;" id="CLC">
                                                {{ $postDetails->Clike_count }}
                                            </span>
                                        </div>

                                        <div class="border " id="Cdislike-{{ $postDetails->id }}">
                                            <button type="button" class="btn btn-default Cdislike"
                                                data-post_id="{{ $postDetails->id }}">
                                                <i class="fas fa-chevron-down"></i>
                                            </button>

                                            <span class="pr-2 py-1 CDLC" style="font-size: 18px;" id="CDLC">
                                                {{ $postDetails->Cdislike_count }}
                                            </span>
                                        </div>

                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
    </div>
    <div class="col-md-4 ">
        <div class="position-fixed ml-3">
            @include('inc.footer')
        </div>
    </div>
@endsection

