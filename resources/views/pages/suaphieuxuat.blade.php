@extends('layouts/contentLayoutMaster')

@section('title', 'Chi tiết xuất kho')

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
    $decimal_place = 3;
    $price = number_format($priceFloat, $decimal_place, '.', $symbol_thousand);
    return $price.$symbol;
}
@endphp
<section class="lich-su-nhap">
    <div class="row">
        <div class="col-md-12 col-12 ">
            <div class="card">
            <div class="card-header">
              <div class="card-title mb-2">Sửa phiếu xuất</div>
              @if($whhistorytemp["status"] == 0)
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li><button class="btn mb-1 btn-primary waves-effect waves-light btn-xacnhan" >Lưu thay đổi</button></li>
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
                            <button type="button" order_id="{{ $whhistorytemp["id"] }}" class="btn-approved btn btn-sm btn-outline-success waves-effect waves-light">-> Approved</button>
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
                                <input value="{{ $whhistorytemp['tenchuongtrinh'] }}" type="text" class="form-control" id="tenchuongtrinh">
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
                                        <option @if($whhistorytemp['danhmucId'] == $category['id']) selected @endif value="{{ $category['id'] }}">{{ $category['tenhang'] }}</option>
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
                                    <input value="{{ $whhistorytemp['soluong'] }}" type="number" class="form-control">
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
                    <td class="font-weight-bold">Kho xuất</td>
                    <td>
                      <div class="col-lg-6 col-sm-12 data-field-col pl-0">
                                <fieldset class="form-group tenhanghoa mb-0">
                                    <select class="select2 form-control" id="kho">
                                        <option value="-1">Chọn kho xuất</option>
                                        @foreach ($warehouses as $warehouse)
                                        <option @if($whhistorytemp['warehouseId'] == $warehouse['id']) selected @endif value="{{ $warehouse['id'] }}">{{ $warehouse['tenkho'] }}</option>
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
                                    <input value="{{ $whhistorytemp['thoigian'] }}" type='text' value="{{ date("Y-m-d") }}"
                                        class="form-control pickadate-months-year" />
                                    <span class="invalid-feedback" role="alert"></span>
                                </fieldset>
                            </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">Người nhập</td>
                    <td><a href="{{ url('user')}}/{{ $whhistorytemp['email'] }}"> {{ $whhistorytemp['name'] }} - {{ $whhistorytemp['email'] }}</a></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold">File đính kèm</td>
                    <td>
                        @foreach ($files as $file)
                        <a target="_blank" class="attackfile" href="{{ url('uploads')}}/{{ $file['filename'] }}"><div class="badge badge-success mr-1 mb-1">
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
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>

<script>


checkhangton();
    $('#kho').change(function(){
        if($('#thh').val() != -1){
                checkhangton();
            }
    })

  $('#thh').change(function(){
        if($('#thh').val() == -1){
            $('fieldset.mahanghoa>input').val('');
            $('fieldset.dongia>input').val('');
            $('fieldset.giatri>input').val('');
        }else{

            if($('#kho').val() != -1){
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
                success: function(data) {
                    if(data.status){
                        $('fieldset.mahanghoa>input').val(data.data.mahang);
                        $('fieldset.dongia>input').val(number_format(data.data.dongia,3,'.',','));
                        if($('fieldset.soluong>input').val() != '' || $('fieldset.soluong>input').val() <= 0 ){
                            var giatri = data.data.dongia * parseInt($('fieldset.soluong>input').val());
                            giatri = giatri.toString().substring(0,giatri.toString().length - 3) + '.' + giatri.toString().substring(giatri.toString().length - 3, giatri.toString().length);
                            $('fieldset.giatri>input').val(number_format(giatri,3,'.',','));
                        }else{
                            $('fieldset.giatri>input').val('');
                        }
                    }
                }
            });
        }
        
    })

    $(".btn-xacnhan").click(function(e){
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
                $('fieldset.ngaynhapkho>span').html('Hãy nhập ngày xuất kho');
                $('fieldset.ngaynhapkho>input').addClass('is-invalid');
            }else{
                $('fieldset.ngaynhapkho>input').removeClass('is-invalid');
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
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                        type: 'POST',
                        url: "{{ url('xuatkho/suaphieu') }}/{{ $whhistorytemp['id'] }}",
                        headers: {
                            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                        },
                        data: {
                            'mahang': $('#thh').val(),
                            'kho' : $('#kho').val(),
                            'tenchuongtrinh' : $('fieldset.tenchuongtrinh>input').val(),
                            'soluong' : $('fieldset.soluong>input').val(),
                            'ngayxuat' : $('fieldset.ngaynhapkho>input').val(),
                            'ghichu' : $('#basicTextarea').val()
                        },
                        dataType: 'json',
                        success: function(data) {
                            if(data.status){
                                window.location="{{ url('/xuatkho') }}/{{ $whhistorytemp['id'] }}";
                            }else{
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
    

    $('fieldset.soluong>input').keyup(function(){
        if($('fieldset.soluong>input').val() != '' || 
        $('fieldset.soluong>input').val() <= 0 && 
        $('fieldset.dongia>input').val() != ''){
            $('fieldset.soluong>input').val( )

            if($('fieldset.soluong>input').val() > soluongtronkho){
                $('fieldset.soluong>input').val(soluongtronkho);
            }

            var dongia = $('fieldset.dongia>input').val().match(/\d/g);
            dongia = dongia.join("");
            var giatri = dongia * parseInt($('fieldset.soluong>input').val());
            $('fieldset.giatri>input').val(number_format(giatri,3,'.',','));
        }else{
            $('fieldset.giatri>input').val('');
        }
    });
  
  function checkhangton(){
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
                    'mahang' : idhang
                },
            dataType: 'json',
            success: function(data) {
                if(data.status){
                    soluongtronkho = data.data;
                    $('.soluongtrongkho p').html(data.data)
                }
            }
        });
    }

  $('.btn-approved').click(function(){
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
            }).then(function(result) {
                if (result.value) {
                  $.ajax({
                    type: "POST",
                    url: "{{ url('/comfirm-xuatkho')}}",
                    headers: {
                        'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                    },
                    data: {
                      'id_order' : $('.btn-approved').attr('order_id')
                    },
                    dataType: 'json',
                    success: function(data) {
                      $.toast(data.msg);
                      var delay = 1000; 
                      setTimeout(function(){ location.reload(); }, delay);
                    }
                  })
                }
            });
  })
</script>

@endsection
