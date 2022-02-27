@extends('layouts.dashboard')

@section('content')
    <div class="row p-5">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tags</h1>
                <button type="button" class="btn btn-theme-success float-right" data-toggle="modal"
                    data-target="#modal-create-tag">
                    Create tag
                </button>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="card-title d-flex justify-content-between">
                                <div>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn  btn-theme-danger d-none" data-toggle="modal"
                                            data-target="#modal-deleteAll-tag" id="modal-btn-deleteAll-tag">
                                            Delete All
                                        </button>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <div class="dropdown">
                                        <button class="btn  btn-theme-1-pri dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                            Select Columns
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                            id="table-tag-links" style="cursor: pointer;">


                                            <a class="toggle-vis dropdown-item" data-column="2">Title</a>
                                            <a class="toggle-vis dropdown-item" data-column="3">Meta Title</a>
                                            <a class="toggle-vis dropdown-item" data-column="4">Created_at</a>
                                            <a class="toggle-vis dropdown-item" data-column="5">Updated_at</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered  " id="table-tag">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkedAll"
                                                        name="checkedAll">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    </label>
                                                </div>
                                            </th>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Meta Title</th>
                                            <th>Created_at</th>
                                            <th>Updated_at </th>
                                            <th class="text-center">Action </th>
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

        {{-- Create Modal --}}
        <div class="modal fade" id="modal-create-tag" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title m-0 font-weight-bold text-gray-800" id="staticBackdropLabel">Create Tag</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="px-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Enter No. of Fields</span>
                                </div>
                                <input type="number" class="form-control" aria-label="" id="row-count" min="0" max="5">
                                <div class="input-group-append">
                                    <button id="addRowTag" type="button" class="btn btn-theme-success"><i
                                            class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <span class="text-danger error_text p-2"></span>
                        </div>
                        
                        <form action="{{ route('tag.store') }}" method="post" id="form-create-tag"
                            class="d-none pt-3 px-3">
                            @csrf
                            <div id="newRow" class="">

                            </div>
                            <div class="float-right pt-3">
                                <button type="reset" class="btn btn-theme-danger ">Cancle</button>
                                <button type="submit" class="btn btn-theme-info ">Save</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- Update Modal --}}
        <div class="modal fade" id="modal-update-tag" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title m-0 font-weight-bold text-gray-800" id="staticBackdropLabel">Update Tag</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tag.update', '') }}" method="post" id="form-update-tag"
                            class="pt-3 px-3">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="mb-5">
                                <label for="tag_title" class="form-label">Tag Title</label>
                                <input type="text" class="form-control" id="update-tag-title" aria-describedby=""
                                    name="title">
                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                <span class="text-danger error-text title_error"></span>
                            </div>

                            <button type="submit" class="btn btn-theme-1-pri float-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Delete Modal --}}
        <div class="modal fade" id="modal-delete-tag" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="card border-0">
                        <div class="card-body">
                            <form action="{{ route('tag.destroy', '') }}" method="post" id="form-delete-tag">
                                @csrf
                                <div class="mb-3 p-3 text-center">
                                    <h1 class="mb-3">
                                        <i class="far fa-trash-alt text-danger "></i>
                                    </h1>
                                    <h5>
                                        Are you really want to delete ?
                                    </h5>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-theme-dark px-3 mx-1 p-2"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-theme-danger px-3 mx-1 p-2">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Delete All Modal --}}
        <div class="modal fade" id="modal-deleteAll-tag" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="card border-0">
                        <div class="card-body">
                            <form action="{{ route('tag.deleteAll') }}" method="post" id="form-deleteAll-tag">
                                @csrf
                                <div class="mb-3 p-3 text-center">
                                    <h1 class="mb-3">
                                        <i class="far fa-trash-alt text-danger "></i>
                                    </h1>
                                    <h5>
                                        You are about to Delete <span id="showDelId" class="text-danger"> </span> items.
                                    </h5>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-theme-dark px-3 mx-1 p-2"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-theme-danger px-3 mx-1 p-2">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
