<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link href="{{ asset('css/bmsys.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">

    <style>
        .navbar {
            background-color: #fff !important;
        }

        .note-resizebar {
            display: none;

        }

        .note-editable {
            background-color: #fff !important;
        }

        .note-editor.note-frame .note-editing-area .note-editable {
            overflow: hidden;
        }

        .note-editor {
            border: none !important;
        }

        .note-editor.note-frame .note-statusbar {
            border: none;
        }

        .like_gup {
            border-top-left-radius: 50rem !important;
            border-bottom-left-radius: 50rem !important;
        }

        .dislike_gup {
            border-top-right-radius: 50rem !important;
            border-bottom-right-radius: 50rem !important;
        }


    </style>

</head>

<body class="d-flex flex-column h-100">

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-light navBGC p-3 shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand text-gray-900" href="{{route('home')}}"><strong>BMSys</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class=" navbar-nav navbar-no-expand ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            @guest
                                @if (Route::has('login'))
                                    <a class="nav-link " href="{{ route('login') }}" aria-expanded="false">
                                        {{ __('Sign In') }}
                                    </a>
                                @endif
                            @else
                                <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->uname }}
                                </a>
                            @endguest

                            <div class="dropdown-menu dropdown-menu-left " aria-labelledby="userDropdown">
                                @guest
                                    @if (Route::has('login'))
                                        <a class="dropdown-item" href="{{ route('login') }}">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-600"></i>
                                            {{ __('Login') }}
                                        </a>
                                    @endif

                                    @if (Route::has('register'))
                                        <a class="dropdown-item" href="{{ route('register') }}">
                                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-600"></i>
                                            {{ __('Register') }}
                                        </a>
                                    @endif
                                @else
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-600"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-600"></i>
                                        Settings
                                    </a>

                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-600"></i>
                                        {{ __('Dashboard') }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                </div>

            </div>
        </nav>
    </header>

    <!-- Begin page content -->

    <main role="main" class="flex-shrink-0 bg-home">
        <div class="content-wrapper pt-3 pb-5">
            <!-- Main content -->
            <div class="container pt-5 mt-5">
                <!-- Page Heading/Breadcrumbs -->
                <div class="row pt-3 ">
                    @yield('content')
                </div>
            </div>
            <!-- /.row -->
        </div>
    </main>
    {{-- /main --}}
  
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

    <script src="{{ asset('vendor/summernote/summernote-bs4.js') }}"></script>
    {{-- // script for this application ( bmsys ) --}}
    <script src="{{ asset('js/bmsys.min.js') }}"></script>
    <script src="{{ asset('js/home.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $(window).bind("pageshow", function(event) {
                if (event.originalEvent.persisted) {
                    window.location.reload();
                }
            });
          
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr(
                        'content')
                }
            });

            $('.postDesc').summernote({
                toolbar: false,
                spellCheck: false
            });

            $('.postDesc').next().find(".note-editable").attr("contenteditable", false);
        });
    </script>

</body>

</html>
