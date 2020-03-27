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