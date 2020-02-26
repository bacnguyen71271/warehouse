@extends('layouts/contentLayoutMaster')

@section('title', 'Danh mục hàng hóa')

@section('vendor-style')
{{-- vendor files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')) }}">
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
                    <th></th>
                    <th>LOẠI HÀNG</th>
                    <th>TÊN HÀNG</th>
                    <th>MÃ HÀNG</th>
                    <th>ĐƠN GIÁ</th>
                    <th>HÀNH ĐỘNG</th>
                    <th>Created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td></td>
                    <td class="category-type">{{ $product["loaihang"] }}</td>
                    <td class="category-name">{{ $product["tenhang"] }}</td>
                    <td class="category-id">{{ $product["mahang"]}}</td>
                    <td class="category-price">{{ product_price($product["dongia"]) }}</td>
                    <td class="product-action">
                        <span idcategory="{{ $product["id"] }}" class="action-edit"><i
                                class="feather icon-edit"></i></span>
                        <span idcategory="{{ $product["id"] }}" class="action-delete"><i
                                class="feather icon-trash"></i></span>
                    </td>
                    <td>{{ $product["created_at"] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- DataTable ends --}}

    {{-- add new sidebar starts --}}
    <div class="add-new-data-sidebar">
        <div class="overlay-bg"></div>
        <div class="add-new-data">
            <form action="data-list-view" method="POST">
                @csrf
                <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                    <div>
                        <h4 class="text-uppercase form-title">THÊM DANH MỤC MỚI</h4>
                    </div>
                    <div class="hide-data-sidebar">
                        <i class="feather icon-x"></i>
                    </div>
                </div>
                <div class="data-items pb-3">
                    <div class="data-fields px-2 mt-1">
                        <div class="row">
                            <div class="col-sm-12 data-field-col">
                                <label for="data-type">Loại hàng</label>
                                <fieldset class="form-group">
                                    <select class="form-control" name="loaihang" id="data-type">
                                        <option>Chọn một loại</option>
                                        <option>Hàng hóa thông thường</option>
                                        <option>Giấy tờ có giá</option>
                                        <option>Vàng</option>
                                    </select>
                                </fieldset>
                                {{-- <input type="text" class="form-control" name="loaihang" id="data-type"> --}}
                            </div>
                            <div class="col-sm-12 data-field-col">
                                <label for="data-name">Tên hàng</label>
                                <input type="text" class="form-control" name="tenhang" id="data-name">
                            </div>
                            <div class="col-sm-12 data-field-col">
                                <label for="data-code">Mã hàng</label>
                                <input type="text" class="form-control" name="mahang" id="data-code">
                                <span class="invalid-feedback" role="alert"></span>
                            </div>
                            <input hidden type="number" id="editId"/>
                            <div class="col-sm-12 data-field-col">
                                <label for="data-price">Đơn giá</label>
                                <input type="text" class="form-control" name="dongia" id="data-price">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                    <div class="add-data-btn">
                        <button type="button" id="buton-add" disabled class="btn btn-primary">Thêm</button>
                    </div>
                    <div class="cancel-data-btn">
                        <input type="reset" class="btn btn-outline-danger" value="Hủy">
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- add new sidebar ends --}}
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
@endsection
@section('page-script')
<script>
$(document).ready(function() {
    "use strict"

    let editElement;
    // init list view datatable
    var dataListView = $(".data-list-view").DataTable({
        responsive: false,
        select: {
            style: 'single'
        },
        aoColumnDefs: [{
                "bVisible": false,
                "aTargets": [6]
            },
            {
                orderable: true,
                aTargets: [0],
                checkboxes: {
                    selectRow: true
                }
            },
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
        select: {
            style: "multi"
        },
        order: [
            [6, "desc"]
        ],
        bInfo: false,
        pageLength: 10,
        buttons: [{
            text: "<i class='feather icon-plus'></i> Thêm mới",
            action: function() {
                $(this).removeClass("btn-secondary")
                $(".add-new-data").addClass("show")
                $(".overlay-bg").addClass("show")
                $("input[name='mahang']").val('');
                $("input[name='tenhang']").val('');
                $("input[name='dongia']").val('')
                $("#data-type").prop("selectedIndex", 0)
                $('#buton-add').attr('disabled', 'disabled')
                $("input[name='mahang']").removeClass('is-invalid');

                $('#buton-add').html("Thêm");
                $('.form-title').html('THÊM DANH MỤC MỚI');
            },
            className: "btn-outline-primary"
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


    // On Edit
    $(".data-list-view").delegate('.action-edit', "click", function(e) {
        e.stopPropagation();
        let self = $(this);
        var idcategory = self.attr('idcategory');
        $.ajax({
            type: 'POST',
            url: '{{ url('categoryinfo ') }}',
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
            data: {
                'iddanhmuc': idcategory,
            },
            dataType: 'json',
            success: function(data) {
                if (data.status) {
                    editElement = self.closest('tr');
                    $("input[name='mahang']").val(data.data.mahang);
                    $("input[name='tenhang']").val(data.data.tenhang);
                    $("input[name='dongia']").val(data.data.dongia);
                    $("#data-type").val(data.data.loaihang);
                    $('#buton-add').html("Lưu");
                    $('.form-title').html('SỬA DANH MỤC');
                    $('#editId').val(data.data.id);
                    $(".add-new-data").addClass("show");
                    $(".overlay-bg").addClass("show");

                } else {
                    $.toast(data.msg);
                }
            }
        });
    });

    // On Delete
    $(".data-list-view").delegate('.action-delete', "click", function(e) {
        let self = $(this);
        e.stopPropagation();
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Vâng, xóa nó!',
            cancelButtonText: 'Hủy',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function(result) {
            if (result.value) {
                var idcategory = self.attr('idcategory');
                $.ajax({
                    type: 'POST',
                    url: '{{ url('deletecategory') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                    },
                    data: {
                        'iddanhmuc': idcategory,
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status) {
                            self.closest('td').parent('tr').fadeOut();
                            $.toast(data.msg);
                        }
                    }
                });
            }
        })
    });

    // Close sidebar
    $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
        $(".add-new-data").removeClass("show")
        $(".overlay-bg").removeClass("show")
        $("input[name='mahang']").val();
        $("input[name='tenhang']").val();
        $("input[name='dongia']").val()
        $("#data-type").prop("selectedIndex", 0)
        $('#buton-add').attr('disabled', 'disabled')
    })


    $('input').keyup(function() {
        if ($("input[name='tenhang']").val() !== "" &&
            $("input[name='mahang']").val() !== "" &&
            $("input[name='dongia']").val() !== "" &&
            $("#data-type").find('option:selected').text() !== "Chọn một loại") {
            $('#buton-add').removeAttr('disabled')
        } else {
            $('#buton-add').attr('disabled', 'disabled')
        }
    })

    $('#buton-add').click(function() {

        if ($('#buton-add').text() == "Thêm") {

            // Thêm danh mục
            $.ajax({
                type: 'POST',
                url: '{{ url('addcategory') }}',
                headers: {
                    'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                },
                data: {
                    'madanhmuc': $("input[name='mahang']").val(),
                    'tenhang': $("input[name='tenhang']").val(),
                    'dongia': $("input[name='dongia']").val(),
                    'loaihang': $("#data-type").find('option:selected').text()
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        var newRow = dataListView.row.add([
                            null,
                            data.data.loaihang,
                            data.data.tenhang,
                            data.data.mahang,
                            data.data.dongia,
                            `<span idcategory="` + data.data.id + `" class="action-edit"><i class="feather icon-edit"></i></span>
                            <span idcategory="` + data.data.id + `" class="action-delete"><i class="feather icon-trash"></i></span>`,
                            data.data.created_at
                        ]).draw().node();

                        $(newRow)
                            .css('color', '#00861d')
                            .animate({
                                color: 'black'
                            })

                        $.toast(data.msg);
                        $("input[name='mahang']").val('');
                        $("input[name='tenhang']").val('');
                        $("input[name='dongia']").val('');
                        $("#data-type").prop("selectedIndex", 0);
                        $(".add-new-data").removeClass("show");
                        $(".overlay-bg").removeClass("show");
                        $("input[name='mahang']").removeClass('is-invalid');
                    } else {
                        $.toast(data.msg);
                        $("input[name='mahang']").addClass('is-invalid');
                        $('.invalid-feedback').html('<strong>' + data.msg + '</strong>');
                    }
                }
            });
        } else {
            //Sửa danh mục
            $.ajax({
                type: 'POST',
                url: '{{ url('editcategory') }}',
                headers: {
                    'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                },
                data: {
                    'iddanhmuc' : $("#editId").val(),
                    'madanhmuc': $("input[name='mahang']").val(),
                    'tenhang': $("input[name='tenhang']").val(),
                    'dongia': $("input[name='dongia']").val(),
                    'loaihang': $("#data-type").find('option:selected').text()
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        editElement[0].cells[1].textContent = data.data.loaihang;
                        editElement[0].cells[2].textContent = data.data.tenhang;
                        editElement[0].cells[3].textContent = data.data.mahang;
                        editElement[0].cells[4].textContent = data.data.dongia;
                        // var editRow = dataListView.fnUpdate([
                        //     null,
                        //     data.data.loaihang,
                        //     data.data.tenhang,
                        //     data.data.mahang,
                        //     data.data.dongia,
                        //     `<span idcategory="` + data.data.id + `" class="action-edit"><i class="feather icon-edit"></i></span>
                        //     <span idcategory="` + data.data.id + `" class="action-delete"><i class="feather icon-trash"></i></span>`
                        // ],editElement,undefined,false).draw().node();

                        // $(editRow)
                        // .css('color', '#009ec1')
                        // .animate({
                        //     color: 'black'
                        // })

                        $.toast(data.msg);
                        $("input[name='mahang']").val('');
                        $("input[name='tenhang']").val('');
                        $("input[name='dongia']").val('');
                        $("#data-type").prop("selectedIndex", 0);
                        $(".add-new-data").removeClass("show");
                        $(".overlay-bg").removeClass("show");
                        $("input[name='mahang']").removeClass('is-invalid');
                    } else {
                        $.toast(data.msg);
                        $("input[name='mahang']").addClass('is-invalid');
                        $('.invalid-feedback').html('<strong>' + data.msg + '</strong>');
                    }
                }
            });
        }

    })

    $("#data-type").change(function() {
        if ($("input[name='tenhang']").val() !== "" &&
            $("input[name='mahang']").val() !== "" &&
            $("input[name='dongia']").val() !== "" &&
            $("#data-type").find('option:selected').text() !== "Chọn một loại") {
            $('#buton-add').removeAttr('disabled')
        } else {
            $('#buton-add').attr('disabled', 'disabled')
        }
    })

});
</script>
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/ui/data-list-view.js')) }}"></script>
@endsection
