@extends('layouts/contentLayoutMaster')

@section('title', 'Danh sách nhập kho')

@section('vendor-style')
{{-- vendor files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection
@section('page-style')
{{-- Page css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
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
{{-- Data list view starts --}}
<section id="data-list-view" class="data-list-view-header">
    <div class="action-btns d-none">
        <div class="mr-1 mb-1">
            <div class="btn-group ">
                <button type="button" class="btn btn-white px-1 py-1 waves-effect waves-light" aria-haspopup="true"
                    aria-expanded="false">
                    Xóa
                </button>
            </div>
        </div>
    </div>

    {{-- DataTable starts --}}
    <div class="table-responsive">
        <table class="table data-list-view">
            <thead>
                <tr>
                    <th>TÊN CHƯƠNG TRÌNH</th>
                    {{-- <th>LOẠI HÀNG</th> --}}
                    <th>TÊN HÀNG</th>
                    {{-- <th>MÃ HÀNG HÓA</th> --}}
                    <th>ĐƠN GIÁ</th>
                    <th>SỐ LƯỢNG</th>
                    <th>KHO</th>
                    <th>HẠN SỬ DỤNG</th>
                    <th></th>
                    <th>Created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)

                @php
                $giatri = $product["dongia"] * $product["soluong"];
                @endphp
                <tr>
                    <td>{{ $product["tenchuongtrinh"] }}</td>
                    <td>{{ $product["tenhang"] }}</td>
                    <td>{{ product_price($product["dongia"]) }}</td>
                    <td>{{ $product["soluong"] }}</td>
                    <td>{{ $product["tenkho"] }}</td>
                    <td>{{ $product["hansudung"] }}</td>
                    <td class="product-action">
                        <a href="{{ url('lichsunhap/') }}/{{ $product["id"] }}">Chi tiết</a>
                    </td>
                    <td>{{ $product["created_at"] }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- DataTable ends --}}
    <div class="modal fade text-left modal-background" id="backdrop" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel4" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel4">Nhập hàng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-modal">
                    <div class="row">
                        <div class="col-sm-12 col-xl-12 data-field-col">
                            <fieldset class="form-group tenchuongtrinh">
                                <label for="data-name">Tên chương trình <code>(*)</code></label>
                                <input type="text" class="form-control" id="tenchuongtrinh">
                                <span class="invalid-feedback" role="alert"></span>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 data-field-col">
                            <fieldset class="form-group tenhanghoa">
                                <label for="data-name">Tên hàng hóa <code>(*)</code></label>
                                <select class="select2 form-control" id="thh">
                                    <option value="-1">Chọn hàng hóa</option>
                                    @foreach ($categorys as $category)
                                        <option value="{{ $category['id'] }}">{{ $category['tenhang'] }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-sm-12 data-field-col">
                            <fieldset class="form-group tenhanghoa">
                                <label for="data-name">Kho nhập <code>(*)</code></label>
                                <select class="select2 form-control" id="kho">
                                    <option value="-1">Chọn kho nhập</option>
                                    @foreach ($warehouses as $warehouse)
                                        <option value="{{ $warehouse['id'] }}">{{ $warehouse['tenkho'] }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 data-field-col">
                            <fieldset class="form-group mahanghoa">
                                <label>Mã hàng</label>
                                <input type="text" class="form-control" readonly="readonly">
                                <span class="invalid-feedback" role="alert"></span>
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12 data-field-col">
                            <fieldset class="form-group dongia">
                                <label for="giatrihang">Đơn giá</label>
                                <input type="text" class="form-control" readonly="readonly">
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 data-field-col">
                            <fieldset class="form-group soluong">
                                <label>Số lượng <code>(*)</code></label>
                                <input type="number" class="form-control">
                                <span class="invalid-feedback" role="alert"></span>
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12 data-field-col">
                            <fieldset class="form-group giatri">
                                <label for="giatri">Giá trị</label>
                                <input type="text" class="form-control"readonly="readonly">
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 data-field-col">
                            <fieldset class="form-group ngaynhapkho">
                                <label>Ngày nhập kho <code>(*)</code></label>
                                <input type='text' value="{{ date("Y-m-d") }}" class="form-control pickadate-months-year"/>
                                <span class="invalid-feedback" role="alert"></span>
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-sm-12 data-field-col">
                            <fieldset class="form-group ngayhethan">
                                <label>Ngày hết hạn <code>(*)</code></label>
                                <input type='text' value="{{ date("Y-m-d") }}" class="form-control pickadate-months-year" />
                                <span class="invalid-feedback" role="alert"></span>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <fieldset class="form-group">
                                <label>Ghi chú</label>
                                <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Ghi chú"></textarea>
                            </fieldset>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn-xacnhan" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>

</section>
{{-- Data list view end --}}
@endsection
@section('vendor-script')
{{-- vendor js files --}}
<script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.select.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
<script>
    $(document).ready(function() {
    "use strict"


    function number_format (number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    $(".select2").select2({
        // the following code is used to disable x-scrollbar when click in select input and
        // take 100% width in responsive also
        dropdownAutoWidth: true,
        width: '100%'
    });

    $('.pickadate-months-year').pickadate({
        weekdaysShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
        monthsFull: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        selectYears: true,
        selectMonths: true,
        formatSubmit: 'yyyy-mm-dd',
        format: 'yyyy-mm-dd',
    });
    
    let editElement;
    // init list view datatable
    var dataListView = $(".data-list-view").DataTable({
        responsive: false,
        aoColumnDefs: [
            {
                "bVisible": false,
                "aTargets": [7]
            },
            // {
            //     orderable: true,
            //     aTargets: [0],
            //     checkboxes: {
            //         selectRow: true
            //     }
            // },
            // { "sClass": "center", "aTargets": [ 4 ] }
        ],
        dom: '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
        oLanguage: {
            sLengthMenu: "_MENU_",
            sSearch: ""
        },
        aLengthMenu: [
            [4, 10, 15, 20],
            [4, 10, 15, 20]
        ],
        order: [
            [7, "desc"]
        ],
        bInfo: false,
        pageLength: 10,
        buttons: [{
            text: "<i class='feather icon-plus'></i> Nhập kho",
            action: function() {
                $('#thh').val(-1).trigger('change.select2');
                $('#kho').val(-1).trigger('change.select2');
                $('.is-invalid').removeClass('is-invalid');
            },
            className: "btn btn-outline-primary",
            attr:  {
                "data-toggle":"modal",
                "data-backdrop":"false",
                "data-target":"#backdrop"
            }
        }],
        initComplete: function(settings, json) {
            $(".dt-buttons .btn").removeClass("btn-secondary")
        }
    });

    dataListView.on('draw.dt', function() {
        setTimeout(function() {
            if (navigator.userAgent.indexOf("Mac OS X") != -1) {
                $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
            }
        }, 50);
    });

    $('form').on('focus', 'input[type=number]', function (e) {
        $(this).on('wheel.disableScroll', function (e) {
            e.preventDefault()
        })
    })
    $('form').on('blur', 'input[type=number]', function (e) {
        $(this).off('wheel.disableScroll')
    })

    $('#btn-xacnhan').click(function(){

        let check = true;
        if($('fieldset.tenchuongtrinh>input').val() == ''){
            check = false;
            $('fieldset.tenchuongtrinh>span').html('Hãy nhập tên chương trình');
            $('fieldset.tenchuongtrinh>input').addClass('is-invalid');
        }else{
            $('fieldset.tenchuongtrinh>input').removeClass('is-invalid');
        }

        if($('fieldset.soluong>input').val() == '' || $('fieldset.soluong>input').val() <= 0 ){
            check = false;
            $('fieldset.soluong>span').html('Số lượng không hợp lệ');
            $('fieldset.soluong>input').addClass('is-invalid');
        }else{
            $('fieldset.soluong>input').removeClass('is-invalid');
        }

        if($('fieldset.ngaynhapkho>input').val() == ''){
            check = false;
            $('fieldset.ngaynhapkho>span').html('Hãy nhập ngày nhập kho');
            $('fieldset.ngaynhapkho>input').addClass('is-invalid');
        }else{
            $('fieldset.ngaynhapkho>input').removeClass('is-invalid');
        }

        if($('fieldset.ngayhethan>input').val() == ''){
            check = false;
            $('fieldset.ngayhethan>span').html('Hãy nhập ngày hết hạn');
            $('fieldset.ngayhethan>input').addClass('is-invalid');
        }else{
            $('fieldset.ngayhethan>input').removeClass('is-invalid');
        }

        if($('fieldset.mahanghoa>input').val() == ""){
            check = false;
            $('fieldset.mahanghoa>span').html('Hãy chọn một loại hàng');
            $('fieldset.mahanghoa>input').addClass('is-invalid');
        }else{
            $('fieldset.mahanghoa>input').removeClass('is-invalid');
        }

        if($('#kho').val() == -1){
            check = false;
        }

        if(check){

            Swal.fire({
                title: 'Bạn có chắc chắn nhập kho với thông tin đã cung cấp ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, nhập kho!',
                cancelButtonText: 'Hủy',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                    type: 'POST',
                    url: '{{ url('nhapkho') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                    },
                    data: {
                        'mahang': $('#thh').val(),
                        'kho' : $('#kho').val(),
                        'tenchuongtrinh' : $('fieldset.tenchuongtrinh>input').val(),
                        'soluong' : $('fieldset.soluong>input').val(),
                        'ngaynhap' : $('fieldset.ngaynhapkho>input').val(),
                        'hansudung' : $('fieldset.ngayhethan>input').val(),
                        'ghichu' : $('#basicTextarea').val()
                    },
                    dataType: 'json',
                    success: function(data) {
                        if(data.status){
                            $('#thh').val(-1).trigger('change.select2');
                            $('#kho').val(-1).trigger('change.select2');
                            $('#form-modal').trigger('reset');
                            $('#backdrop').modal('hide');
                            var newRow = dataListView.row.add([
                                data.data.tenchuongtrinh,
                                data.data.tenhang,
                                number_format(data.data.dongia,0,'','.') + ' đ',
                                data.data.soluong,
                                data.data.tenkho,
                                data.data.hansudung,
                                `<a href="{{ url('lichsunhap') }}/`+ data.data.id +`">Chi tiết</a>`,
                                data.data.created_at
                            ]).draw().node();

                            $(newRow)
                                .css('color', '#00861d')
                                .animate({
                                    color: 'black'
                                })
                            $.toast(data.msg);
                        }else{
                            $.toast(data.msg);
                        }
                    }
                });
                }
            });
        }
    })

    $('button[data-dismiss="modal"]').click(function(){
        $('#thh').val(-1).trigger('change.select2');
        $('#kho').val(-1).trigger('change.select2');
        $('#form-modal').trigger('reset');
    })

    $('#thh').change(function(){
        if($('#thh').val() == -1){
            $('fieldset.mahanghoa>input').val('');
            $('fieldset.dongia>input').val('');
            $('fieldset.giatri>input').val('');
        }else{
            $.ajax({
                type: 'POST',
                url: '{{ url('categoryinfo') }}',
                headers: {
                    'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                },
                data: {
                    'iddanhmuc': $('#thh').val(),
                },
                dataType: 'json',
                success: function(data) {
                    if(data.status){
                        $('fieldset.mahanghoa>input').val(data.data.mahang);
                        $('fieldset.dongia>input').val(number_format(data.data.dongia,0,'','.') + 'đ');
                        if($('fieldset.soluong>input').val() != '' || $('fieldset.soluong>input').val() <= 0 ){
                            var giatri = data.data.dongia * parseInt($('fieldset.soluong>input').val());
                            $('fieldset.giatri>input').val(number_format(giatri,0,'','.') + 'đ');
                        }else{
                            $('fieldset.giatri>input').val('');
                        }
                    }
                }
            });
        }
        
    })
    

    $('fieldset.soluong>input').keyup(function(){
        if($('fieldset.soluong>input').val() != '' || 
        $('fieldset.soluong>input').val() <= 0 && 
        $('fieldset.dongia>input').val() != ''){

            var dongia = $('fieldset.dongia>input').val().match(/\d/g);
            dongia = dongia.join("");
            var giatri = dongia * parseInt($('fieldset.soluong>input').val());
            $('fieldset.giatri>input').val(number_format(giatri,0,'','.') + 'đ');
        }else{
            $('fieldset.giatri>input').val('');
        }
    })
});
</script>

<style>
    .modal-background {
        background-color: #00000040;
    }
</style>
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/ui/data-list-view.js')) }}"></script>
@endsection