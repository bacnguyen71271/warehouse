{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



@extends('layouts/fullLayoutMaster')

@section('title', 'Lấy lại mật khẩu')

@section('page-style')
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}">
@endsection
@section('content')
<section class="row flexbox-container">
  <div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
      <div class="card bg-authentication rounded-0 mb-0">
          <div class="row m-0">
              <div class="col-lg-6 d-lg-block d-none text-center align-self-center">
                  <img src="{{ asset('images/pages/forgot-password.png') }}" alt="branding logo">
              </div>
              <div class="col-lg-6 col-12 p-0">
                  <div class="card rounded-0 mb-0 px-2 py-1">
                      <div class="card-header pb-1">
                          <div class="card-title">
                              <h4 class="mb-0">Lấy lại mật khẩu của bạn</h4>
                          </div>
                      </div>
                      <p class="px-2 mb-0">Vui lòng nhập địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn hướng dẫn về cách đặt lại mật khẩu của bạn.</p>
                      <div class="card-content">
                            <div class="card-body">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                    <div class="form-label-group">
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Email của bạn">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      <label for="email">Email của bạn</label>
                                  </div>
                                  <div class="float-md-left d-block mb-1">
                                    <a href="login" class="btn btn-outline-primary btn-block px-75">quay lại Đăng nhập</a>
                                </div>
                                <div class="float-md-right d-block mb-1">
                                    <button type="submit" class="btn btn-primary btn-block px-75">Lấy lại mật khẩu</button>
                                </div>
                              </form>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
