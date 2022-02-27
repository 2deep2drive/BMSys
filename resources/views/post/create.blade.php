@extends('layouts.dashboard')

@section('content')

    <div class="row p-5">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Create Post</h1>

            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <form action="{{ route('post.store') }}" id="form-create-post" method="post">
                            <div class="card-body pt-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">
                                            <strong class="text-gray-800">
                                                 Select Catagories
                                            </strong>
                                            </label>

                                            <select class="form-control required" id="selectCat" name="selectCat">
                                                <option class="py-3" disabled selected >Select a catagory</option>
                                                @if (count($showCats) > 0)
                                                    @foreach ($showCats as $showCat)
                                                        <option data-id="{{ $showCat->id }}" style="padding-top:3px !important;padding-bottom:3px !important " >
                                                            {{ $showCat->title }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            <span class="text-danger error-text " id="catagoryError"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 ">
                                        <div class="form-group">
                                            <label>
                                                <strong class="text-gray-800">
                                                   Select Tags
                                                </strong>
                                               </label>
                                            <select class="select2 select2-hidden-accessible" multiple="multiple"
                                                data-placeholder="Select a State" style="width: 100%;" tabindex="-1"
                                                id="selectTag" name="selectTag">
                                                @foreach ($showTags as $showTag)
                                                    <option data-tagno="{{ $showTag->id }} "> {{ $showTag->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger error-text " id="tagError"></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class=" col-md-12">

                                        <div class="form-group">
                                            <label>
                                                <strong class="text-gray-800">
                                                    Post Title
                                                 </strong>
                                               
                                            </label>
                                            <input type="text" class="form-control" placeholder="Enter ..." id="pTitle"
                                                name="title">
                                            <span class="text-danger error-text title_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" col-md-12">

                                        <div class="form-group summernote">
                                            <label>
                                                <strong class="text-gray-800">
                                                    Post Description
                                                 </strong>
                                               </label>
                                            <textarea class="form-control shadow-0" id="summernote" rows="10"
                                                placeholder="Enter ..." style="display: none;" name="desc"> </textarea>
                                            <span class="text-danger error-text desc_error"></span>

                                        </div>
                                    </div>
                                </div>

                                <div class="float-right py-3 ">
                                    <button type="reset" class="btn btn-theme-danger px-3">Cancle</button>
                                    <button type="submit" class="btn btn-theme-info px-3">Save</button>
                                </div>
                            </div>

                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
