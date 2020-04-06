@extends('layouts/contentLayoutMaster')

@section('title', 'Thông tin người dùng')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/pages/app-user.css')) }}">
@endsection

@section('content')
<!-- page users view start -->
<section class="page-users-view">
    <div class="row">
        <!-- account start -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Tài khoản</div>
                    <div class="row">
                        <div class="col-2 users-view-image">
                            <img src="{{ asset('images/portrait/small/avatar-default.png') }}"
                                class="w-100 rounded mb-2" alt="avatar">
                            <!-- height="150" width="150" -->
                        </div>
                        <div class="col-sm-4 col-12">
                            <table>
                                <tr>
                                    <td class="font-weight-bold">Tên</td>
                                    <td>{{ $user['name']}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Email</td>
                                    <td>{{ $user['email']}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Phone</td>
                                    <td>Chưa khai báo</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6 col-12 ">
                            <table class="ml-0 ml-sm-0 ml-lg-0">
                                <tr>
                                    <td class="font-weight-bold">Xác thực</td>
                                    <td>
                                        @if ($user['active'] == 0)
                                        <div class="chip chip-danger">
                                            <div class="chip-body">
                                                <div class="chip-text">Unconfimred</div>
                                            </div>
                                        </div>
                                        <button type="button"
                                            class="btn btn-flat-primary mr-1 mb-1 waves-effect waves-light">Gửi lại
                                            email</button>
                                        @else
                                        <div class="chip chip-success">
                                            <div class="chip-body">
                                                <div class="chip-text">Actived</div>
                                            </div>
                                        </div>
                                        @endif

                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12">
                            <a href="" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i>
                                Lưu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- social links end -->
        <!-- permissions start -->
{{--        <div class="col-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i--}}
{{--                                class="feather icon-lock mr-50 "></i>Phân quyền--}}
{{--                        </h6>--}}
{{--                        <table class="table table-borderless">--}}
{{--                            <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>Kho</th>--}}
{{--                                    <th>Quyền truy cập</th>--}}
{{--                                </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                                @foreach ($permissions as $permission)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $permission['tenkho'] }}</td>--}}
{{--                                        <td>--}}
{{--                                            {{ $permission['permission'] }}--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}

{{--                                @if (count($permissions) <= 0)--}}
{{--                                <tr>--}}
{{--                                    <td></td>--}}
{{--                                    <td>--}}
{{--                                        Chưa được phân quyền--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                @endif--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- permissions end -->
    </div>
</section>
<!-- page users view end -->
@endsection

@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/pages/app-user.js')) }}"></script>
@endsection
