@extends('layouts.dashboard')

@section('content')
    <div class="row p-5">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Posts</h1>
                @role(['admin','user'])
                    {{-- <div class="row p-2 pl-3"> --}}
                    <a href="{{ route('post.create') }}" class="btn btn-theme-success float-right">Create Post</a>
                    {{-- </div> --}}
                @endrole
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row p-2 pl-3 d-flex justify-content-between">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-theme-danger d-none" data-toggle="modal"
                                        data-target="#modal-deleteAll-post" id="post-btn-deleteAll">
                                        {{-- <i class="far fa-trash-alt"></i> --}}
                                        Delete All
                                    </button>
                                </div>
                                <div class="float-right pr-2">
                                    <div class="dropdown">
                                        <button class="btn  btn-theme-1-pri dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                            Select Columns
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                            id="table-post-links" style="cursor: pointer;">


                                            <a class="toggle-vis dropdown-item" data-column="1">Author</a>
                                            <a class="toggle-vis dropdown-item" data-column="2">Catagory</a>
                                            <a class="toggle-vis dropdown-item" data-column="3">Tags</a>
                                            <a class="toggle-vis dropdown-item" data-column="4">Title</a>
                                            <a class="toggle-vis dropdown-item" data-column="5">Metatitle</a>
                                            <a class="toggle-vis dropdown-item" data-column="6">Status</a>
                                            <a class="toggle-vis dropdown-item" data-column="7">Published_at</a>
                                            <a class="toggle-vis dropdown-item" data-column="8">Created_at</a>
                                            <a class="toggle-vis dropdown-item" data-column="9">Updated_at</a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                @role(['admin', 'mod'])
                                    <table class="table table-hover table-bordered w-100" id="table-post-exceptUser">
                                    @endrole
                                    @role(['user'])
                                        <table class="table table-hover table-bordered w-100" id="table-post">
                                        @endrole
                                        <thead>
                                            <tr>

                                            </tr>
                                            <tr>
                                                <th>id </th>
                                                <th>Author</th>
                                                <th>Catagory</th>
                                                <th>Tags</th>
                                                <th>Title</th>
                                                <th>Metatitle</th>
                                                <th>Status</th>
                                                <th>Published_at</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @role(['admin', 'mod'])
            <!-- view post -->
            <div class="modal fade" id="modal-view-post-exceptUser" data-backdrop="static" data-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title m-0 font-weight-bold text-primary" id="staticBackdropLabel">Post View
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                id="post-btn-viewCancle">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card custom_card mb-3 border-0">
                                <div class="card-header custom_card-header border-0">
                                    <div class="d-flex flex-row">
                                        <div class="p-1">
                                            <img src="https://via.placeholder.com/60 " alt="" class="rounded-circle">
                                        </div>
                                        <div class="px-3">
                                            <div class="d-flex flex-column">
                                                <div class="my-2" id="uname">
                                                </div>
                                                <div id="publishedDate">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <h2 class="font-weight-bold pb-2" id="title">
                                        </h2>
                                    </div>
                                    <div class="border-left p-3">
                                        <div id="desc"></div>
                                    </div>
                                    <div id="tags" class="my-2"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!-- delete post -->
            <div class="modal fade" id="modal-delete-post-exceptUser" data-backdrop="static" data-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('post.destroy', '') }}" method="post" id="form-delete-post-exceptUser">
                            @csrf
                            {{ method_field('DELETE') }}
                            <div class="modal-header border-0">
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id">
                                <div class="mb-3">
                                    <h4 class="text-center text-danger font-weight-bold">
                                        Are You Sure ?
                                    </h4><br>
                                    <h5 class="font-weight-bold text-center">
                                        You want to delete this Post
                                    </h5>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-around border-0 p-4">
                                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endrole
        @role(['user'])
            <!-- view post -->
            <div class="modal fade" id="modal-view-post" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title m-0 font-weight-bold text-primary" id="staticBackdropLabel">Post View
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                id="post-btn-viewCancle">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card custom_card mb-3 border-0">
                                <div class="card-header custom_card-header border-0">
                                    <div class="d-flex flex-row">
                                        <div class="p-1">
                                            <img src="https://via.placeholder.com/60 " alt="" class="rounded-circle">
                                        </div>
                                        <div class="px-3">
                                            <div class="d-flex flex-column">
                                                <div class="my-2" id="uname">
                                                </div>
                                                <div id="publishedDate">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <h2 class="font-weight-bold pb-2" id="title">
                                        </h2>
                                    </div>
                                    <div class="border-left p-3">
                                        <div id="desc"></div>
                                    </div>
                                    <div id="tags" class="my-2"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!-- delete post -->
            <div class="modal fade" id="modal-delete-post" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('post.destroy', '') }}" method="post" id="form-delete-post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <div class="modal-header border-0">
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id">
                                <div class="mb-3">
                                    <h4 class="text-center text-danger font-weight-bold">
                                        Are You Sure ?
                                    </h4><br>
                                    <h5 class="font-weight-bold text-center">
                                        You want to delete this Post
                                    </h5>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-around border-0 p-4">
                                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endrole
    </div>
@endsection
