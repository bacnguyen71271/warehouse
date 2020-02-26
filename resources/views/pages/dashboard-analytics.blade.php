
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
              <div class="card-header d-flex align-items-start pb-0">
                <div>
                    <h2 class="text-bold-700 mb-0">86</h2>
                    <p>Mặt hàng trong kho</p>
                </div>
                <div class="avatar bg-rgba-primary p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-package text-primary font-medium-5"></i>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
              <div class="card-header d-flex align-items-start pb-0">
                <div>
                    <h2 class="text-bold-700 mb-0">86</h2>
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
              <div class="card-header d-flex align-items-start pb-0">
                <div>
                    <h2 class="text-bold-700 mb-0">86</h2>
                    <p>Đơn đã giao</p>
                </div>
                <div class="avatar bg-rgba-success p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-truck text-success font-medium-5"></i>
                    </div>
                </div>
              </div>
            </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                  <div>
                      <h2 class="text-bold-700 mb-0">86</h2>
                      <p>Đơn chờ xác nhận</p>
                  </div>
                  <div class="avatar bg-rgba-warning p-50 m-0">
                      <div class="avatar-content">
                          <i class="feather icon-edit text-warning font-medium-5"></i>
                      </div>
                  </div>
                </div>
              </div>
              </div>
          </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="mb-0">Danh sách order</h4>
            </div>
            <div class="card-content">
              <div class="table-responsive mt-1">
                <table class="table table-hover-animation mb-0">
                  <thead>
                    <tr>
                      <th>ORDER</th>
                      <th>STATUS</th>
                      <th>OPERATORS</th>
                      <th>LOCATION</th>
                      <th>DISTANCE</th>
                      <th>START DATE</th>
                      <th>EST DEL. DT</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>#879985</td>
                      <td><i class="fa fa-circle font-small-3 text-success mr-50"></i>Moving</td>
                      <td class="p-1">
                        <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Vinnie Mostowy" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-11.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Elicia Rieske" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-7.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Julee Rossignol" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-10.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Darcey Nooner" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-8.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                        </ul>
                      </td>
                      <td>Anniston, Alabama</td>
                      <td>
                        <span>130 km</span>
                        <div class="progress progress-bar-success mt-1 mb-0">
                          <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td>14:58 26/07/2018</td>
                      <td>28/07/2018</td>
                    </tr>
                    <tr>
                      <td>#156897</td>
                      <td><i class="fa fa-circle font-small-3 text-warning mr-50"></i>Pending</td>
                      <td class="p-1">
                        <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Trina Lynes" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-1.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Lilian Nenez" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-2.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Alberto Glotzbach" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-3.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                        </ul>
                      </td>
                      <td>Cordova, Alaska</td>
                      <td>
                        <span>234 km</span>
                        <div class="progress progress-bar-warning mt-1 mb-0">
                          <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td>14:58 26/07/2018</td>
                      <td>28/07/2018</td>
                    </tr>
                    <tr>
                      <td>#568975</td>
                      <td><i class="fa fa-circle font-small-3 text-success mr-50"></i>Moving</td>
                      <td class="p-1">
                        <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Lai Lewandowski" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-6.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Elicia Rieske" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-7.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Darcey Nooner" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-8.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Julee Rossignol" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-10.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Jeffrey Gerondale" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-9.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                        </ul>
                      </td>
                      <td>Florence, Alabama</td>
                      <td>
                        <span>168 km</span>
                        <div class="progress progress-bar-success mt-1 mb-0">
                          <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td>14:58 26/07/2018</td>
                      <td>28/07/2018</td>
                    </tr>
                    <tr>
                      <td>#245689</td>
                      <td><i class="fa fa-circle font-small-3 text-danger mr-50"></i>Canceled</td>
                      <td class="p-1">
                        <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Vinnie Mostowy" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-5.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                          <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                          data-original-title="Elicia Rieske" class="avatar pull-up">
                            <img class="media-object rounded-circle" src="{{ asset('images/portrait/small/avatar-s-7.jpg')}}" alt="Avatar" height="30" width="30">
                          </li>
                        </ul>
                      </td>
                      <td>Clifton, Arizona</td>
                      <td>
                        <span>125 km</span>
                        <div class="progress progress-bar-danger mt-1 mb-0">
                          <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td>
                      <td>14:58 26/07/2018</td>
                      <td>28/07/2018</td>
                    </tr>
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
