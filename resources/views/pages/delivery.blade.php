<?php

use App\Http\Controllers\StaticController;

?>

@extends('layouts/contentLayoutMaster')

@section('title', 'Delivery')

@section('vendor-style')
    {{-- vendor files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
@endsection
@section('page-style')
    <style>
        .dz-preview.dz-file-preview {
            margin: 0px !important;
        }

        .dropzone {
            width: 100%;
            min-height: 130px !important;
            padding: 10px !important;
        }

        .dropzone .dz-preview {
            margin: 0px !important;
        }

        .soluongtrongkho p {
            display: contents;
            font-weight: 600;
        }

        .soluongtrongkho {
            color: #ff5757;
            font-size: 0.9rem;
        }

        .dropzone .dz-details {
            height: unset !important;
            width: unset !important;
        }

        .dropzone .dz-message {
            font-size: 1rem !important;
            top: 57px !important;
        }

        .dropzone .dz-message:before {
            font-size: 40px !important;
            top: 32px !important;
        }
    </style>
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/plugins/file-uploaders/dropzone.css')) }}">
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
    @endphp
    {{-- Data list view starts --}}
    <section id="data-list-view" class="data-list-view-header">
        <div class="card">
            <div class="card-body">
                <form method="GET">
                    <div class="row">
                        <div class="form-group mb-0 col-2">
                            <label for="first-name-vertical">Mã đơn</label>
                            <input type="text" value="@if($query['id'] ?? ''){{ $query['id'] }}@endif" name="id"
                                   class="form-control"/>
                        </div>
                        <div class="form-group mb-0 col-2">
                            <label for="first-name-vertical">Tên chương trình</label>
                            <input type="text" value="@if($query['title'] ?? ''){{ $query['title'] }}@endif" name="title"
                                   class="form-control"/>
                        </div>
                        <div class="form-group mb-0 col-2">
                            <label for="first-name-vertical">Trạng thái</label>
                            <select class="form-control" name="status">
                                <option @if(array_key_exists('status',$query) && $query['status'] == 0) selected @endif value="0">Chưa nhận
                                </option>
                                <option @if(array_key_exists('status',$query) && $query['status'] == 1) selected @endif value="1">On-going
                                </option>
                                <option @if(array_key_exists('status',$query) && $query['status'] == 2) selected @endif value="2">Done
                                </option>
                            </select>
                        </div>
                        <div class="form-group mb-0 col-6">
                            <label for="first-name-vertical">Thời gian tạo đơn</label>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input name="from" class="form-control"
                                           value="@if($query['from'] ?? ''){{ $query['from'] }}@endif" type="date">
                                </div>
                                đến
                                <div class="col-md-5">
                                    <input name="to" class="form-control" value="@if($query['to'] ?? ''){{ $query['to'] }}@endif"
                                           type="date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 col-12">
                            <label for="first-name-vertical"></label>
                            <button type="submit" class="btn bg-gradient-primary mr-1 mb-1 mt-2 waves-effect waves-light float-right">Tìm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
                    <th>MÃ ĐƠN</th>
                    <th>TÊN CHƯƠNG TRÌNH</th>
                    <th>GIÁ TRỊ</th>
                    <th>TRẠNG THÁI</th>
                    <th>KHO</th>
                    <th>NGƯỜI GIAO</th>
                    <th>HÀNH ĐỘNG</th>
                    <th>CHI TIẾT</th>
                    <th>NGÀY TẠO ĐƠN</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($deliverys as $delivery)
                    <tr>
                        <td>{{ $delivery["id"] }}</td>
                        <td>{{ $delivery["tenchuongtrinh"] }}</td>
                        <td>{{ product_price($delivery["dongia"]) }}</td>
                        @php $history = \App\Http\Controllers\StaticController::delivery($delivery['id']); @endphp
                        <td>
                            @if ($history->status == 1)
                                <div class="chip chip-warning">
                                    <div class="chip-body">
                                        <div class="chip-text">On-going</div>
                                    </div>
                                </div>
                            @elseif ($history->status == 2)
                                <div class="chip chip-success">
                                    <div class="chip-body">
                                        <div class="chip-text">Done</div>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>{{ \App\Http\Controllers\StaticController::getWHById($delivery['warehouseId'])->tenkho }}</td>
                        @php $user = \App\Http\Controllers\StaticController::getUserInfoByIdOrder($delivery['id']); @endphp
                        <td>@if ($user == null)
                                Chưa nhận
                            @else
                                {{ $user->name }}
                            @endif
                        </td>
                        <td class="product-action">
                            @if(\App\Http\Controllers\StaticController::Checknutgiaohang($delivery['warehouseId']))
                                @if ($history->status == 0)
                                    <button type="button" status="{{ $delivery["status"] }}"
                                            deliveryId="{{ $delivery["id"] }}"
                                            class="btn-comfirm btn bg-gradient-success mr-1 mb-1 waves-effect waves-light">
                                        Giao hàng
                                    </button>
                                @elseif ($history->status == 1)
                                    <button type="button" status="{{ $delivery["status"] }}"
                                            deliveryId="{{ $delivery["id"] }}"
                                            class="btn-comfirm btn bg-gradient-success mr-1 mb-1 waves-effect waves-light">
                                        Đã giao
                                    </button>
                                @endif
                            @endif
                        </td>
                        <td>
                            <button type="button" deliveryId="{{ $delivery["id"] }}"
                                    class="chitietOrder btn bg-gradient-success mr-1 mb-1 waves-effect waves-light">CHI
                                TIẾT
                            </button>
                        </td>
                        <td>{{ $delivery["created_at"] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{-- DataTable ends --}}
        <div class="modal fade text-left modal-background " id="modalnhapnhieu" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel4" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel4">Chi tiết đơn hàng</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="min-height: 400px">
                        <div class="row">
                            <div class="col-3">
                                <p>Tên chương trình: </p>
                            </div>
                            <div class="col-9">
                               <p class="tenchuongtrinh"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p>Kho nhập: </p>
                            </div>
                            <div class="col-9">
                                <p class="tenkho"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p>Ngày xuất: </p>
                            </div>
                            <div class="col-9">
                                <p class="ngayxuat"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p>Ghi chú: </p>
                            </div>
                            <div class="col-9">
                                <p class="ghichu"></p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table-nhaphang table table-striped mb-2">
                                <thead>
                                <tr>
                                    <th>TÊN HÀNG</th>
                                    <th width="">MÃ HÀNG</th>
                                    <th width="">SỐ LƯỢNG</th>
                                    <th width="">THÀNH TIỀN</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
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
    <script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
@endsection
@section('page-script')
    <script>
        var soluongtronkho = 0;
        $(document).ready(function () {
            "use strict"

            $('.chitietOrder').click(function () {
                $('#modalnhapnhieu').modal('show');
                var id = $(this).attr('deliveryId');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('getinfoorder') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                    },
                    data: {
                        'id': id,
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.status) {
                            $('.tenchuongtrinh').html(data.data.tenchuongtrinh);
                            $('.tenkho').html(data.data.tenkho);
                            $('.ngayxuat').html(data.data.ngayxuat);
                            $('.ghichu').html(data.data.ghichu);
                            $('.table-nhaphang tbody').html('');
                            data.data.danhsach.forEach(function (el) {
                                $('.table-nhaphang tbody').append('<tr><td>' +el.tenhang+ '</td><td>' + el.mahang + '</td><td>' + el.soluong + '</td><td>'+ number_format(el.soluong*el.dongia, 0, ',', ',')+'</td></tr>')
                            })
                        }
                    }
                })
            })

            $('.btn-comfirm').click(function () {
                    var title;
                    var deleveryid = $(this).attr('deliveryId');
                    var status = $(this).attr('status');
                    if (status == 0) {
                        title = 'Bạn nhận giao đơn hàng này ?';
                    } else {
                        title = 'Bạn đã giao xong đơn hàng này ?';
                    }

                    Swal.fire({
                        title: title,
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Vâng!',
                        cancelButtonText: 'Không',
                        confirmButtonClass: 'btn btn-primary',
                        cancelButtonClass: 'btn btn-danger ml-1',
                        buttonsStyling: false,
                    }).then(function (result) {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                url: "{{ url('delivery') }}",
                                headers: {
                                    'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                                },
                                data: {
                                    'madon': deleveryid,
                                    'trangthai': status,
                                },
                                dataType: 'json',
                                success: function (data) {
                                    if (data.status) {
                                        location.reload();
                                    } else {
                                        Swal.fire({
                                            title: data.msg,
                                            type: 'warning',
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Okey!',
                                            confirmButtonClass: 'btn btn-primary',
                                            cancelButtonClass: 'btn btn-danger ml-1',
                                            buttonsStyling: false,
                                        })
                                    }
                                }
                            })
                        }
                    })
                }
            )

            function number_format(number, decimals, dec_point, thousands_sep) {
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


            let editElement;
            // init list view datatable
            var dataListView = $(".data-list-view").DataTable({
                responsive: false,
                aoColumnDefs: [
                    {
                        "bVisible": false,
                        // "aTargets": [7]
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
                    [8, "desc"]
                ],
                bInfo: false,
                pageLength: 10,

                initComplete: function (settings, json) {
                    $(".dt-buttons .btn").removeClass("btn-secondary")
                }
            });

            dataListView.on('draw.dt', function () {
                setTimeout(function () {
                    if (navigator.userAgent.indexOf("Mac OS X") != -1) {
                        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
                    }
                }, 50);
            });

            $('button[data-dismiss="modal"]').click(function () {
                $('#thh').val(-1).trigger('change.select2');
                $('#kho').val(-1).trigger('change.select2');
                $('#form-modal').trigger('reset');
                soluongtronkho = 0
            })

            function checkhangton() {
                var idkho = $('#kho').val();
                var idhang = $('#thh').val();

                $.ajax({
                    type: 'GET',
                    url: '{{ url('hangton') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                    },
                    data: {
                        'kho': idkho,
                        'mahang': idhang
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.status) {
                            soluongtronkho = data.data;
                            $('.soluongtrongkho p').html(data.data)
                        }
                    }
                });
            }

            $('#kho').change(function () {
                if ($('#thh').val() != -1) {
                    checkhangton();
                }
            })

            $('#thh').change(function () {
                if ($('#thh').val() == -1) {
                    $('fieldset.mahanghoa>input').val('');
                    $('fieldset.dongia>input').val('');
                    $('fieldset.giatri>input').val('');
                } else {

                    if ($('#kho').val() != -1) {
                        checkhangton();
                    }


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
                        success: function (data) {
                            if (data.status) {
                                $('fieldset.mahanghoa>input').val(data.data.mahang);
                                $('fieldset.dongia>input').val(number_format(data.data.dongia, 0, ',', ','));
                                if ($('fieldset.soluong>input').val() != '' || $('fieldset.soluong>input').val() <= 0) {
                                    var giatri = data.data.dongia * parseInt($('fieldset.soluong>input').val());
                                    $('fieldset.giatri>input').val(number_format(giatri, 0, ',', ','));
                                } else {
                                    $('fieldset.giatri>input').val('');
                                }
                            }
                        }
                    });
                }

            })


            $('fieldset.soluong>input').keyup(function () {
                if ($('fieldset.soluong>input').val() != '' ||
                    $('fieldset.soluong>input').val() <= 0 &&
                    $('fieldset.dongia>input').val() != '') {
                    $('fieldset.soluong>input').val()

                    if ($('fieldset.soluong>input').val() > soluongtronkho) {
                        $('fieldset.soluong>input').val(soluongtronkho);
                    }

                    var dongia = $('fieldset.dongia>input').val().match(/\d/g);
                    dongia = dongia.join("");
                    var giatri = dongia * parseInt($('fieldset.soluong>input').val());
                    $('fieldset.giatri>input').val(number_format(giatri, 0, ',', ','));
                } else {
                    $('fieldset.giatri>input').val('');
                }
            });

            $('form').on('focus', 'input[type=number]', function (e) {
                $(this).on('wheel.disableScroll', function (e) {
                    e.preventDefault()
                })
            })
            $('form').on('blur', 'input[type=number]', function (e) {
                $(this).off('wheel.disableScroll')
            })

            function commitFinish(formResponse, myDropzone) {
                $('#thh').val(-1).trigger('change.select2');
                $('#kho').val(-1).trigger('change.select2');
                $('#form-modal').trigger('reset');
                $('#backdrop').modal('hide');
                myDropzone.removeAllFiles();

                var newRow = dataListView.row.add([
                    formResponse.tenchuongtrinh,
                    formResponse.tenhang,
                    number_format(formResponse.dongia, 0, ',', ','),
                    formResponse.soluong,
                    formResponse.tenkho,
                    `<div class="chip chip-warning">
                        <div class="chip-body">
                            <div class="chip-text">Pending</div>
                        </div>
                    </div>`,
                    `<a href="{{ url('xuatkho') }}/` + formResponse.id + `">Chi tiết</a>`,
                    formResponse.created_at
                ]).draw().node();

                $(newRow)
                    .css('color', '#00861d')
                    .animate({
                        color: 'black'
                    })
                $.toast('Tạo phiếu order thành công');
            }

            let formResponse;
            $('#dp-accept-files').dropzone({
                paramName: "file",
                maxFilesize: 10, // MB
                acceptedFiles: ".xls,.xlsx",
                addRemoveLinks: true,
                dictRemoveFile: "Loại bỏ",
                autoDiscover: false,
                parallelUploads: 100,
                autoProcessQueue: false,
                headers: {
                    'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                },
                // params: {'idattach':idattach},
                init: function () {
                    var myDropzone = this;
                    $("#btn-xacnhan").click(function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        let check = true;
                        if ($('fieldset.tenchuongtrinh>input').val() == '') {
                            check = false;
                            $('fieldset.tenchuongtrinh>span').html('Hãy nhập tên chương trình');
                            $('fieldset.tenchuongtrinh>input').addClass('is-invalid');
                        } else {
                            $('fieldset.tenchuongtrinh>input').removeClass('is-invalid');
                        }

                        if ($('fieldset.soluong>input').val() == '' || $('fieldset.soluong>input').val() <= 0) {
                            check = false;
                            $('fieldset.soluong>span').html('Số lượng không hợp lệ');
                            $('fieldset.soluong>input').addClass('is-invalid');
                        } else {
                            $('fieldset.soluong>input').removeClass('is-invalid');
                        }

                        if ($('fieldset.ngaynhapkho>input').val() == '') {
                            check = false;
                            $('fieldset.ngaynhapkho>span').html('Hãy nhập ngày xuất kho');
                            $('fieldset.ngaynhapkho>input').addClass('is-invalid');
                        } else {
                            $('fieldset.ngaynhapkho>input').removeClass('is-invalid');
                        }


                        if ($('fieldset.mahanghoa>input').val() == "") {
                            check = false;
                            $('fieldset.mahanghoa>span').html('Hãy chọn một loại hàng');
                            $('fieldset.mahanghoa>input').addClass('is-invalid');
                        } else {
                            $('fieldset.mahanghoa>input').removeClass('is-invalid');
                        }

                        if ($('#kho').val() == -1) {
                            check = false;
                        }

                        if (check) {

                            Swal.fire({
                                title: 'Bạn có chắc chắn xuất kho với thông tin đã cung cấp ?',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Vâng, xuất kho!',
                                cancelButtonText: 'Hủy',
                                confirmButtonClass: 'btn btn-primary',
                                cancelButtonClass: 'btn btn-danger ml-1',
                                buttonsStyling: false,
                            }).then(function (result) {
                                if (result.value) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '{{ url('xuatkho') }}',
                                        headers: {
                                            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                                        },
                                        data: {
                                            'mahang': $('#thh').val(),
                                            'kho': $('#kho').val(),
                                            'tenchuongtrinh': $('fieldset.tenchuongtrinh>input').val(),
                                            'soluong': $('fieldset.soluong>input').val(),
                                            'ngayxuat': $('fieldset.ngaynhapkho>input').val(),
                                            'ghichu': $('#basicTextarea').val()
                                        },
                                        dataType: 'json',
                                        success: function (data) {
                                            if (data.status) {
                                                formResponse = data.data;
                                                myDropzone.processQueue();
                                                if (myDropzone.getQueuedFiles().length <= 0) {
                                                    //
                                                    commitFinish(data.data, myDropzone);
                                                }
                                            } else {
                                                Swal.fire({
                                                    title: 'Opps!!!',
                                                    type: 'warning',
                                                    text: data.msg,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Okey!',
                                                    confirmButtonClass: 'btn btn-primary',
                                                    cancelButtonClass: 'btn btn-danger ml-1',
                                                    buttonsStyling: false,
                                                })
                                            }
                                        }
                                    });
                                }
                            });
                        }
                    });

                    $('button[data-dismiss="modal"]').click(function (e) {
                        myDropzone.removeAllFiles();
                    });
                    this.on("processing", function (file) {
                        this.options.url = "/file-upload";
                    });

                    this.on("queuecomplete", function (files, response) {
                        //4321
                        commitFinish(formResponse, myDropzone);
                    });

                    this.on("success", function (files, response) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ url('createfiledata') }}',
                            headers: {
                                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                            },
                            data: {
                                'nameold': files.name,
                                'filename': response.data,
                                'idorder': formResponse.id,
                            },
                            dataType: 'json',
                            success: function (data) {
                            }
                        });
                        console.log(files);
                        console.log(response);
                        console.log('-----------------');
                    });

                },
            });
        });
    </script>

    <style>
        .modal-background {
            background-color: #00000040;
        }
    </style>
@endsection
