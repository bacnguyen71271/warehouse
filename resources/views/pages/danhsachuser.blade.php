@extends('layouts/contentLayoutMaster')

@section('title', 'Danh sách người dùng')

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
{{-- Data list view starts --}}
<section id="data-list-view" class="data-list-view-header">
    {{-- DataTable starts --}}
    <div class="table-responsive">
        <table class="table data-list-view">
            <thead>
                <tr>
                    <th>TÊN</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                    <th>NGÀY ĐĂNG KÝ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user["name"] }}</td>
                    <td><a href="{{ url('user') }}/{{ $user["email"] }}">{{ $user["email"] }}</a></td>
                    <td>
                        @if ($user["permission"] == -1)
                            <div class="chip chip-primary">
                                <div class="chip-body">
                                    <div class="chip-text">Not Authorized</div>
                                </div>
                            </div>
                        @endif

                        @if ($user["active"] == 0)
                            <div class="chip chip-danger">
                                <div class="chip-body">
                                    <div class="chip-text">Unconfimred</div>
                                </div>
                            </div>
                        @endif

                        @if ($user["active"] == 1 && $user["permission"] != -1)
                            <div class="chip chip-success">
                                <div class="chip-body">
                                    <div class="chip-text">Actived</div>
                                </div>
                            </div>
                        @endif


                        @if ($user["active"] == 1 && $user["permission"] == -2)
                            <div class="chip chip-danger">
                                <div class="chip-body">
                                    <div class="chip-text">Disabled</div>
                                </div>
                            </div>
                        @endif
                    </td>
                    <td>{{ $user["created_at"] }}</td>

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
            [3, "desc"]
        ],
        bInfo: false,
        pageLength: 10,
        buttons: [{
            text: "<i class='feather icon-plus'></i> Nhập kho",
            action: function() {
                $('#thh').val(-1).trigger('change.select2');
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