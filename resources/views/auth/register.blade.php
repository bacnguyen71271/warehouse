@extends('layouts/fullLayoutMaster')

@section('title', 'Đăng ký')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}">
@endsection

@section('content')
<section class="row flexbox-container">
    <div class="col-xl-8 col-10 d-flex justify-content-center">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                    <img src="{{ asset('images/pages/register.jpg') }}" alt="branding logo">
                </div>
                <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 p-2">
                        <div class="card-header pt-50 pb-1">
                            <div class="card-title">
                                <h4 class="mb-0">Tạo tài khoản</h4>
                            </div>
                        </div>
                        <p class="px-2">Điền vào mẫu dưới đây để tạo một tài khoản mới.</p>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    @if (session('warning'))
                                        <div class="alert alert-danger mb-3" role="alert">
                                            <p class="mb-0">{{ session('warning') }}</p>
                                        </div>
                                    @endif 
                                    <div class="form-label-group">
                                        <input type="text" id="inputName"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Tên của bạn" name="name" value="{{ old('name') }}" required
                                            autocomplete="name" autofocus>
                                        <label for="inputName">Tên của bạn</label>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Email của bạn">
                                        <label for="inputEmail">Email</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Mật khẩu">
                                        <label for="inputPassword">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" id="inputConfPassword" class="form-control"
                                            placeholder="Nhập lại mật khẩu" name="password_confirmation" required
                                            autocomplete="new-password">
                                        <label for="inputConfPassword">Nhập lại mật khẩu</label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <fieldset class="checkbox">
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" checked>
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class=""> Tôi đồng ý với chính sách và điểu khoản</span>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <a href="login" class="btn btn-outline-primary float-left btn-inline mb-50">Đăng
                                        nhập</a>
                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Đăng
                                        ký</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
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