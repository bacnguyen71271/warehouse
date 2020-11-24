@extends('layouts/contentLayoutMaster')

@section('title', 'Chi tiết xuất kho')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
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
        table.hangnhap td {
            padding: 5px;
            border: 1px solid #bfbfbf;
        }

        .dz-preview.dz-file-preview {
            margin: 0px !important;
        }

        .error{
            border: 1px solid red;
        }

        .dz-message {
            height: 100px !important;
        }

        .dropzone {
            width: 100%;
            min-height: 130px !important;
            padding: 10px !important;
        }

        .dropzone .dz-preview {
            margin: 0px !important;
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

    <link rel="stylesheet" href="{{ asset(mix('css/plugins/file-uploaders/dropzone.css')) }}">
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
                        <div class="card-title mb-2">Sửa phiếu xuất</div>
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
                                <td class="font-weight-bold">Trạng thái</td>
                                <td>@if (!$whhistorytemp["status"])
                                        <div class="chip chip-warning">
                                            <div class="chip-body">
                                                <div class="chip-text">Pending</div>
                                            </div>
                                        </div>
                                        <button type="button" order_id="{{ $whhistorytemp["id"] }}"
                                                class="btn-approved btn btn-sm btn-outline-success waves-effect waves-light">
                                            -> Approved
                                        </button>
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
                                <td colspan="2">
                                    <table class="hangnhap">
                                        <thead>
                                        <tr>
                                            <th>Tên hàng</th>
                                            <th>Mã hàng</th>
                                            <th>Số lượng trong kho</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listhang as $key => $value)
                                            <tr data-id="{{ $value['id'] }}">
                                                <td>
                                                    <select name="hanghoa">
                                                        <option>--Chọn hàng hóa--</option>
                                                        @foreach($categorys as $category)
                                                            <option @if($category['id'] == $value['danhmucId']) selected @endif value="{{ $category['id'] }}">{{ $category['tenhang'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="mahanghoa">{{ $value['mahang'] }}</td>
                                                <td><span class="soluongtrongkho"></span></td>
                                                <td class="dongiahang">{{ product_price($value['dongia']) }}</td>
                                                <td><input type="number" value="{{ $value['soluong'] }}" name="soluong"></td>
                                                <td class="tonggiatri">{{ product_price($value['soluong'] * $value['dongia']) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Kho xuất</td>
                                <td>
                                    <div class="col-lg-6 col-sm-12 data-field-col pl-0">
                                        <fieldset class="form-group mb-0">
                                            <select class="select2 form-control" id="kho">
                                                <option value="-1">Chọn kho xuất</option>
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
                                <td class="font-weight-bold">Ngày xuất kho</td>
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
                                <td class="font-weight-bold">Người nhập</td>
                                <td>
                                    <a href="{{ url('user')}}/{{ $whhistorytemp['email'] }}"> {{ $whhistorytemp['name'] }}
                                        - {{ $whhistorytemp['email'] }}</a></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">File đính kèm</td>
                                <td>
                                    @foreach ($files as $file)
                                        <a target="_blank" class="attackfile"
                                           href="{{ url('uploads')}}/{{ $file['filename'] }}">
                                            <div class="badge badge-success mr-1 mb-1">
                                                <i class="feather icon-file"></i>
                                                <span> {{ $file['name_old'] }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                    <div action="#" class="dropzone dropzone-area" id="dp-accept-files">
                                        <div class="dz-message">Drop Files Here To Upload</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Ghi chú</td>
                                <td>
                                    <textarea style="width: 100%; margin-top: 0px; margin-bottom: 0px; height: 125px;" class="nhapnhieu-ghichu">{{ $whhistorytemp['ghichu'] }}</textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>

    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
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
                init: function () {
                    var myDropzone = this;
                    $("#btn-xacnhan-nhapnhieu").click(function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        let check = true;
                        if ($('.tenchuongtrinh').val() == '') {
                            check = false;
                            $('.tenchuongtrinh').addClass('error');
                        } else {
                            $('.tenchuongtrinh').removeClass('error');
                        }

                        if ($('.nhapnhieu-kho').val() == -1) {
                            check = false;
                            $('.nhapnhieu-kho').addClass('error');
                        } else {
                            $('.nhapnhieu-kho').removeClass('error');
                        }

                        if ($('.nhapnhieu-ngayxuat').val() == '') {
                            check = false;
                            $('.nhapnhieu-ngayxuat').addClass('error');
                        } else {
                            $('.nhapnhieu-ngayxuat').removeClass('error');
                        }

                        $('.nhapkho-data').each(function(row){
                            if ($(this).find('.nhapnhieu-tenhanghoa').val() == -1) {
                                check = false;
                                $(this).find('.nhapnhieu-tenhanghoa').addClass('error');
                            } else {
                                $(this).find('.nhapnhieu-tenhanghoa').removeClass('error');
                            }

                            if ($(this).find('.nhapnhieu-soluong').val() == '' || $(this).find('.nhapnhieu-soluong').val() == 0) {
                                check = false;
                                $(this).find('.nhapnhieu-soluong').addClass('error');
                            } else {
                                $(this).find('.nhapnhieu-soluong').removeClass('error');
                            }
                        })


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

                                var data = [];
                                $('.nhapkho-data').each(function(row){
                                    data.push({
                                        tenhang: $(this).find('.nhapnhieu-tenhanghoa').val(),
                                        soluong: $(this).find('.nhapnhieu-soluong').val()
                                    })
                                })

                                if (result.value) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '{{ url('xuatkho') }}',
                                        headers: {
                                            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                                        },
                                        data: {
                                            'kho': $('.nhapnhieu-kho').val(),
                                            'tenchuongtrinh': $('.tenchuongtrinh').val(),
                                            'ngayxuat': $('.nhapnhieu-ngayxuat').val(),
                                            'ghichu': $('.nhapnhieu-ghichu').val(),
                                            'data' : data
                                        },
                                        dataType: 'json',
                                        success: function (data) {
                                            if (data.status) {
                                                formResponse = data.data;
                                                myDropzone.processQueue();
                                                if (myDropzone.getQueuedFiles().length <= 0) {
                                                    //
                                                    location.reload();
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
        })

        checkhangton();
        $('#kho').change(function () {
            checkhangton();
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
                                giatri = giatri.toString().substring(0, giatri.toString().length - 3) + '.' + giatri.toString().substring(giatri.toString().length - 3, giatri.toString().length);
                                $('fieldset.giatri>input').val(number_format(giatri, 0, ',', ','));
                            } else {
                                $('fieldset.giatri>input').val('');
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


            if ($('fieldset.ngaynhapkho>input').val() == '') {
                check = false;
                $('fieldset.ngaynhapkho>span').html('Hãy nhập ngày xuất kho');
                $('fieldset.ngaynhapkho>input').addClass('is-invalid');
            } else {
                $('fieldset.ngaynhapkho>input').removeClass('is-invalid');
            }

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
                        var data = [];
                        $('table.hangnhap tbody>tr').each(function () {
                            data.push({
                                id : $(this).attr('data-id'),
                                mahang : $(this).find('select[name="hanghoa"]').val(),
                                soluong : $(this).find('input[name="soluong"]').val()
                            })
                        })
                        $.ajax({
                            type: 'POST',
                            url: "{{ url('xuatkho/suaphieu') }}/{{ $whhistorytemp['id'] }}",
                            headers: {
                                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                            },
                            data: {
                                'data' : data,
                                'kho' : $('#kho').val(),
                                'tenchuongtrinh': $('fieldset.tenchuongtrinh>input').val(),
                                'ngayxuat': $('fieldset.ngaynhapkho>input').val(),
                                'ghichu': $('.nhapnhieu-ghichu').val()
                            },
                            dataType: 'json',
                            success: function (data) {
                                if (data.status) {
                                    window.location = "{{ url('/xuatkho') }}/{{ $whhistorytemp['id'] }}";
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

                var dongia = $('fieldset.dongia>input').val().match(/\d/g);
                dongia = dongia.join("");
                var giatri = dongia * parseInt($('fieldset.soluong>input').val());
                $('fieldset.giatri>input').val(number_format(giatri, 0, ',', ','));
            } else {
                $('fieldset.giatri>input').val('');
            }
        });

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

        $('input[name="soluong"]').keyup(function () {
            var soluongtemp = $(this).closest('tr').find('.soluongtrongkho').html();
            if($(this).val() >= parseInt(soluongtemp)){
                $(this).val(parseInt(soluongtemp));
            }
            if($(this).val() == ''){
                $(this).val(0);
            }

            var dongia = $(this).closest('tr').find('.dongiahang').html().match(/\d/g);
            dongia = dongia.join("");
            var soluong = $(this).val();
            $(this).closest('tr').find('.tonggiatri').html(number_format(parseInt(dongia) * parseInt(soluong), 0, ',', ','))
        })

        $('select[name="hanghoa"]').change(function () {
            var self = $(this);
            var idkho = $('#kho').val();
            var idhang = $(this).val();
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
                        self.closest('tr').find('.soluongtrongkho').html(data.data)
                    }
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ url('categoryinfo') }}',
                headers: {
                    'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                },
                data: {
                    'iddanhmuc': idhang,
                },
                dataType: 'json',
                success: function (data) {
                    if (data.status) {
                        self.closest('tr').find('.mahanghoa').html(data.data.mahang);
                        self.closest('tr').find('.dongiahang').html(number_format(data.data.dongia, 0, ',', ','));
                        self.closest('tr').find('input[name="soluong"]').val()
                        if (self.closest('tr').find('input[name="soluong"]').val() != '' || self.closest('tr').find('input[name="soluong"]').val() <= 0) {
                            var giatri = data.data.dongia * parseInt(self.closest('tr').find('input[name="soluong"]').val());
                            self.closest('tr').find('.tonggiatri').html(number_format(giatri, 0, ',', ','));
                        } else {
                            self.closest('tr').find('.tonggiatri').html('');
                        }
                    }
                }
            });
        })

        function checkhangton() {
            var idkho = $('#kho').val();
            $('.hangnhap tr').each(function () {
                var self = $(this);
                var idhang = self.find('select[name="hanghoa"]').val();
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
                            self.find('.soluongtrongkho').html(data.data)
                        }
                    }
                });
            })
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
                                window.location = "{{ url('/xuatkho') }}/{{ $whhistorytemp['id'] }}";
                            }, delay);
                        }
                    })
                }
            });
        })
    </script>

@endsection
