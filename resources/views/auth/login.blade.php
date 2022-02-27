@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center pt-5">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-lg-10 col-md-12  ">
                <div class="card  border p-5 shadow p-3 mb-5 bg-white rounded">
                    <div class="row py-3">
                        <div class="col-6 ">
                            <div class="card border-0">
                                <div class="card-body ">
                                    <ul class="list-group ">
                                        <li class="list-group-item border-0">
                                            <a href="{{ route('login.google') }}" class="btn btn-danger w-100  google ">
                                                <i class="fab fa-google mx-3"></i>Log in
                                                with Google </a>
                                            {{-- <a href="{{('login/auth/redirect')}}" class="btn btn-danger w-100">Log in with Google</a> --}}
                                        </li>

                                        <li class="list-group-item border-0 ">
                                            <a href="{{ route('login.github') }}" class="btn btn-dark w-100  github"><i
                                                    class="fab fa-github mx-3"></i>
                                                Log in with Github
                                            </a>
                                        </li>

                                        <li class="list-group-item border-0 mb-5">
                                            @guest
                                                @if (Route::has('register'))
                                                    {{-- <li class="list-group-item text-center"> --}}
                                                    <a class="btn text-primary py-2 mail custom_card-header w-100"
                                                        href="{{ route('register') }}">{{ __('Register with Email') }}</a>
                                                    {{-- </li> --}}
                                                @endif
                                            @endguest
                                        </li>
                                        <li class="list-group-item border-0 mb-5 text-center">
                                            <span class="pt-2" >
                                                By continuing you indicate that you agree to Our Terms of Service
                                                and <br>
                                                <a href="http://"> Privacy Policy.</a>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 border-start">
                            <div class="card custom_card border-0">
                                <form method="POST" action="{{ route('login') }} ">
                                    @csrf
                                    <div class="card-header border-0">
                                        <span>

                                            {{ __('Log in') }}
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label">
                                                <strong>
                                                    {{ __('E-Mail Address') }}
                                                </strong>
                                            </label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1"
                                                class="form-label">
                                                <strong>
                                                     {{ __('Password') }}
                                                </strong>
                                               
                                            </label>
                                            <div class="input-group mb-3">
                                                <input id="password" type="password"
                                                    class="form-control password rounded-start @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary " type="button" id="pass-show"
                                                        style="border-top-left-radius:0 !important;border-bottom-left-radius:0 !important"><i
                                                            class="far fa-eye"></i></button>
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            {{-- <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                autocomplete="current-password" required="required">


                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}
                                            {{-- oninvalid="this.setCustomValidity('Password must contain atleast 6 character,including UPPERCASE,LOWERCASE and NUMBER')"
                                                 onvalid="this.setCustomValidity('')" min="6" max="12"> --}}

                                        </div>
                                    </div>
                                    <div class="card-footer  py-3 border-0">
                                        @if (Route::has('password.request'))
                                            <a class="link-primary float-start" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password ?') }}
                                            </a>
                                        @endif
                                        <button type="submit" class="btn btn-primary float-end px-3">
                                            {{ __('Login') }}
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
