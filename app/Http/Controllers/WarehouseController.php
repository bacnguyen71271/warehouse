<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use function foo\func;

class WarehouseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function delivery(){

        //Lay thong tin user
        $user = DB::table('users')->where('id',Auth::id())->first();

        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        $wh_history = DB::table('warehouse_histories')
        ->join('danhmucs','warehouse_histories.danhmucId','=','danhmucs.id')
        ->join('warehouses','warehouse_histories.warehouseId','=','warehouses.id')
        ->leftJoin('delivery_history','warehouse_histories.id','delivery_history.orderid')
        ->leftJoin('users','users.id','delivery_history.userid')
        ->where('warehouse_histories.type',1)
        ->where('warehouse_histories.status',1)
        ->select('users.name','delivery_history.userid','delivery_history.orderid','danhmucs.loaihang','warehouses.tenkho','danhmucs.tenhang','danhmucs.mahang','danhmucs.dongia','warehouse_histories.tenchuongtrinh','delivery_history.status','warehouse_histories.soluong','warehouse_histories.warehouseId','warehouse_histories.created_at');

        if($user->permission != 0){

            //Kiểm tra quyền
            $wh_history->where(function($query){

                $permission = DB::table('permissions')
                    ->where('user_id',Auth::id())->get();

                $query->where('warehouses.id',-1);
                foreach ($permission as $key => $value){
                    $query->orWhere('warehouses.id',$value->warehouse_id);
                }
            });

        }

        $wh_history = $wh_history->get();

