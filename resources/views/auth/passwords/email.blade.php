@extends('layouts.app')

@section('content')
    <div class="container  pt-5">
        <div class="row justify-content-center pt-5">
            <div class="col-lg-6 col-md-10">
                <div class="card pt-5 px-5 shadow p-3 mb-5 bg-white rounded">
                    <div class="row">
                        <div class="card custom_card border-0 ">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="card-header custom_card-header text-center border-0 ">
                                    <h3 style="font-weight: 600;">
                                        {{ __('Reset Password') }}
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="email"
                                            class="col-md-6 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer custom_card-footer py-3 border-0 ">
                                    <button type="submit" class="btn btn-primary w-100 float-end register " style="padding: .8rem">
                                        {{ __('Send Password Reset Link') }}
                                    </button>

                                </div>
                            </form>
                            <div class="text-center py-2">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection
