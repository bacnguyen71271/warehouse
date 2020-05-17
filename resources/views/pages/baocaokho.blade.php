@extends('layouts/contentLayoutMaster')

@section('title', 'Báo cáo kho')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
@endsection

@section('page-style')
    <style>
        table#baocaonhap {
            overflow-x: auto;
        }
    </style>
@endsection

@section('content')

    @php
        function product_price($priceFloat) {
            $symbol = '';
            $symbol_thousand = ',';
            $decimal_place = 0;
            $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
            return $price.$symbol;
        }

        function checkTenhang($tenhang,$mahang){
            if($tenhang){
                foreach ($tenhang as $th){
                    if($mahang == $th){
                        return true;
                    }
                }
            }
            return false;
        }
    @endphp

    <section class="">
        <div class="row">
            <div class="col-md-12 col-12 ">
                <div class="card">
                    <div class="card-body">
                        <form method="GET">
                            <div class="row">
                                <div class="form-group mb-0 col-3">
                                    <label for="first-name-vertical">Loại báo cáo</label>
                                    <select class="form-control" name="report-type">
                                        <option @if($loaibaocao == 'nhapkho') selected @endif value="nhapkho">Nhập kho
                                        </option>
                                        <option @if($loaibaocao == 'xuatkho') selected @endif value="xuatkho">Xuất kho
                                        </option>
                                        <option @if($loaibaocao == 'ketxuat') selected @endif value="ketxuat">Nhập -
                                            Xuất
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mb-0 col-6">
                                    <label for="first-name-vertical">Khoảng thời gian</label>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input name="from" class="form-control"
                                                   value="@if($from ?? ''){{$from}}@endif" type="date">
                                        </div>
                                        đến
                                        <div class="col-md-5">
                                            <input name="to" class="form-control" value="@if( $to ?? ''){{$to}}@endif"
                                                   type="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 col-3">
                                    <label for="first-name-vertical">Kho</label>
                                    <select class="form-control" name="kho">
                                        @foreach($danhsachkho as $khos)
                                            <option @if($khos['id'] == $kho) selected
                                                    @endif value="{{ $khos['id'] }}">{{ $khos['tenkho'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-0 col-5">
                                    <label for="first-name-vertical">Tên hàng hóa</label>
                                    <select name="tenhang[]" class="select2 form-control" multiple="multiple">
                                        @foreach($listhanghoa as $hanghoa)
                                            <option @if(checkTenhang($tenhang ,$hanghoa['mahang'])) selected
                                                    @endif value="{{ $hanghoa['mahang'] }}">{{ $hanghoa['tenhang'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-0 mb-0 col-7">
                                    <label for="first-name-vertical">Tên chương trình</label>
                                    <input type="text" value="@if($title ?? ''){{ $title }}@endif" name="title"
                                           class="form-control"/>
                                </div>
                                <div class="form-group mb-0 col-2">
                                    <label for="first-name-vertical"></label>
                                    <button type="submit"
                                            class="btn bg-gradient-primary mr-1 mb-1 mt-2 waves-effect waves-light">Tìm
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="table-responsive">
                            @if($loaibaocao == "nhapkho" || $loaibaocao == "xuatkho")
                                <table id="baocaonhap" class="table w-100">
                                    <thead>
                                    <tr>
                                        <td class="font-weight-bold">Ngày</td>
                                        <td class="font-weight-bold">Tháng</td>
                                        <td class="font-weight-bold">Chương trình</td>
                                        <td class="font-weight-bold">Tên hàng</td>
                                        <td class="font-weight-bold">Mã hàng</td>
                                        <td class="font-weight-bold">Đơn giá</td>
                                        <td class="font-weight-bold">Số lượng</td>
                                        <td class="font-weight-bold">Giá trị</td>
                                        <td class="font-weight-bold">Ghi chú</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($results as $result)
                                        <tr>
                                            <td>{{ date('d',strtotime($result['created_at']) ) }}</td>
                                            <td>{{ date('m',strtotime($result['created_at']) ) }}</td>
                                            <td>{{ $result['tenchuongtrinh'] }}</td>
                                            <td>{{ $result['tenhang'] }}</td>
                                            <td>{{ $result['mahang'] }}</td>
                                            <td>{{ product_price($result['dongia']) }}</td>
                                            <td>{{ $result['soluong'] }}</td>
                                            <td>{{ product_price($result['dongia']*$result['soluong']) }}</td>
                                            <td>{{ $result['ghichu'] }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif

                            @if($loaibaocao == "ketxuat")
                                <table id="baocaonhap" class="table w-100">
                                    <thead>
                                    <tr>
                                        <td class="font-weight-bold">Tên hàng</td>
                                        <td class="font-weight-bold">Mã hàng</td>
                                        <td class="font-weight-bold">Đơn giá</td>
                                        <td class="font-weight-bold">Tồn đầu kỳ</td>
                                        <td class="font-weight-bold">Tồn cuối kỳ</td>
                                        <td class="font-weight-bold">Biến động</td>
                                        <td class="font-weight-bold">Giá trị biến động</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($results as $result)
                                        <tr>
                                            <td>{{ $result['tenhang'] }}</td>
                                            <td>{{ $result['mahang'] }}</td>
                                            <td>{{ product_price($result['dongia']) }}</td>
                                            <td>{{ $result['tondauky'] }}</td>
                                            <td>{{ $result['toncuoiky'] }}</td>
                                            <td>{{ $result['biendong'] }}</td>
                                            <td>{{ product_price($result['biendong'] * $result['dongia']) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>


    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/select/form-select2.js')) }}"></script>
    <script>
        $('#baocaonhap').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

    </script>

@endsection
