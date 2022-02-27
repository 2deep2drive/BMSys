@extends('layouts.dashboard')

@section('content')
    {{-- <div class="row p-5 ">
  
        <div class="col-lg-6 mb-4">
           
            <div class="card shadow mb-4  rounded-left ">
                <div class="card-headng  rounded-left rounded-right  heading pt-5">
                    <h2 class="text-light text-center" style="font-weight: 600">
                        {{ $profile->fname }}
                        {{ $profile->lname }}
                    </h2>
                    <div class="card-title text-center ">
                        @if (Auth::user()->hasRole('admin'))
                            <h5 class="text-danger " style="font-weight: 600">Admin</h5>
                        @elseif (Auth::user()->hasRole('mod'))
                            <h5 class="text-warning  pl-3 py-1" style="font-weight: 600">Moderator</h5>
                        @elseif (Auth::user()->hasRole('user'))
                            <h5 class="text-primary  pl-3 py-1" style="font-weight: 600">Author</h5>
                        @endif
                    </div>

                </div>
                <div class="text-center imgDiv ">
                    @if ($profile->isVerified == 1)
                        <img src="{{ asset($profile->img_path) }}" class="user_profile" alt="" id="user_profile">
                    @elseif($profile->isVerified == 2)
                        <img src="{{ $profile->avatar }}" class="user_profile" alt="" id="user_profile">
                    @elseif($profile->isVerified == 3)
                        <img src="{{ $profile->avatar }}" class="user_profile" alt="" id="user_profile">
                    @endif
                </div>
                <div class="card-body py-5 mt-5">
                    <div class="pt-5 pb-1">
                        <div class="pt-3">
                            <div class="d-flex justify-content-between bg-gray-100 rounded">
                                <div class="p-2 pl-3 " style="font-weight:600"><label for="">First Name</label>
                                </div>
                                <div class="p-2 pr-3 text-primary" style="font-weight: 700">
                                    {{ $profile->fname }} </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class="d-flex justify-content-between bg-gray-100 rounded">
                                <div class="p-2 pl-3 " style="font-weight:600"><label for="">Last Name</label>
                                </div>
                                <div class="p-2 pr-3 text-primary" style="font-weight: 700">
                                    {{ $profile->lname }} </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class="d-flex justify-content-between bg-gray-100 rounded">
                                <div class="p-2 pl-3 " style="font-weight:600"><label for="">Username</label>
                                </div>
                                <div class="p-2 pr-3 text-primary" style="font-weight: 700">
                                    {{ $profile->uname }} </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class="d-flex justify-content-between bg-gray-100 rounded">
                                <div class="p-2 pl-3" style="font-weight:600"><label for="">Email</label>
                                </div>
                                <div class="p-2 pr-3 text-primary" style="font-weight: 700">
                                    {{ $profile->email }} </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class="d-flex justify-content-between bg-gray-100 rounded">
                                <div class="p-2 pl-3" style="font-weight:600"><label for="">Mobile No</label>
                                </div>
                                <div class="p-2 pr-3 text-primary" style="font-weight: 700">
                                    {{ $profile->user_name }} </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">

            <div class="card shadow mb-4">
                <div class="card-body border-left-primary rounded-left ">
                    <div class="d-flex justify-content-between">
                        <div class=" p-2">
                            @if ($profile->isVerified == 1)
                                <span class="text-primary custom-font-weight-600">Signed up with <span
                                        style="font-weight: 700">Bmsys</span></span>
                            @elseif($profile->isVerified == 2)
                                <span class="text-primary custom-font-weight-600">Signed up with <span
                                        class="text-danger" style="font-weight: 700">Google</span></span>
                            @elseif($profile->isVerified == 3)
                                <span class="text-primary custom-font-weight-600">Signed up with <span
                                        class="text-dark" style="font-weight: 700">Github</span></span>
                            @endif

                        </div>
                        <div class=" p-2">

                            @if ($profile->isVerified == 1)
                                <span class=" text-success p-2">
                                    <i class="far fa-smile-wink "></i>
                                </span>
                            @elseif($profile->isVerified == 2)
                                <span class=" text-danger p-2">
                                    <i class="fab fa-google "></i>
                                </span>
                            @elseif($profile->isVerified == 3)
                                <span class=" text-dark p-2">
                                    <i class="fab fa-github "></i>
                                </span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            @if ($profile->isVerified == 1)
               
                <div class="card shadow mb-4">

                    <div class="card-body border-left-primary rounded-left ">
                        <form action="{{ route('profile.profileImageUpload', Auth::user()->id) }}" method="post"
                            id="form-imageUpload" enctype="multipart/form-data">
                            <div class="input-group ">
                                <div class="custom-file ">
                                    <input type="file" class="custom-file-input" id="inputGroupFile02" name="profile_image">
                                    <label class="custom-file-label rounded-left" for="inputGroupFile02"
                                        aria-describedby="inputGroupFileAddon02">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-success rounded-right" type="submit">Upload</button>
                                </div>
                            </div>
                            <span class="text-danger error-text errorr profile_image_error"></span>
                        </form>
                    </div>
                </div>
           
                <div class="card shadow mb-4">
                    <div class="card-body border-left-primary rounded-left ">
                        <div class="d-flex justify-content-between">
                            <div class="pt-2">
                                <h6 class="m-0 font-weight-600 text-primary">Remove Profile Picture</h6>
                            </div>
                            <div class="border">
                                <form action="{{ route('profile.profieImageRemove', Auth::user()->id) }}" method="post"
                                    id="form-imageRemove" enctype="multipart/form-data">
                                    <button class="btn btn-danger" type="submit">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
       
                <div class="card shadow mb-4 ">
                    <div class="card-body border-left-primary rounded-left ">
                        <div class="card-title pt-2 pb-3">
                            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                        </div>
                        <form action="{{ route('profile.updatePassword', Auth::user()->id) }}" method="post"
                            id="form-passwordUpdate">
                            <div class="form-group">
                                <label for="oldPassword">Old Password</label>
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                                    aria-describedby="emailHelp">
                                <span class="text-danger error-text currentPassword_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword">
                                <span class="text-danger error-text newPassword_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                            </div>

                            <div class="pt-5 float-right">
                                <button type="reset" class="btn btn-danger">Cancel</button>
                                <button type="submit" class="btn btn-primary">Apply Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div> --}}
    {{--  --}}
    <div class="row px-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 py-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-10 card mb-5  shadow border-0 pic_div" style="min-height: 160px">
                            <div class="card-body ">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-4 ">
                                        {{-- <img src="https://i.pravatar.cc/120" alt="" srcset="" class="shadow-3 rounded"> --}}
                                        @if ($profile->isVerified == 0)
                                            <img src="{{ asset($profile->img_path) }}"
                                                class="user_profile shadow-3 rounded " alt="" id="user_profile">
                                        @elseif($profile->isVerified == 1)
                                            <img src="{{ $profile->avatar }}" class="user_profile shadow-3 rounded" alt=""
                                                id="user_profile">
                                        @elseif($profile->isVerified == 2)
                                            <img src="{{ $profile->avatar }}" class="user_profile shadow-3 rounded" alt=""
                                                id="user_profile">
                                        @endif
                                    </div>
                                    <div class="col-6 ">
                                        <div class=" card border-0  pt-3" style="background-color: transparent; !important">
                                            <h2 class="text-white">
                                                {{ $profile->fname }}
                                                {{ $profile->lname }}
                                            </h2>
                                            <span>
                                                @if (Auth::user()->hasRole('admin'))
                                                    <h5 class="text-warning pl-3 " style="font-weight: 700">Admin</h5>
                                                @elseif (Auth::user()->hasRole('mod'))
                                                    <h5 class="text-warning  pl-3" style="font-weight: 700">Moderator</h5>
                                                @elseif (Auth::user()->hasRole('user'))
                                                    <h5 class="text-primary  pl-3" style="font-weight: 700">Author</h5>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-10 card  mt-3 pr-3 shadow border-0 " style="min-height: 440px">

                            <div class="card-body ">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-gray-700">Profile</h6>
                                    @if ($profile->isVerified == 0)
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa-solid fa-chevron-down text-gray-600"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in  p-0"
                                                aria-labelledby="dropdownMenuLink">
                                                <form action="{{ route('profile.profieImageRemove', Auth::user()->id) }}"
                                                    method="post" id="form-imageRemove" enctype="multipart/form-data">
                                                    <button class="dropdown-item py-2" type="submit">Remove Profile
                                                        Picture</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="row d-flex flex-column  h-100 mx-3 mt-3">
                                    <div class="form-group mb-3">
                                        <span class="form-control"
                                            id="exampleFormControlInput1">{{ $profile->fname }}</span>
                                    </div>
                                    <div class="form-group">
                                        <span class="form-control"
                                            id="exampleFormControlInput1">{{ $profile->lname }}</span>
                                    </div>
                                    <div class="form-group">
                                        <span class="form-control"
                                            id="exampleFormControlInput1">{{ $profile->uname }}</span>
                                    </div>
                                    <div class="form-group">
                                        <span class="form-control"
                                            id="exampleFormControlInput1">{{ $profile->email }}</span>
                                    </div>

                                    @if ($profile->isVerified == 0)
                                        <div class="card  border-0">
                                            <div class="card-body p-0 ">
                                                <form
                                                    action="{{ route('profile.profileImageUpload', Auth::user()->id) }}"
                                                    method="post" id="form-imageUpload" enctype="multipart/form-data">
                                                    <div class="input-group ">
                                                        <div class="custom-file ">
                                                            <input type="file" class="custom-file-input"
                                                                id="inputGroupFile02" name="profile_image">
                                                            <label class="custom-file-label rounded-left"
                                                                for="inputGroupFile02"
                                                                aria-describedby="inputGroupFileAddon02">Choose file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-theme-1-pri rounded-right"
                                                                type="submit">Upload</button>
                                                        </div>
                                                    </div>
                                                    <span
                                                        class="text-danger error-text errorr profile_image_error border-0"></span>
                                                </form>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12  py-5">

                    <div class="row d-flex  profile_sidebar">
                        <div class="col-10 card shadow  " style="height: 694px">

                            <div class="card-body">
                                <div class="row d-flex flex-column justify-content-around h-100">
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            @if ($profile->isVerified == 0)
                                                <span class="text-gray-900 custom-font-weight-600">Signed up with <span
                                                        style="font-weight: 700">Bmsys</span></span>
                                            @elseif($profile->isVerified == 1)
                                                <span class="text-primary custom-font-weight-600">Signed up with <span
                                                        class="text-danger" style="font-weight: 700">Google</span></span>
                                            @elseif($profile->isVerified == 2)
                                                <span class="text-primary custom-font-weight-600">Signed up with <span
                                                        class="text-dark" style="font-weight: 700">Github</span></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            <h1><i class="fa-solid fa-eye text-bgc"></i></h1>
                                            <h5>69 Views</h5>
                                        </div>
                                    </div>
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            <h1><i class="fa-solid fa-star  text-bgc"></i></h1>
                                            <h5>69 Views</h5>
                                        </div>
                                    </div>
                                    <div class="card border-0">
                                        {{-- <span class="text-center text-sm">Connect With</span> --}}
                                        <div class="card-body d-flex justify-content-around">
                                            <a>
                                                <i class="fa-brands fa-facebook fa-1-5x "></i>
                                            </a>
                                            <a>
                                                <i class="fa-brands fa-instagram-square fa-1-5x "></i>
                                            </a>
                                            <a>
                                                <i class="fa-brands fa-github fa-1-5x "></i>
                                            </a>
                                            <a>
                                                <i class="fa-brands fa-twitter fa-1-5x "></i>
                                            </a>
                                            <a>
                                                <i class="fa-brands fa-blogger fa-1-5x "></i>
                                            </a>

                                        </div>
                                        <div class="card-footer text-center border-0">
                                            <a class="text-gray-800 fw5" href="{{ route('logout') }} border-0"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
