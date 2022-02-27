@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            {{-- <div class="col-md-6"> --}}
            <div class="col-lg-6 col-md-10">
                {{-- <div class="row"> --}}
                <div class="card pt-5 px-5 shadow p-3 mb-5 bg-white rounded">
                    <div class="row">
                        {{-- <div class="col-6"> --}}
                        <div class="card  border-0 ">
                            <form method="POST" action="{{ route('register') }}" class="mb-3">
                                @csrf
                                <div class="card-header  text-center border-0 ">
                                    {{-- <h2 style="font-weight: 700;"> --}}
                                    {{-- {{ __('Register Yourself') }} --}}
                                    {{ __('Create Account') }}
                                    {{-- </h2> --}}
                                </div>
                                <div class="card-body">
                                    {{-- First Name --}}
                                    <div class="input-group my-3 ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="fname">
                                                <i class="fas fa-user-tie py-1"></i>
                                            </span>
                                        </div>

                                        <input id="fname" type="text"
                                            class="form-control @error('fname') is-invalid @enderror" name="fname"
                                            value="{{ old('fname') }}" required autocomplete="fname" aria-label="fname"
                                            aria-describedby="fname" placeholder="First Name" title="Enter Your First Name"
                                            autofocus>
                                        @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Last Name --}}
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="lname">
                                                <i class="fas fa-user-tie py-1"></i>
                                            </span>
                                        </div>
                                        <input id="lname" type="text"
                                            class="form-control @error('lname') is-invalid @enderror" name="lname"
                                            value="{{ old('lname') }}" required autocomplete="lname" aria-label="lname"
                                            aria-describedby="lname" placeholder="Last Name" title="Enter Your Last Name"
                                            autofocus>
                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Email --}}
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="email">
                                                <i class="fas fa-envelope py-1"></i>
                                            </span>
                                        </div>
                                        <input id="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" aria-label="email"
                                            aria-describedby="email" placeholder="Email" title="Enter Your Email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- User name --}}
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="uname">
                                                <i class="fas fa-user py-1"></i>
                                            </span>
                                        </div>
                                        <input id="uname" type="text"
                                            class="form-control @error('uname') is-invalid @enderror" name="uname"
                                            value="{{ old('uname') }}" required autocomplete="uname" aria-label="uname"
                                            aria-describedby="uname" placeholder="User Name" title="Enter Your User Name"
                                            min="8" max="13" autofocus>
                                        @error('uname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Password --}}
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-key py-1"></i>
                                            </span>
                                        </div>
                                        <input id="password" type="password"
                                            class="form-control password @error('password') is-invalid @enderror"
                                            name="password" value="{{ old('password') }}" required
                                            autocomplete="password" aria-label="password" aria-describedby="password"
                                            placeholder="Password" title="Enter Your Password" autofocus>

                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="pass-show"
                                                style="border-top-left-radius:0 !important;border-bottom-left-radius:0 !important"><i
                                                    class="far fa-eye"></i></button>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Confirm Password --}}
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-key py-1"></i>
                                            </span>
                                        </div>
                                        <input id="password-confirm" type="password" class="form-control password"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Confirm Your Password">
                                    </div>
                                </div>
                                {{-- Register Button --}}
                                <div class="card-footer custom_card-footer  border-0 ">
                                    <button type="submit" class="btn btn-primary w-100 float-end register py-2"
                                        style="font-size:1.1rem;letter-spacing: .6px;">
                                        {{ __('Register') }}
                                    </button>

                                </div>
                            </form>

                            <div class="text-center py-2">
                                <span>Already a member? <a class="" href="{{ route('login') }}">
                                        {{ __('Sign In') }}</span>
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>

                {{-- </div> --}}

            </div>

        </div>
    </div>
@endsection
