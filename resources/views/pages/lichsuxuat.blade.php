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

    td.font-weight-bold {
        width: 200px;
    }
</style>
@endsection

@section('content')

@php
function product_price($priceFloat) {
    $symbol = ' đ';
    $symbol_thousand = '.';
    $decimal_place = 0;
    $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
    return $price.$symbol;
}
@endphp
<section class="lich-su-nhap">
    <div class="row">
        <div class="col-md-12 col-12 ">
            <div class="card">
              <div class="card-body">
                <div class="card-title mb-2">Thông tin chi tiết order xuất kho</div>
                <table class="w-100">
                    <tr>
                        <td class="font-weight-bold">Trạng thái</td>
                        <td>@if (!$whhistorytemp["status"])
                            <div class="chip chip-warning">
                                <div class="chip-body">
                                    <div class="chip-text">Pending</div>
                                </div>
                            </div>
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
                    <td class="font-weight-bold">Tên hàng</td>
                    <td>{{ $whhistorytemp['tenhang'] }}</td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Mã hàng</td>
                    <td>{{ $whhistorytemp['mahang'] }}</td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Đơn giá</td>
                    <td>{{ product_price($whhistorytemp['dongia']) }}</td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Số lượng</td>
                    <td>{{ $whhistorytemp['soluong'] }}</td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Giá trị</td>
                    <td>{{ product_price($whhistorytemp['dongia'] * $whhistorytemp['soluong']) }}</td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Ngày nhập kho</td>
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
                        <a target="_blank" href="{{ url('viewfile')}}/{{ $file['filename'] }}"><div class="badge badge-success mr-1 mb-1">
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
@endsection