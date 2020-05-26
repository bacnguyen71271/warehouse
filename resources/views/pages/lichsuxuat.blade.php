@extends('layouts/contentLayoutMaster')

@section('title', 'Chi tiết xuất kho')

@section('vendor-style')
@endsection

@section('page-style')
<style>
    .lich-su-nhap table td {
        padding-bottom: 0.8rem;
        min-width: 140px;
        word-break: break-word;
    }
    tbody table {
        border: 1px solid #333;
    }

    tbody thead {
        background-color: #dedede;
    }

    td.font-weight-bold {
        width: 200px;
    }
</style>
@endsection

@section('content')

@php
function product_price($priceFloat) {
    $symbol = '';
    $symbol_thousand = ',';
    $decimal_place = 0;
    $price = number_format($priceFloat, $decimal_place, ',', $symbol_thousand);
    return $price.$symbol;
}
@endphp
<section class="lich-su-nhap">
    <div class="row">
        <div class="col-md-12 col-12 ">
            <div class="card">
            <div class="card-header">
              <div class="card-title mb-2">Thông tin chi tiết order xuất kho</div>
              @if($whhistorytemp["status"] == 0)
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                    @if(\App\Http\Controllers\StaticController::checkNutXacnhan( $whhistorytemp['warehouseId'] ) || $whhistorytemp["id"] == Auth::id())
                  <li><a class="btn mb-1 p-1  btn-primary waves-effect waves-light" href="{{ url('xuatkho/suaphieu/') }}/{{ $whhistorytemp['id'] }}" data-action="reload">Sửa phiếu</a></li>
                    @endif
                </ul>
              </div>
              @endif
            </div>
              <div class="card-body">

                <table class="w-100">
                    <tr>
                        <td class="font-weight-bold">Trạng thái</td>
                        <td>@if (!$whhistorytemp["status"])
                            <div class="chip chip-warning">
                                <div class="chip-body">
                                    <div class="chip-text">Pending</div>
                                </div>
                            </div>
                            @if(\App\Http\Controllers\StaticController::checkNutXacnhan( $whhistorytemp['warehouseId'] ))
                            <button type="button" order_id="{{ $whhistorytemp["id"] }}" class="btn-approved btn btn-sm btn-outline-success waves-effect waves-light">-> Approved</button>
                                @endif
                        @else
                            <div class="chip chip-success">
                                <div class="chip-body">
                                    <div class="chip-text">Approved</div>
                                </div>
                            </div>
                        @endif</td>
                      </tr>
                  <tr>
                    <td class="font-weight-bold">Tên chương trình</td>
                    <td>{{ $whhistorytemp['tenchuongtrinh'] }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">
                        <table>
                            <thead>
                            <tr>
                                <th>Tên hàng</th>
                                <th>Mã hàng</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listhang as $key => $value)
                                <tr>
                                    <td>{{ $value['tenhang'] }}</td>
                                    <td>{{ $value['mahang'] }}</td>
                                    <td>{{ $value['dongia'] }}</td>
                                    <td>{{ $value['soluong'] }}</td>
                                    <td>{{ $value['soluong'] * $value['dongia'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Kho xuất</td>
                    <td>{{ $whhistorytemp['tenkho'] }}</td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Ngày xuất kho</td>
                    <td>{{ $whhistorytemp['thoigian'] }}</td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Người nhập</td>
                    <td><a href="{{ url('user')}}/{{ $whhistorytemp['email'] }}"> {{ $whhistorytemp['name'] }} - {{ $whhistorytemp['email'] }}</a></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">File đính kèm</td>
                    <td>
                        @foreach ($files as $file)
                        <a target="_blank" class="attackfile" href="{{ url('uploads')}}/{{ $file['filename'] }}"><div class="badge badge-success mr-1 mb-1">
                            <i class="feather icon-file"></i>
                            <span> {{ $file['name_old'] }}</span>
                            </div>
                        </a>
                        @endforeach
                    </td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Ghi chú</td>
                    <td>{{ $whhistorytemp['ghichu'] }}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
    </div>
</section>
@endsection

@section('vendor-script')

<script>

  {{-- $('.attackfile').click(function(e){
     e.preventDefault();
     $link = $(this).attr('href');
     var newwindow=window.open($link,"window2","");
  }); --}}

  $('.btn-approved').click(function(){
    Swal.fire({
                title: 'Bạn muốn xác nhận đơn hàng này ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, tôi xác nhận!',
                cancelButtonText: 'Hủy',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function(result) {
                if (result.value) {
                  $.ajax({
                    type: "POST",
                    url: "{{ url('/comfirm-xuatkho')}}",
                    headers: {
                        'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                    },
                    data: {
                      'id_order' : $('.btn-approved').attr('order_id')
                    },
                    dataType: 'json',
                    success: function(data) {
                      $.toast(data.msg);
                      var delay = 1000;
                      setTimeout(function(){ location.reload(); }, delay);
                    }
                  })
                }
            });
  })
</script>

@endsection
