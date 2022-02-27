@extends('layouts.home')

@section('content')
    <div class="col-md-8 ">
        @if (count($postDetails) > 0)
            @foreach ($postDetails as $postDetail)
                <div class="card  mb-3 border-0 mb-5 shadow-1" style="border-left: 1px solid rgba(0, 0, 0, 0.05) !important">
                    <div class="card-header custom-card-header border-0 rounded-0">
                        <div class="d-flex flex-row">
                            <div class="p-1">
                                <img src="https://via.placeholder.com/60 " alt="" class="rounded-circle">
                            </div>
                            <div class="p-2">
                                <div class="d-flex flex-column">
                                    <div class="">
                                        <span><code
                                                style="font-size: 17px !important;">{{ $postDetail->user->uname }}</code></span>
                                    </div>
                                    <div>
                                        <code class="text-dark">
                                            <span> posted on <code
                                                    class="text-dark">{{ date('dS,M-Y', strtotime($postDetail->created_at)) }}</code></span>
                                        </code>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <h4 class="font-weight-bold ">
                                {{ $postDetail->title }}
                            </h4>
                        </div>
                        <div class="">
                            <h6 class="px-2">
                                <a href="/post/byCatagory/{{ $postDetail->catagory->id }}" class="text-primary">
                                    {{ $postDetail->catagory->title }}
                                </a>
                            </h6>

                        </div>
                        <div class="border-left">
                            <textarea cols="30" rows="10" class="postDesc d-none" disabled>
                                                {{ Str::limit($postDetail->desc, 900) }}
                                            </textarea>
                            <a href="/post/{{ $postDetail->id }}" class="float-left pl-2">Show more...</a><br>
                        </div>
                        <div class="mt-2">

                            @foreach ($postDetail->tags as $item)
                                {{-- <h2 class="badge badge-theme-warning  ml-2 py-1 px-2" style="font-size:16px;cursor:pointer"><i class="fas fa-tag"></i>
                                {{($item->title)}}
                               </h2> --}}
                                <a  class="badge badge-theme-warning  p-2  m-1">
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

                                     {{--like--}}
                                     @if ($postDetail->likedByUser == 1)
                                     <div class="border like_gup" id="like-{{ $postDetail->id }}">

                                         <button type="button" class="btn btn-default like"
                                             data-post_id="{{ $postDetail->id }}"
                                             data-likedByCurUser={{ $postDetail->likedByUser }}>
                                             <i class="fas fa-chevron-up icon_like" id="icon-like"></i>
                                         </button>

                                         <span class="pr-2 py-1 LC" style="font-size: 18px;" id="LC">
                                             {{ $postDetail->like_count }}
                                         </span>
                                     </div>
                                 @else
                                     <div class="border like_gup" id="like-{{ $postDetail->id }}">

                                         <button type="button" class="btn btn-default like"
                                             data-post_id="{{ $postDetail->id }}"
                                             data-likedByCurUser={{ $postDetail->likedByUser }}>
                                             <i class="fas fa-chevron-up" id="icon-like"></i>
                                         </button>

                                         <span class="pr-2 py-1 LC" style="font-size: 18px;" id="LC">
                                             {{ $postDetail->like_count }}
                                         </span>
                                     </div>
                                 @endif
                                 {{--dislike--}}

                                 @if ($postDetail->dislikedByUser == 1)
                                     <div class="border dislike_gup" id="dislike-{{ $postDetail->id }}">
                                         <button type="button" class="btn btn-default dislike"
                                             data-post_id="{{ $postDetail->id }}"
                                             data-dislikedByUser={{ $postDetail->dislikedByUser }}>
                                             <i class="fas fa-chevron-down icon_dislike" id="icon-dislike"></i>
                                         </button>

                                         <span class="pr-2 py-1 DLC" style="font-size: 18px;" id="DLC">
                                             {{ $postDetail->dislike_count }}
                                         </span>
                                     </div>
                                 @else
                                     <div class="border dislike_gup" id="dislike-{{ $postDetail->id }}">
                                         <button type="button" class="btn btn-default dislike"
                                             data-post_id="{{ $postDetail->id }}"
                                             data-dislikedByUser={{ $postDetail->dislikedByUser }}>
                                             <i class="fas fa-chevron-down" id="icon-dislike"></i>
                                         </button>

                                         <span class="pr-2 py-1 DLC" style="font-size: 18px;" id="DLC">
                                             {{ $postDetail->dislike_count }}
                                         </span>
                                     </div>
                                 @endif

                                 {{--  --}}
                                </div>
                            </div>
                            {{-- comment --}}
                            <div class="p-2">
                                <div class=" btn-group-toggle border rounded-pill">
                                    <a href="/post/{{ $postDetail->id }}" class="btn btn-default active">
                                        <i class="far fa-comment"></i>
                                    </a>
                                </div>
                            </div>
                            {{-- share --}}
                            <div class="p-2">
                                <div class=" btn-group-toggle border rounded-pill share_div" data-toggle="buttons">
                                    {{-- <label class="btn btn-default l active">
                                        <input type="checkbox" class="share" name="share">
                                        <i class="far fa-paper-plane"></i>
                                    </label> --}}
                                    <button type="button" class="btn btn-default share"
                                        data-post_id="{{ $postDetail->id }}"
                                        data-dislikedByUser={{ $postDetail->dislikedByUser }}>
                                        <i class="far fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                            {{-- bookmark --}}
                            <div class="ml-auto p-2">
                                <div class=" btn-group-toggle border rounded-pill bookmark_div" data-toggle="buttons">
                                    <label class="btn btn-default">
                                        <input type="checkbox" class="bookmark" name="bookmark"
                                            data-post_id="{{ $postDetail->id }}">
                                        <i class="far fa-bookmark"></i>
                                    </label>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            @endforeach
            {{-- <nav aria-label="Page navigation example"> --}}
            <div class="d-flex justify-content-center pt-3">
                {{ $postDetails->links() }}

            </div>

            {{-- </nav> --}}
        @endif
    </div>
    <div class="col-md-4 ">
        <div class="position-fixed ml-3">
            @include('inc.sort')

            @include('inc.footer')
        </div>
    </div>
@endsection
