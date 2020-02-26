@extends('layouts/fullLayoutMaster')

@section('title', 'Đăng nhập')

@section('page-style')
        <link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}">
@endsection
@section('content')
<section class="row flexbox-container">
    <div class="col-xl-8 col-11 d-flex justify-content-center">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                    <img src="{{ asset('images/pages/login.png') }}" alt="branding logo">
                </div>
              <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 px-2 pb-3 pt-2">
                      <div class="card-header pb-1">
                          <div class="card-title">
                              <h4 class="mb-0">Đăng nhập</h4>
                          </div>
                      </div>
                      <p class="px-2">Chào mừng bạn, hãy đăng nhập bằng tài khoản của bạn để bắt đầu.</p>
                      <div class="card-content">
                          <div class="card-body pt-1">

                            @if (session('warning'))
                                <div class="alert alert-danger mb-3" role="alert">
                                    <p class="mb-0">{{ session('warning') }}</p>
                                </div>
                            @endif 
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                  <fieldset class="form-label-group form-group position-relative has-icon-left">
                                      <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                      <div class="form-control-position">
                                          <i class="feather icon-user"></i>
                                      </div>
                                      @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      <label for="email">Email của bạn</label>
                                  </fieldset>

                                  <fieldset class="form-label-group position-relative has-icon-left">
                                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                      <div class="form-control-position">
                                          <i class="feather icon-lock"></i>
                                      </div>
                                      @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      <label for="password">Mật khẩu</label>
                                  </fieldset>
                                  <div class="form-group d-flex justify-content-between align-items-center">
                                      <div class="text-left">
                                          <fieldset class="checkbox">
                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                              <input type="checkbox" name="remember">
                                              <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                  <i class="vs-icon feather icon-check"></i>
                                                </span>
                                              </span>
                                              <span class="">Nhớ đăng nhập</span>
                                            </div>
                                          </fieldset>
                                      </div>
                                      <div class="text-right"><a href="forgot-password" class="card-link">Quên mật khẩu?</a></div>
                                  </div>
                                  <a href="register" class="btn btn-outline-primary float-left btn-inline">Đăng ký</a>
                                  <button type="submit" class="btn btn-primary float-right btn-inline">Đăng nhập</button>
                              </form>
                          </div>
                      </div>
                      <div class="login-footer">

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
