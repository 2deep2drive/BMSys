@extends('layouts.dashboard')

@section('content')
    <div class="row p-5">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>

            @role('admin')
                <!-- Content Row -->
                <div class="row">
                    <!-- Number of posts -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total No of Admin
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $admin }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-clipboard fa-2x text-gray-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Number of likes -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total No of Moderator
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $mod }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-heart fa-2x text-gray-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Number of Comments -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total No of Author
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $user }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-comment fa-2x text-gray-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endrole
                @role('user')
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Number of posts -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total No of Posts
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $posts }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-clipboard fa-2x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Number of likes -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total No of Likes
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $NOL }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-heart fa-2x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Number of Comments -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total No of Comments
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $NOC }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-comment fa-2x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Number of Share -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total No of Share
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                xxxxxxxxxx
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-paper-plane fa-2x text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Most Commented Post -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold  text-gray-800">
                                        Most Commented Post
                                    </h6>
                                </div>
                                <div class="card-body">

                                    @if (is_null($CommentedPostDetails))
                                        <div class="card-header custom-card-header border-0">
                                            <div class="d-flex flex-row">
                                                <div class="p-1">
                                                    <img src="https://via.placeholder.com/60 " alt="" class="rounded-circle">
                                                </div>
                                                <div class="p-2">
                                                    <div class="d-flex flex-column">
                                                        <div class="">
                                                            <h3>no post found </h3>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card custom-card mb-3 border-0">
                                            <div class="card-header custom-card-header border-0">
                                                <div class="d-flex flex-row">
                                                    <div class="p-1">
                                                        @if ($CommentedPostDetails->user->isVerified == 0)
                                                            <img src="{{ asset($CommentedPostDetails->user->img_path) }}"
                                                                class="home_user_profile " alt="" id="">
                                                        @elseif($CommentedPostDetails->user->isVerified == 1)
                                                            <img src="{{ asset($CommentedPostDetails->user->avatar) }}"
                                                                class="home_user_profile" alt="" id="">
                                                        @elseif($CommentedPostDetails->user->isVerified == 2)
                                                            <img src="{{ asset($CommentedPostDetails->user->avatar) }}"
                                                                class="home_user_profile" alt="" id="">
                                                        @endif
                                                    </div>
                                                    <div class="p-2">
                                                        <div class="d-flex flex-column">
                                                            <div class="">
                                                               
                                                                <span><code>{{ $CommentedPostDetails->user->uname }}</code></span>
                                                            </div>
                                                            <div>
                                                                <code class="text-dark">
                                                                    posted on <span>
                                                                        {{ date('dS,M-Y', strtotime($CommentedPostDetails->created_at)) }}</span>
                                                                </code>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <h4 class="font-weight-bold pb-2">
                                                        {{ $CommentedPostDetails->title }}
                                                    </h4>
                                                </div>
                                                <div class="border-left postEditor">
                                                    <textarea cols="30" rows="10" class="postDesc d-none" disabled>
                                                                                                                        {{ Str::limit($CommentedPostDetails->desc, 500) }}
                                                                                                                    </textarea>
                                                </div>
                                                <div class="mt-2">
                                                    @foreach ($CommentedPostDetails->tags as $item)
                                                        <h2 class="badge badge-theme-warning  p-2  m-1"
                                                            style="font-size:16px;cursor:pointer"><i class="fas fa-tag"></i>
                                                            {{ $item->title }}
                                                        </h2>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--  Most Liked Post -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-gray-800">
                                        Most Liked Post
                                    </h6>
                                </div>
                                <div class="card-body">

                                    @if (is_null($LikedPostDetails))
                                        <div class="card-header custom-card-header border-0">
                                            <div class="d-flex flex-row">
                                                <div class="p-1">
                                                    <img src="https://via.placeholder.com/60 " alt="" class="rounded-circle">
                                                </div>
                                                <div class="p-2">
                                                    <div class="d-flex flex-column">
                                                        <div class="">
                                                            <h3>no post found </h3>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card custom-card mb-3 border-0">
                                            <div class="card-header custom-card-header border-0">
                                                <div class="d-flex flex-row">
                                                    <div class="p-1">
                                                        @if ($CommentedPostDetails->user->isVerified == 0)
                                                            <img src="{{ asset($CommentedPostDetails->user->img_path) }}"
                                                                class="home_user_profile " alt="" id="">
                                                        @elseif($CommentedPostDetails->user->isVerified == 1)
                                                            <img src="{{ asset($CommentedPostDetails->user->avatar) }}"
                                                                class="home_user_profile" alt="" id="">
                                                        @elseif($CommentedPostDetails->user->isVerified == 2)
                                                            <img src="{{ asset($CommentedPostDetails->user->avatar) }}"
                                                                class="home_user_profile" alt="" id="">
                                                        @endif
                                                    </div>
                                                    <div class="p-2">
                                                        <div class="d-flex flex-column">
                                                            <div class="">
                                                                <span><code>{{ $LikedPostDetails->user->uname }}</code></span>
                                                            </div>
                                                            <div>
                                                                <code class="text-dark">
                                                                    posted on <span>
                                                                        {{ date('dS,M-Y', strtotime($LikedPostDetails->created_at)) }}</span>
                                                                </code>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <h4 class="font-weight-bold pb-2">
                                                        {{ $LikedPostDetails->title }}
                                                    </h4>
                                                </div>
                                                <div class="border-left postEditor">
                                                    <textarea cols="30" rows="10" class="postDesc d-none" disabled>
                                                                     {{ Str::limit($LikedPostDetails->desc, 500) }}
                                                                    </textarea>

                                                </div>
                                                <div class="mt-2">
                                                    @foreach ($LikedPostDetails->tags as $item)
                                                        <h2 class="badge badge-theme-warning  p-2  m-1"
                                                            style="font-size:16px;cursor:pointer"><i
                                                                class="fas fa-tag"></i>
                                                            {{ $item->title }}
                                                        </h2>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                @endrole
            </div>
        </div>
    @endsection
