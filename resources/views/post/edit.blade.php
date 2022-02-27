@extends('layouts.dashboard')

@section('content')
    <div class="row p-5">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Post</h1>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <form action="{{ route('post.update', $SelectedDetails->id) }}" method="post"
                            id="form-update-post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">
                                                <strong class="text-gray-800">
                                                    Select Catagories
                                                </strong>
                                            </label>

                                            <select class="form-control" id="selectCat" name="selectCat">
                                                @if (count($showCats) > 0)
                                                    @foreach ($showCats as $showCat)
                                                        <option data-id="{{ $showCat->id }}"
                                                            {{ $showCat->id == $SelectedDetails->catagory->id ? 'selected' : '' }}>
                                                            {{ $showCat->title }} </option>
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
                                                id="selectTag" name="selectTag[]">
                                                @foreach ($showTags as $showTag)
                                                    <option data-tagno="{{ $showTag->id }}"
                                                        @foreach ($SelectedDetails->tags as $tags) {{ $tags->id == $showTag->id ? 'selected' : '' }} @endforeach>
                                                        {{ $showTag->title }}</option>
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
                                            <input type="text" class="form-control" id="pTitle" name="title"
                                                value="{{ $SelectedDetails->title }}">
                                            <span class="text-danger error-text title_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-12">

                                        <div class="form-group ">
                                            <label>
                                                <strong class="text-gray-800">
                                                    Post Description
                                                </strong>
                                            </label>
                                            <textarea class="form-control shadow-0" id="summernote" rows="10"
                                                style="display: none;" name="desc">{{ $SelectedDetails->desc }}</textarea>
                                            <span class="text-danger error-text desc_error errorr"></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="float-right py-3 ">
                                    <button type="reset" class="btn btn-theme-danger px-3">Cancle</button>
                                    <button type="submit" class="btn btn-theme-info px-3">Save</button>
                                </div>
                            </div>
                            {{-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="createPost">Update Post</button>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
