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
                            <button class="btn btn-primary mr-1 btn-luu"><i class="feather icon-edit-1"></i>
                                Lưu</button>
                            <button class="btn btn-outline-danger"><i class="feather icon-trash-2"></i> Xóa tài
                                khoản</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- social links end -->
        <!-- permissions start -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i
                                class="feather icon-lock mr-50 "></i>Phân quyền
                        </h6>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Kho</th>
                                    <th>Quyền truy cập</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($warehouses as $warehouse)
                                    <tr>
                                        <td>{{ $warehouse['tenkho'] }}</td>
                                        @php
                                            $per = '';
                                            foreach ($permissions as $key => $value) {
                                                if($value['warehouse_id'] == $warehouse['id']){
                                                    $per = $value['permission'];
                                                }
                                            }
                                            echo $per;
                                        @endphp
                                        <td>
                                            <select class="form-control" name="quyenkho" perid="{{ $warehouse['id'] }}">
                                                <option value="Không cấp quyền" selected>Không cấp quyền</option>
                                                <option @if($per == 'User') selected @endif value="User">User</option>
                                                <option @if($per == 'Delivery') selected @endif value="Delivery">Delivery</option>
                                                <option @if($per == 'Approved') selected @endif value="Approved">Approved</option>
                                                <option @if($per == 'Administrator') selected @endif value="Administrator">Administrator</option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- permissions end -->
    </div>
</section>
<!-- page users view end -->
@endsection

@section('page-script')
<script>
    $('.btn-luu').click(function(){
        Swal.fire({
                title: 'Bạn muốn lưu thông tin ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng !',
                cancelButtonText: 'Hủy',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function(result) {
                if(result.value){

                    //Tạo mảng string permission
                    let per = '{';

                    $('select[name="quyenkho"]').each(function(index, value){
                        $temp = '"' + $(this).attr('perid') +'":"' + $(this).val() +'",'
                        per += $temp;
                    })

                    per = per.substring(0, per.length - 1);
                    per += '}';
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('useredit') }}",
                        headers: {
                            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                        },
                        data:{
                            'permission' : per,
                            'email' : '{{ $user['email']}}'
                        },
                        dataType: 'json',
                        success: function(data){
                            if(data.status){
                                $.toast(data.msg);
                                var delay = 3000; 
                                setTimeout(function(){ window.location = '{{ url('user') }}/{{ $user['email'] }}'; }, delay);
                            }
                        }
                    });
                }
            });
    })
</script>
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/pages/app-user.js')) }}"></script>
@endsection