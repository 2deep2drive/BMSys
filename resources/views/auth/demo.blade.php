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
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="card-header  text-center border-0 ">
                                    {{-- <h2 style="font-weight: 700;"> --}}
                                        {{-- {{ __('Register Yourself') }} --}}
                                        {{ __('Create Account') }}
                                    {{-- </h2> --}}
                                </div>
                                <div class="card-body">



                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="fname">@</span>
                                        </div>
                                       {{-- <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> --}}
                                       <input id="fname" type="text"
                                            class="form-control @error('fname') is-invalid @enderror" name="fname"
                                            value="{{ old('fname') }}" required autocomplete="fname" aria-label="fname" aria-describedby="fname"
                                            placeholder="First Name" title="Enter Your First Name" autofocus>
                                        @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="mb-3">
                                        <label for="fname" class="col-md-6 col-form-label text-md-right">
                                            <strong>
                                                {{ __('First Name') }}
                                            </strong>

                                        </label>
                                        <input id="fname" type="text"
                                            class="form-control @error('fname') is-invalid @enderror" name="fname"
                                            value="{{ old('fname') }}" required autocomplete="fname"
                                            placeholder="Enter Your First Name" title="Enter Your First Name" autofocus>

                                        @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="lname"
                                            class="col-md-6 col-form-label text-md-right">{{ __('Last Name') }}</label>
                                        <input id="lname" type="text"
                                            class="form-control @error('lname') is-invalid @enderror" name="lname"
                                            value="{{ old('lname') }}" required autocomplete="lname"
                                            placeholder="Enter Your Last Name" title="Enter Your Last Name" autofocus>

                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="uname"
                                            class="col-md-6 col-form-label text-md-right">{{ __('User Name') }}</label>
                                        <input id="uname" type="text"
                                            class="form-control @error('uname') is-invalid @enderror" name="uname"
                                            value="{{ old('uname') }}" required autocomplete="uname"
                                            placeholder="Enter Your User Name" title="Enter Your User Name" autofocus>

                                        @error('uname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email"
                                            class="col-md-6 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Enter Your Email" title="Enter Your Email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>





                                    <div class="mb-3 form-group">
                                        <label for="password"
                                            class="col-md-6 col-form-label text-md-right">{{ __('Password') }}</label>


                                        <div class="input-group mb-3">
                                            <input id="password" type="password"
                                                class="form-control rounded-start @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top"
                                                placeholder="Enter Your Password">
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

                                        {{-- <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Tooltip on top">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
                                    <div class="mb-3">
                                        <label for="password-confirm"
                                            class="col-md-6 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Confirm Your Password">


                                    </div>
                                </div>
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