        return view('/pages/delivery', [
            'pageConfigs' => $pageConfigs,
            'deliverys' => json_decode(json_encode($wh_history), true),
        ]);
    }

    public function deliveryUpdate(Request $request){
        $madon = $request->input('madon');
        $trangthai = $request->input('trangthai');

        $order = DB::table('delivery_history')
        ->where('orderid',$madon)
        ->first();
        // print_r($order);
        if($order->userid == -1){
            DB::table('delivery_history')
            ->where('orderid',$madon)
            ->update([
                'status' => $trangthai + 1,
                'userid' => Auth::id()
            ]);
            return [
                'status' => true,
                'msg' => '',
                'data' => ''
            ];
        }else{
            if($order->userid == Auth::id()){
                DB::table('delivery_history')
                ->where('orderid',$madon)
                ->update([
                    'status' => $trangthai + 1
                ]);
            }else{
                return [
                    'status' => false,
                    'msg' => 'Đơn hàng này không phải bạn giao',
                    'data' => ''
                ];
            }
        }
    }

    public function xuatKhoIndex()
    {
        $user = DB::table('users')->where('id',Auth::id())->first();
        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        //type = 0 - Nhập
        //type = 1 - Xuất
        $wh_history = DB::table('warehouse_histories')
        ->join('danhmucs','warehouse_histories.danhmucId','=','danhmucs.id')
        ->join('warehouses','warehouse_histories.warehouseId','=','warehouses.id')
        ->where('warehouse_histories.type',1)
        ->select('danhmucs.loaihang','warehouses.tenkho','danhmucs.tenhang','danhmucs.mahang','danhmucs.dongia','warehouse_histories.tenchuongtrinh','warehouse_histories.status','warehouse_histories.soluong','warehouse_histories.id','warehouse_histories.hansudung','warehouse_histories.ghichu','warehouse_histories.created_at');


        $warehouses = DB::table('warehouses');
        if($user->permission != 0){
            //Lay danh sach kho theo quyen
            $warehouses->where(function ($query){
                $permission = DB::table('permissions')
                    ->where('user_id',Auth::id())->get();
                $query->where('id',-1);
                foreach ($permission as $key => $value){
                    if($value->permission != 'Delivery'){
                        $query->orWhere('id',$value->warehouse_id);
                    }
                }
            });


            //Kiểm tra quyền xem phieu xuat kho
            $wh_history->where(function($query){
                $permission = DB::table('permissions')
                    ->where('user_id',Auth::id())->get();

                $query->where('warehouses.id',-1);
                foreach ($permission as $key => $value){
                    $query->orWhere('warehouses.id',$value->warehouse_id);
                }
            });
        }

        $wh_history = $wh_history->get();

        $warehouses = $warehouses->get();
        $category = DB::table('danhmucs')->get();

        return view('/pages/xuatkho', [
            'pageConfigs' => $pageConfigs,
            'products' => json_decode(json_encode($wh_history), true),
            'warehouses' => json_decode(json_encode($warehouses), true),
            'categorys' => json_decode(json_encode($category), true)
        ]);
    }

    public function viewfile($id){
        return redirect('uploads/' . $id);
    }

    public function nhapKhoIndex()
    {
        $user = DB::table('users')->where('id',Auth::id())->first();
        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        //type = 0 - Nhập
        //type = 1 - Xuất
        $wh_history = DB::table('warehouse_histories')
        ->join('danhmucs','warehouse_histories.danhmucId','=','danhmucs.id')
        ->join('warehouses','warehouse_histories.warehouseId','=','warehouses.id')
        ->where('warehouse_histories.type',0)
        ->select('danhmucs.loaihang','danhmucs.tenhang','warehouses.tenkho','danhmucs.mahang','danhmucs.dongia','warehouse_histories.tenchuongtrinh','warehouse_histories.soluong','warehouse_histories.id','warehouse_histories.hansudung','warehouse_histories.ghichu','warehouse_histories.created_at');


        $warehouses = DB::table('warehouses');


        if($user->permission != 0){

            //Lay danh sach kho theo quyen
            $warehouses->where(function ($query){
                $permission = DB::table('permissions')
                    ->where('user_id',Auth::id())->get();
                $query->where('id',-1);
                foreach ($permission as $key => $value){
                    if($value->permission == 'Approved' || $value->permission == 'Administrator'){
                        $query->orWhere('id',$value->warehouse_id);
                    }
                }
            });

            //Kiểm tra quyền xem phieu xuat kho
            $wh_history->where(function($query){
                $permission = DB::table('permissions')
                    ->where('user_id',Auth::id())->get();
                $query->where('warehouses.id',-1);
                foreach ($permission as $key => $value){
                    if($value->permission == 'Approved' || $value->permission == 'Administrator') {
                        $query->orWhere('warehouses.id', $value->warehouse_id);
                    }
                }
            });
        }

        $wh_history = $wh_history->get();

        $warehouses = $warehouses->get();
        $category = DB::table('danhmucs')->get();

        return view('/pages/nhapkho', [
            'pageConfigs' => $pageConfigs,
            'products' => json_decode(json_encode($wh_history), true),
            'warehouses' => json_decode(json_encode($warehouses), true),
            'categorys' => json_decode(json_encode($category), true)
        ]);
    }

    public function gethangton(Request $request){
        $kho = $request->input('kho');
        $mahang = $request->input('mahang');

        $hangtrongkho = DB::table('warehouse_goods')
        ->where('warehouseid','=',$kho)
        ->where('danhmucid','=',$mahang)
        ->first();

        if($hangtrongkho){
            return [
                'status' => true,
                'msg' => '',
                'data' => $hangtrongkho->soluong
            ];
        }else{
            return [
                'status' => true,
                'msg' => '',
                'data' => 0
            ];
        }

    }

    public function nhapkho(Request $request)
    {
        //Input
        $kho = $request->input('kho');
        $tenchuongtrinh = $request->input('tenchuongtrinh');
        $mahang = $request->input('mahang');
        $soluong = $request->input('soluong');
        $ngaynhap = $request->input('ngaynhap');
        $hansudung = $request->input('hansudung');
        $ghichu = $request->input('ghichu');

        //
        $wh_history_id = DB::table('warehouse_histories')->insertGetId([
            'type'=> 0,
            'warehouseId' => $kho,
            'tenchuongtrinh'=> $tenchuongtrinh,
            'userid' => Auth::id(),
            'danhmucId' => $mahang,
            'soluong' => $soluong,
            'hansudung' => $hansudung,
            'ghichu' => $ghichu,
            'thoigian' => $ngaynhap,
        ]);


        $quantity_old = 0;
        //Kiểm tra hàng này đã được tạo chưa
        $warehouse_goods = DB::table('warehouse_goods')
        ->where('warehouseid','=',$kho)
        ->where('danhmucid','=',$mahang)
        ->first();

        if(!$warehouse_goods){
            DB::table('warehouse_goods')->insert([
                'warehouseid' => $kho,
                'danhmucid' => $mahang,
                'soluong' => 0
            ]);
        }else{
            $quantity_old = $warehouse_goods->soluong;
        }

        //Cập nhật số lượng trong kho
        DB::table('warehouse_goods')
        ->where('warehouseid','=',$kho)
        ->where('danhmucid','=',$mahang)
        ->update([ 'soluong' => $quantity_old + $soluong]);


        $wh_history_temp = DB::table('warehouse_histories')
        ->join('danhmucs','warehouse_histories.danhmucId','danhmucs.id')
        ->join('warehouses','warehouse_histories.warehouseId','=','warehouses.id')
        ->where('warehouse_histories.id',$wh_history_id)
        ->select('warehouses.tenkho','warehouse_histories.tenchuongtrinh','danhmucs.tenhang','danhmucs.dongia','warehouse_histories.soluong','warehouse_histories.hansudung','warehouse_histories.created_at','warehouse_histories.id')
        ->first();

        StaticController::LogHistory('Nhập kho',Auth::id(),$wh_history_temp->id);

        return [
            'status' => true,
            'msg' => 'Nhập kho thành công',
            'data' => $wh_history_temp
        ];
    }

    public function createFileData(Request $request)
    {
        DB::table('files')->insert([
            'name_old' => $request->nameold,
            'filename' => $request->filename,
            'id_order' => $request->idorder
        ]);

        return [
            'status' => true,
            'msg' => 'Tạo file thành công',
            'data' => ''
        ];
    }

    public function xuatkho(Request $request)
    {
        //Input
        $kho = $request->input('kho');
        $tenchuongtrinh = $request->input('tenchuongtrinh');
        $mahang = $request->input('mahang');
        $soluong = $request->input('soluong');
        $ngayxuat = $request->input('ngayxuat');
        $ghichu = $request->input('ghichu');

        //Check số lượng

        $soluongtrongkho  = DB::table('warehouse_goods')
        ->where('warehouseid', $kho)
        ->where('danhmucid', $mahang)
        ->first();

        if($soluong && $soluongtrongkho->soluong >= $soluong){
            $wh_history_id = DB::table('warehouse_histories')->insertGetId([
                'type'=> 1,
                'warehouseId' => $kho,
                'tenchuongtrinh'=> $tenchuongtrinh,
                'userid' => Auth::id(),
                'danhmucId' => $mahang,
                'soluong' => $soluong,
                'ghichu' => $ghichu,
                'status' => false,
                'thoigian' => $ngayxuat,
            ]);

            $wh_history_temp = DB::table('warehouse_histories')
            ->join('danhmucs','warehouse_histories.danhmucId','danhmucs.id')
            ->join('warehouses','warehouse_histories.warehouseId','=','warehouses.id')
            ->where('warehouse_histories.id',$wh_history_id)
            ->select('warehouses.tenkho','warehouse_histories.tenchuongtrinh','danhmucs.tenhang','danhmucs.dongia','warehouse_histories.soluong','warehouse_histories.hansudung','warehouse_histories.created_at','warehouse_histories.id')
            ->first();

            StaticController::LogHistory('Xuất kho',Auth::id(),$wh_history_temp->id);

            return [
                'status' => true,
                'msg' => 'Tạo phiếu order thành công',
                'data' => $wh_history_temp
            ];
        }else{
            return [
                'status' => false,
                'msg' => 'Số lượng hàng xuất nhiều hơn hàng trong kho, vui lòng thử lại với số lượng ít hơn',
                'data' => ''
            ];
        }
    }

    public function comfirmXuatKho(Request $request)
    {
        $idorder = $request->input('id_order');

        $order = DB::table('warehouse_histories')
        ->where('id',$idorder)->first();

        if($order){
            DB::table('warehouse_histories')
            ->where('id',$idorder)->update([
                'status' => true
            ]);


            $slHienTai = DB::table('warehouse_goods')
            ->where('warehouseid',$order->warehouseId)
            ->where('danhmucid',$order->danhmucId)
            ->first();


            //Cap nhat so luong kho
            $soluong = $slHienTai->soluong - $order->soluong;
            DB::table('warehouse_goods')
            ->where('warehouseid',$order->warehouseId)
            ->where('danhmucid',$order->danhmucId)
            ->update([
                'soluong' => $soluong
            ]);

            StaticController::LogHistory('Xác nhận đơn hàng',Auth::id(),$idorder);

            return [
                'status' => true,
                'msg' => 'Xác nhận thành công',
                'data' => ''
            ];
        }else{
            return [
                'status' => false,
                'msg' => 'Không tìm thấy phiếu xuất',
                'data' => ''
            ];
        }

    }

    public function chitietnhapkho($id)
    {
        $wh_history_temp = DB::table('warehouse_histories')
        ->join('danhmucs','warehouse_histories.danhmucId','danhmucs.id')
        ->join('users','warehouse_histories.userid','users.id')
        ->where('warehouse_histories.id',$id)
        ->select('warehouse_histories.tenchuongtrinh','warehouse_histories.thoigian','warehouse_histories.ghichu','danhmucs.tenhang','danhmucs.mahang','danhmucs.dongia','warehouse_histories.soluong','warehouse_histories.hansudung','warehouse_histories.created_at','warehouse_histories.id','users.email','users.name')
        ->first();

        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        return view('/pages/lichsunhap', [
            'pageConfigs' => $pageConfigs,
            // 'products' => json_decode(json_encode($wh_history), true),
            'whhistorytemp' => (array)$wh_history_temp
        ]);
    }

    public function luuphieuxuat(Request $request, $id){
        $kho = $request->input('kho');
        $tenchuongtrinh = $request->input('tenchuongtrinh');
        $mahang = $request->input('mahang');
        $soluong = $request->input('soluong');
        $ngayxuat = $request->input('ngayxuat');

        //check trang thai
        $phieuxuat = DB::table('warehouse_histories')
        ->where('id',$id)->first();

        if($phieuxuat->status != 0){
            return [
                'status' => true,
                'msg' => '',
                'data' => ''
            ];
        }

        $warehouse_goods = DB::table('warehouse_goods')
        ->where('warehouseid','=',$kho)
        ->where('danhmucid','=',$mahang)
        ->first();

        if($warehouse_goods && $warehouse_goods->soluong >= $soluong){
            DB::table('warehouse_histories')
            ->where('id',$id)
            ->update([
                'tenchuongtrinh' => $tenchuongtrinh,
                'warehouseId' => $kho,
                'danhmucId' => $mahang,
                'soluong' => $soluong,
                'thoigian' => $ngayxuat
            ]);
            return [
                'status' => true,
                'msg' => '',
                'data' => ''
            ];
        }else{
            return [
                'status' => false,
                'msg' => 'Số lượng không phù hợp',
                'data' => ''
            ];
        }
    }

    public function suaphieuxuat($id)
    {
        $wh_history_temp = DB::table('warehouse_histories')
        ->join('danhmucs','warehouse_histories.danhmucId','danhmucs.id')
        ->join('users','warehouse_histories.userid','users.id')
        ->join('warehouses','warehouse_histories.warehouseId','=','warehouses.id')
        ->where('warehouse_histories.id',$id)
        ->select('warehouses.tenkho','warehouse_histories.warehouseId','warehouse_histories.danhmucId','warehouse_histories.tenchuongtrinh','warehouse_histories.status','warehouse_histories.thoigian','warehouse_histories.ghichu','danhmucs.tenhang','danhmucs.mahang','danhmucs.dongia','warehouse_histories.soluong','warehouse_histories.hansudung','warehouse_histories.created_at','warehouse_histories.id','users.email','users.name')
        ->first();

        $attachFile = DB::table('files')->where('id_order',(array)$wh_history_temp->id)->get();

        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        $warehouses = DB::table('warehouses')->get();

        $category = DB::table('danhmucs')->get();

        return view('/pages/suaphieuxuat', [
            'pageConfigs' => $pageConfigs,
            'files' => json_decode(json_encode($attachFile), true),
            'whhistorytemp' => (array)$wh_history_temp,
            'warehouses' => json_decode(json_encode($warehouses), true),
            'categorys' => json_decode(json_encode($category), true)
        ]);
    }

    public function chitietxuatkho($id)
    {
        $wh_history_temp = DB::table('warehouse_histories')
        ->join('danhmucs','warehouse_histories.danhmucId','danhmucs.id')
        ->join('users','warehouse_histories.userid','users.id')
        ->join('warehouses','warehouses.id','warehouse_histories.warehouseId')
        ->where('warehouse_histories.id',$id)
        ->select('warehouse_histories.warehouseId','warehouses.tenkho','warehouse_histories.tenchuongtrinh','warehouse_histories.status','warehouse_histories.thoigian','warehouse_histories.ghichu','danhmucs.tenhang','danhmucs.mahang','danhmucs.dongia','warehouse_histories.soluong','warehouse_histories.hansudung','warehouse_histories.created_at','warehouse_histories.id','users.email','users.name')
        ->first();

        $attachFile = DB::table('files')->where('id_order',(array)$wh_history_temp->id)->get();

        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        return view('/pages/lichsuxuat', [
            'pageConfigs' => $pageConfigs,
            'files' => json_decode(json_encode($attachFile), true),
            'whhistorytemp' => (array)$wh_history_temp
        ]);
    }

    public function hangtrongkho(Request $request)
    {
        $hangtrongkho = DB::table('warehouse_goods')
        ->join('danhmucs','warehouse_goods.danhmucid','=','danhmucs.id')
        ->join('warehouses','warehouse_goods.warehouseid','=','warehouses.id')
        ->select('danhmucs.tenhang','danhmucs.mahang','warehouses.tenkho','warehouse_goods.soluong')
        ->get();

        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        return view('/pages/hangtrongkho', [
            'pageConfigs' => $pageConfigs,
            'hangtrongkhos' => json_decode(json_encode($hangtrongkho),true)
        ]);
    }

    public function themkho(Request $request)
    {
        $tenkho = $request->input('tenkho');
        $idkho = DB::table('warehouses')->insertGetId([
            'tenkho' => $tenkho
        ]);
        return [
            'status' => true,
            'msg' => 'Đã thêm thành công kho mới',
            'data' => $idkho
        ];
    }

    public function danhsachkho(Request $request)
    {
        $warehouses = DB::table('warehouses')->get();

        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        $user = DB::table('users')->where('id',Auth::id())->first();

        return view('/pages/danhsachkho', [
            'pageConfigs' => $pageConfigs,
            'warehouses' => json_decode(json_encode($warehouses), true),
            'users' => $user
        ]);
    }
}
