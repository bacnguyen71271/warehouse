@extends('layouts/contentLayoutMaster')

@section('title', 'Danh sách kho')

@section('vendor-style')
{{-- Vendor Css files --}}
@endsection
@section('page-style')
{{-- Page Css files --}}
@endsection
@section('content')
<!-- Analytics card section start -->
<section id="analytics-card">
    <div class="modal fade text-left modal-background" id="backdrop" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel4">Tạo kho mới</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-modal">
                <div class="row">
                    <div class="col-sm-12 col-xl-12 data-field-col">
                        <fieldset class="form-group tenkho">
                            <label for="tenkho">Tên kho <code>(*)</code></label>
                            <input type="text" class="form-control">
                            <span class="invalid-feedback" role="alert"></span>
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
    <div class="row danhsachkho">
        <div class="col-lg-4 col-12">
            <div class="card btn btn-themkho">
                <div class="card-content">
                    <div class="card-body">
                        <div class="mx-auto" style="height: 96px;align-items : center;justify-content: center;">
                            <i class="feather icon-plus text-primary font-large-2"></i>
                            <h5 class="mt-1 font-weight-bold">Thêm kho</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($warehouses as $warehouse)
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h4>{{ $warehouse['tenkho'] }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body pt-80">
                            <div class="chart-info d-flex justify-content-between mb-1">
                                <div class="series-info d-flex align-items-center">
                                    <i class="feather icon-layers font-medium-2 text-primary"></i>
                                    <span class="text-bold-600 mx-50">Hàng trong kho</span>
                                    <span> - 
                                        <div class="badge badge badge-primary badge-pill">
                                            @php
                                                 echo App\Http\Controllers\StaticController::getWarehouseInfo($warehouse['id'])["hangtrongkho"];
                                            @endphp
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <div class="chart-info d-flex justify-content-between mb-1">
                                <div class="series-info d-flex align-items-center">
                                    <i class="feather icon-info font-medium-2 text-warning"></i>
                                    <span class="text-bold-600 mx-50">Sắp hết hạn</span>
                                    <span> - <div class="badge badge badge-warning badge-pill">0</div></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        
    </div>
</section>
<!-- Analytics Card section end-->
@endsection
@section('vendor-script')

@endsection
@section('page-script')

<script>
    $('.btn-themkho').click(function(){
        $('.tenkho>input').val('');
        $('.tenkho>input').removeClass('is-invalid');
        $('.modal').modal('show');
    });

    $('#btn-xacnhan').click(function(){
        if($('.tenkho>input').val() == ''){
            $('.tenkho>span').html('Hãy nhập tên kho')
            $('.tenkho>input').addClass('is-invalid');
        }else{
            Swal.fire({
                title: 'Bạn muốn thêm kho này ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng !',
                cancelButtonText: 'Hủy',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('themkho') }}",
                        headers: {
                            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                        },
                        data: {
                            'tenkho' : $('.tenkho>input').val() 
                        },
                        dataType: 'json',
                        success: function(data){
                            if(data.status){
                                let html = `<div class="col-lg-4 col-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-end">
                                            <h4>`+ $('.tenkho>input').val() +`</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pt-80">
                                                <div class="chart-info d-flex justify-content-between mb-1">
                                                    <div class="series-info d-flex align-items-center">
                                                        <i class="feather icon-layers font-medium-2 text-primary"></i>
                                                        <span class="text-bold-600 mx-50">Hàng trong kho</span>
                                                        <span> - <div class="badge badge badge-primary badge-pill">0</div></span>
                                                    </div>
                                                </div>
                                                <div class="chart-info d-flex justify-content-between mb-1">
                                                    <div class="series-info d-flex align-items-center">
                                                        <i class="feather icon-info font-medium-2 text-warning"></i>
                                                        <span class="text-bold-600 mx-50">Sắp hết hạn</span>
                                                        <span> - <div class="badge badge badge-warning badge-pill">0</div></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
                                $('div.danhsachkho').append(html);
                                $('.modal').modal('hide');
                                $('.tenkho>input').val('');
                                $.toast(data.msg);
                            }
                        }
                    });
                }
            });
        }
    });

</script>
{{-- Page js files --}}
@endsection