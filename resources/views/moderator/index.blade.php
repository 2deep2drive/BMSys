@extends('layouts.dashboard')

@section('content')
    <div class="row p-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="card-title mb-3">
                                <h5 class="text-gray-700">
                                    Moderator
                                </h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered  " id="table-mod">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Created_at</th>
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
                <div class="col-lg-4 mb-4">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="card-title mb-3">
                                <h5 class="text-gray-700">
                                    Create Moderator
                                </h5>
                            </div>
                            <form method="POST" action="{{ route('mod.store') }}" id="form-create-mod">
                                @csrf
                                <div class="form-group">
                                    <label for="username">
                                        <strong class="text-gray-800">
                                            Username
                                        </strong>
                                    </label>
                                    <input id="uname" type="text" class="form-control @error('uname') is-invalid @enderror"
                                        name="uname" value="{{ old('uname') }}" required autocomplete="uname" autofocus>
                                    <span class="text-danger error-text uname_error px-1"></span>
                                </div>
                                <div class="form-group">
                                    <label for="Email">
                                        <strong class="text-gray-800">
                                           Email
                                        </strong>
                                    </label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <span class="text-danger error-text email_error px-1"></span>
                                </div>
                                <button type="submit" class="btn btn-theme-1-pri float-right mt-3 p-2 px-3">Create</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        {{-- Delete Modal --}}
        <div class="modal fade" id="modal-delete-mod" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog " style="width:24rem;">
                <div class="modal-content">
                    <div class="card border-0">
                        <div class="card-body">
                            <form action="{{ route('mod.destroy', '') }}" method="post" id="form-delete-mod">
                                @csrf
                            <div class="mb-3 p-3 text-center">
                                <h1 class="mb-3">
                                    <i class="far fa-trash-alt text-danger "></i>
                                </h1>
                                <h5>
                                    Are you want to delete ?
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