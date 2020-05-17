@extends('layouts/contentLayoutMaster')

@section('title', 'Sửa phiếu nhập')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}">
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

        .soluongtrongkho {
            color: red;
            font-size: 0.9rem;
        }

        .soluongtrongkho p {
            font-weight: 600;
            display: contents;
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
                        @if($whhistorytemp["status"] == 0 || $whhistorytemp["userid"] == Auth::id())
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <button class="btn mb-1 btn-primary waves-effect waves-light btn-xacnhan">Lưu
                                            thay đổi
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="w-100">
                            <tr>
                                <td class="font-weight-bold">Tên chương trình</td>
                                <td>
                                    <div class="col-lg-6 col-sm-12 data-field-col pl-0">
                                        <fieldset class="form-group tenchuongtrinh mb-0">
                                            <input value="{{ $whhistorytemp['tenchuongtrinh'] }}" type="text"
                                                   class="form-control" id="tenchuongtrinh">
                                            <span class="invalid-feedback" role="alert"></span>
                                        </fieldset>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Tên hàng</td>
                                <td>
                                    <div class="col-lg-6 col-sm-12 data-field-col pl-0">
                                        <fieldset class="form-group tenhanghoa mb-0">
                                            <select class="select2 form-control" id="thh">
                                                <option value="-1">Chọn hàng hóa</option>
                                                @foreach ($categorys as $category)
                                                    <option @if($whhistorytemp['danhmucId'] == $category['id']) selected
                                                            @endif value="{{ $category['id'] }}">{{ $category['tenhang'] }}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Mã hàng</td>
                                <td class="mahanghoa">{{ $whhistorytemp['mahang'] }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Đơn giá</td>
                                <td class="dongia">{{ product_price($whhistorytemp['dongia']) }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Số lượng</td>
                                <td>
                                    <div class="col-lg-6 col-sm-12 data-field-col pl-0">
                                        <fieldset class="form-group soluong mb-0">
                                            <input value="{{ $whhistorytemp['soluong'] }}" type="number"
                                                   class="form-control">
                                            <span class="invalid-feedback" role="alert"></span>
                                            <span class="soluongtrongkho">Trong kho: <p>0</p></span>
                                        </fieldset>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Giá trị</td>
                                <td class="giatri">{{ product_price($whhistorytemp['dongia'] * $whhistorytemp['soluong']) }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Kho nhập</td>
                                <td>
                                    <div class="col-lg-6 col-sm-12 data-field-col pl-0">
                                        <fieldset class="form-group tenhanghoa mb-0">
                                            <select class="select2 form-control" id="kho">
                                                <option value="-1">Chọn kho nhập</option>
                                                @foreach ($warehouses as $warehouse)
                                                    <option
                                                        @if($whhistorytemp['warehouseId'] == $warehouse['id']) selected
                                                        @endif value="{{ $warehouse['id'] }}">{{ $warehouse['tenkho'] }}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Ngày nhập kho</td>
                                <td>
                                    <div class="col-lg-6 col-sm-12 data-field-col pl-0">
                                        <fieldset class="form-group ngaynhapkho mb-0">
                                            <input value="{{ $whhistorytemp['thoigian'] }}" type='date'
                                                   class="form-control pickadate-months-year"/>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </fieldset>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Ngày hết hạn</td>
                                <td>
                                    <div class="col-lg-6 col-sm-12 data-field-col pl-0">
                                        <fieldset class="form-group ngayhethan mb-0">
                                            <input value="{{ $whhistorytemp['hansudung'] }}" type='date'
                                                   class="form-control pickadate-months-year"/>
                                            <span class="invalid-feedback" role="alert"></span>
                                        </fieldset>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Người nhập</td>
                                <td>
                                    <a href="{{ url('user')}}/{{ $whhistorytemp['email'] }}"> {{ $whhistorytemp['name'] }}
                                        - {{ $whhistorytemp['email'] }}</a></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Ghi chú</td>
                                <td><textarea style="width: 100%" class="form-control" id="basicTextarea" rows="3" placeholder="Ghi chú">{{ $whhistorytemp['ghichu'] }}</textarea></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>

    <script>
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

        checkhangton();
        $('#kho').change(function () {
            if ($('#thh').val() != -1) {
                checkhangton();
            }
        })

        $('#thh').change(function () {
            if ($('#thh').val() == -1) {
                $('.mahanghoa').html('');
                $('.dongia').html('');
                $('.giatri').html('');
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
                            $('.mahanghoa').html(data.data.mahang);
                            $('.dongia').html(number_format(data.data.dongia, 0, ',', ','));
                            if ($('fieldset.soluong>input').val() != '' || $('fieldset.soluong>input').val() <= 0) {
                                var giatri = data.data.dongia * parseInt($('fieldset.soluong>input').val());
                                giatri = giatri.toString().substring(0, giatri.toString().length - 3) + '.' + giatri.toString().substring(giatri.toString().length - 3, giatri.toString().length);
                                $('.giatri').html(number_format(giatri, 0, ',', ','));
                            } else {
                                $('.giatri').html('');
                            }
                        }
                    }
                });
            }

        })

        $(".btn-xacnhan").click(function (e) {
            let check = true;
            if ($('fieldset.tenchuongtrinh>input').val() == '') {
                check = false;
                $('fieldset.tenchuongtrinh>span').html('Hãy nhập tên chương trình');
                $('fieldset.tenchuongtrinh>input').addClass('is-invalid');
            } else {
                $('fieldset.tenchuongtrinh>input').removeClass('is-invalid');
            }

            // if ($('fieldset.soluong>input').val() == '' || $('fieldset.soluong>input').val() <= 0) {
            //     check = false;
            //     $('fieldset.soluong>span').html('Số lượng không hợp lệ');
            //     $('fieldset.soluong>input').addClass('is-invalid');
            // } else {
            //     $('fieldset.soluong>input').removeClass('is-invalid');
            // }

            if ($('fieldset.ngaynhapkho>input').val() == '') {
                check = false;
                $('fieldset.ngaynhapkho>span').html('Hãy nhập ngày xuất kho');
                $('fieldset.ngaynhapkho>input').addClass('is-invalid');
            } else {
                $('fieldset.ngaynhapkho>input').removeClass('is-invalid');
            }

            //
            // if ($('fieldset.mahanghoa>input').val() == "") {
            //     check = false;
            //     $('fieldset.mahanghoa>span').html('Hãy chọn một loại hàng');
            //     $('fieldset.mahanghoa>input').addClass('is-invalid');
            // } else {
            //     $('fieldset.mahanghoa>input').removeClass('is-invalid');
            // }

            if ($('#kho').val() == -1) {
                check = false;
            }

            if (check) {

                Swal.fire({
                    title: 'Xác nhận lưu phiếu ?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Vâng!',
                    cancelButtonText: 'Hủy',
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-danger ml-1',
                    buttonsStyling: false,
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: "{{ url('nhapkho/suaphieu') }}/{{ $whhistorytemp['id'] }}",
                            headers: {
                                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                            },
                            data: {
                                'mahang': $('#thh').val(),
                                'kho': $('#kho').val(),
                                'tenchuongtrinh': $('fieldset.tenchuongtrinh>input').val(),
                                'soluong': $('fieldset.soluong>input').val(),
                                'ngayxuat': $('fieldset.ngaynhapkho>input').val(),
                                'ngayhethan': $('fieldset.ngayhethan>input').val(),
                                'ghichu': $('#basicTextarea').val()
                            },
                            dataType: 'json',
                            success: function (data) {
                                if (data.status) {
                                    window.location = "{{ url('/lichsunhap') }}/{{ $whhistorytemp['id'] }}";
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


        $('fieldset.soluong>input').keyup(function () {
            if ($('fieldset.soluong>input').val() != '' ||
                $('fieldset.soluong>input').val() <= 0 &&
                $('fieldset.dongia>input').val() != '') {
                $('fieldset.soluong>input').val()

                if ($('fieldset.soluong>input').val() > soluongtronkho) {
                    $('fieldset.soluong>input').val(soluongtronkho);
                }

                var dongia = $('.dongia').html().match(/\d/g);
                dongia = dongia.join("");
                var giatri = dongia * parseInt($('fieldset.soluong>input').val());
                $('.giatri').html((number_format(giatri, 0, ',', ',')));
            } else {
                $('.giatri').html('');
            }
        });

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

        $('.btn-approved').click(function () {
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
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/comfirm-xuatkho')}}",
                        headers: {
                            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                        },
                        data: {
                            'id_order': $('.btn-approved').attr('order_id')
                        },
                        dataType: 'json',
                        success: function (data) {
                            $.toast(data.msg);
                            var delay = 1000;
                            setTimeout(function () {
                                location.reload();
                            }, delay);
                        }
                    })
                }
            });
        })
    </script>

@endsection
