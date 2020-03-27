
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
        <!-- vendor css files -->
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/tether-theme-arrows.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/tether.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/shepherd-theme-default.css')) }}">
@endsection
@section('page-style')
        <!-- Page css files -->
        <link rel="stylesheet" href="{{ asset(mix('css/pages/dashboard-analytics.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/pages/card-analytics.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/tour/tour.css')) }}">
  @endsection

  @section('content')
    {{-- Dashboard Analytics Start --}}
    <section id="dashboard-analytics">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card bg-analytics text-white">
            <div class="card-content">
              <div class="card-body text-center">
                <img src="{{ asset('images/elements/decore-left.png') }}" class="img-left" alt="card-img-left">
                <img src="{{ asset('images/elements/decore-right.png')}}" class="img-right" alt="card-img-right">
                <div class="avatar avatar-xl bg-primary shadow mt-0">
                    <div class="avatar-content">
                        <i class="feather icon-award white font-large-1"></i>
                    </div>
                </div>
                <div class="text-center">
                  <h1 class="mb-2 text-white">Chào bạn !, {{ Auth::User()->name }}</h1>
                  <p class="m-auto w-75">Hãy cùng xem hôm nay ta có gì nhé !</p>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
            <a href="{{ url('/hangtrongkho') }}">
              <div class="card-header d-flex align-items-start pb-0">
                <div>
                  <h2 class="text-bold-700 mb-0">{{ $hangtrongkho }}</h2>
                    <p>Mặt hàng trong kho</p>
                </div>
                <div class="avatar bg-rgba-primary p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-package text-primary font-medium-5"></i>
                    </div>
                </div>
              </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
              <div class="card-header d-flex align-items-start pb-0">
                <div>
                  <h2 class="text-bold-700 mb-0">{{ $nguoidung }}</h2>
                    <p>Người dùng</p>
                </div>
                <div class="avatar bg-rgba-info p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-users text-info font-medium-5"></i>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
            <a href="{{ url('/delivery') }}">
              <div class="card-header d-flex align-items-start pb-0">
                <div>
                    <h2 class="text-bold-700 mb-0">{{ $deliveryed }}</h2>
                    <p>Đơn đã giao</p>
                </div>
                <div class="avatar bg-rgba-success p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-truck text-success font-medium-5"></i>
                    </div>
                </div>
              </div>
              </a>
            </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card">
              <a href="{{ url('/xuatkho') }}">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{ $order }}</h2>
                        <p>Đơn chờ xác nhận</p>
                    </div>
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-edit text-warning font-medium-5"></i>
                        </div>
                    </div>
                </div>
                 </a>
              </div>
              </div>
          </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="mb-0">Lịch sử hệ thống</h4> <a href="{{ url('/system-history') }}">Xem thêm</a>
            </div>
            <div class="card-content">
              <div class="table-responsive mt-1">
                <table class="table table-hover-animation mb-0">
                  <thead>
                    <tr>
                      <th>HÀNH ĐỘNG</th>
                      <th>TÁC NHÂN</th>
                      <th>THÔNG TIN THÊM</th>
                      <th>THỜI GIAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($historys as $history)
                    <tr>
                      <td>{{ $history['hanhdong'] }}</td>
                      <td>
                        <div data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom" data-original-title="{{ $history['email'] }}">
                          <div class="badge badge-pill badge-info">{{ $history['name'] }}</div>
                        </div>
                      </td>
                      <td>{{ $history['thongtin'] }}</td>
                      <td>{{ $history['created_at'] }}</td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- Dashboard Analytics end -->
  @endsection

@section('vendor-script')
        <!-- vendor files -->
        <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/tether.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/shepherd.min.js')) }}"></script>
@endsection
@section('page-script')
        <!-- Page js files -->
        <script src="{{ asset(mix('js/scripts/pages/dashboard-analytics.js')) }}"></script>
@endsection
