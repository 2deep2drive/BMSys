<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Dashboard</title>

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}


    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-6/css/all.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bmsys.min.css') }}" rel="stylesheet">
    {{--  --}}
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}">
    {{--  --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    {{--  --}}
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    {{--  --}}
    <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">
    {{--  --}}
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">

</head>
<style>
    .active {
        color: #fff !important;
        background-color: rgba(255, 255, 255, 0.152);
    } 

     .active>i {
        color: #fff !important;
      
    }

    /* ------------------------- */

    .navbar {
        background-color: #fff !important;
    }

    .postEditor * .note-resizebar {
        display: none;

    }

    .postEditor>.note-editable {
        background-color: #fff !important;
    }

    .postEditor>.note-editor.note-frame .note-editing-area .note-editable {
        overflow: hidden;
    }

    .postEditor>.note-editor {
        border: none !important;
    }

    .postEditor>.note-editor.note-frame .note-statusbar {
        border: none;
    }

    .summernote  .note-toolbar {
      border-bottom:1px solid rgba(0, 0, 0, 0.1) !important;
      /* border-radius: 0 !important; */
    }

</style>

<body id="page-top">

    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-blue  sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-text mx-3">BMSys</div>
            </a>
            <hr class="sidebar-divider my-0 p-0 m-0">
            <li class="nav-item py-4 pb-5">
            </li>
            <hr class="sidebar-divider my-0 p-0 m-0">
            <!-- Heading -->
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link  {{ Route::currentRouteNamed('dashboard') ? 'active' : '' }}" id="">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="mx-2 fw7">Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0 p-0 m-0">
            @role(['admin', 'mod'])
                <li class="nav-item">
                    <a href="{{ route('tag.index') }}"
                        class="nav-link  {{ Route::currentRouteNamed('tag.index') ? 'active' : '' }}" id="">
                        <i class="fas fa-tags"></i>
                        <span class="mx-2 fw7">Tag</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('catagory.index') }}"
                        class="nav-link  {{ Route::currentRouteNamed('catagory.index') ? 'active' : '' }}" id="">
                        <i class="fas fa-file"></i>
                        <span class="mx-2 fw7">Catagory</span>
                    </a>
                </li>
            @endrole
            <li class="nav-item">
                <a href="{{ route('post.index') }}"
                    class="nav-link  {{ Route::currentRouteNamed('post.index') ? 'active' : '' }}" id="">
                    <i class="fas fa-file-alt"></i>
                    <span class="mx-3 fw7">Post</span>
                </a>
            </li>
            @role('admin')
                <li class="nav-item">
                    <a href="{{ route('mod.index') }}"
                        class="nav-link  {{ Route::currentRouteNamed('mod.index') ? 'active' : '' }}" id="">
                        <i class="fas fa-users"></i>
                        <span class="mx-2 fw7">Moderator</span>
                    </a>
                </li>
            @endrole
            <li class="nav-item">
                <a href="{{ route('profile.index') }}"
                    class="nav-link  {{ Route::currentRouteNamed('profile.index') ? 'active' : '' }}" id="">
                    <i class="fas fa-user"></i>
                    <span class="mx-3 fw7">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('setting.index') }}"
                    class="nav-link  {{ Route::currentRouteNamed('setting.index') ? 'active' : '' }}" id="">
                    <i class="fas fa-cogs"></i>
                    <span class="mx-2 fw7">Settings</span>
                </a>
            </li>
            <div class="text-center d-none d-md-inline mt-5">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-700 "><b>{{ Auth::user()->uname }}</b></span>
                                {{-- <img class="img-profile rounded-circle" src="{{ asset(Auth::user()->img_path) }}"> --}}
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-600"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-600"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-600"></i>
                                    Home
                                </a>
                                <div class="dropdown-divider"></div>
                                @guest
                                    @if (Route::has('login'))
                                        <a class="dropdown-item" href="{{ route('login') }}">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-600"></i>
                                            {{ __('Login') }}
                                        </a>
                                    @endif
                                @else
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{-- <i class="fas fa-sign-out-alt"></i> --}}
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-600"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                @endguest
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            {{-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer> --}}
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"
        integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- page scripts start from here --}}
    {{-- // u have to add jquery before bootstrap --}}
    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    {{-- // script for bootstrap --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    {{-- // script for datatables --}}
    <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    {{-- // script for Summernote --}}
    <script src="{{ asset('vendor/summernote/summernote-bs4.js') }}"></script>
    {{-- // --}}
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
    {{-- // script for select2 --}}
    <script src="{{ asset('vendor/select2/js/select2.js') }}"></script>
    {{-- // script for this application ( bmsys ) --}}
    <script src="{{ asset('js/bmsys.min.js') }}"></script>
    {{-- //custapp.js --}}
    <script src="{{ asset('js/custapp.min.js') }}"></script>
    {{-- //profile.js --}}
    <script src="{{ asset('js/profile.min.js') }}"></script>
    {{-- //moderator.js --}}
    <script src="{{ asset('js/moderator.min.js') }}"></script>
    {{-- //tag.js --}}
    <script src="{{ asset('js/tag.min.js') }}"></script>
    {{-- //catagory.js --}}
    <script src="{{ asset('js/catagory.min.js') }}"></script>
    {{--  --}}
    <script src="{{ asset('js/post.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr(
                        'content')
                }
            });

            $('#table-mod').DataTable();
            $('.select2').select2();
            $('#summernote').summernote({
                tabsize: 2,
                height: 600,

                toolbar: [
                    ['style', ['style']],
                    // ['format',['style.h1','style.h2','style.h3','style.h4','style.h5','style.h6',]],
                    ['fontsize', ['fontsize']],
                    ['font', ['bold', 'underline', 'clear', 'strikethrough', 'superscript',
                        'subscript'
                    ]],
                    // ['height', ['height']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph', 'height']],
                    ['table', ['table']],
                    ['insert', ['link', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'undo', 'redo']],
                    ['link', ['linkDialogShow', 'unlink']],
                ],

            });
            // 
            $('.postDesc').summernote({
                toolbar: false,
                spellCheck: false
            });

            imgeCheck();





        });
    </script>
</body>

</html>
