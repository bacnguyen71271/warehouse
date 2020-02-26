<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function xuatKhoIndex()
    {
        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        //type = 0 - Nhập
        //type = 1 - Xuất
        $wh_history = DB::table('warehouse_histories')
        ->join('danhmucs','warehouse_histories.danhmucId','=','danhmucs.id')
        ->where('warehouse_histories.type',1)
        ->select('danhmucs.loaihang','danhmucs.tenhang','danhmucs.mahang','danhmucs.dongia','warehouse_histories.tenchuongtrinh','warehouse_histories.status','warehouse_histories.soluong','warehouse_histories.id','warehouse_histories.hansudung','warehouse_histories.ghichu','warehouse_histories.created_at')
        ->get();

        $category = DB::table('danhmucs')->get();

        return view('/pages/xuatkho', [
            'pageConfigs' => $pageConfigs,
            'products' => json_decode(json_encode($wh_history), true),
            'categorys' => json_decode(json_encode($category), true)
        ]);
    }

    public function nhapKhoIndex()
    {
        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        //type = 0 - Nhập
        //type = 1 - Xuất
        $wh_history = DB::table('warehouse_histories')
        ->join('danhmucs','warehouse_histories.danhmucId','=','danhmucs.id')
        ->where('warehouse_histories.type',0)
        ->select('danhmucs.loaihang','danhmucs.tenhang','danhmucs.mahang','danhmucs.dongia','warehouse_histories.tenchuongtrinh','warehouse_histories.soluong','warehouse_histories.id','warehouse_histories.hansudung','warehouse_histories.ghichu','warehouse_histories.created_at')
        ->get();

        $category = DB::table('danhmucs')->get();

        return view('/pages/nhapkho', [
            'pageConfigs' => $pageConfigs,
            'products' => json_decode(json_encode($wh_history), true),
            'categorys' => json_decode(json_encode($category), true)
        ]);
    }

    public function nhapkho(Request $request)
    {
        //Input
        $tenchuongtrinh = $request->input('tenchuongtrinh');
        $mahang = $request->input('mahang');
        $soluong = $request->input('soluong');
        $ngaynhap = $request->input('ngaynhap');
        $hansudung = $request->input('hansudung');
        $ghichu = $request->input('ghichu');

        //
        $wh_history_id = DB::table('warehouse_histories')->insertGetId([
            'type'=> 0,
            'warehouseId' => 0,
            'tenchuongtrinh'=> $tenchuongtrinh,
            'userid' => Auth::id(),
            'danhmucId' => $mahang,
            'soluong' => $soluong,
            'hansudung' => $hansudung,
            'ghichu' => $ghichu,
            'thoigian' => $ngaynhap,
        ]);

        $wh_history_temp = DB::table('warehouse_histories')
        ->join('danhmucs','warehouse_histories.danhmucId','danhmucs.id')
        ->where('warehouse_histories.id',$wh_history_id)
        ->select('warehouse_histories.tenchuongtrinh','danhmucs.tenhang','danhmucs.dongia','warehouse_histories.soluong','warehouse_histories.hansudung','warehouse_histories.created_at','warehouse_histories.id')
        ->first();
        
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
        $tenchuongtrinh = $request->input('tenchuongtrinh');
        $mahang = $request->input('mahang');
        $soluong = $request->input('soluong');
        $ngayxuat = $request->input('ngayxuat');
        $ghichu = $request->input('ghichu');

        //
        $wh_history_id = DB::table('warehouse_histories')->insertGetId([
            'type'=> 1,
            'warehouseId' => 0,
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
        ->where('warehouse_histories.id',$wh_history_id)
        ->select('warehouse_histories.tenchuongtrinh','danhmucs.tenhang','danhmucs.dongia','warehouse_histories.soluong','warehouse_histories.hansudung','warehouse_histories.created_at','warehouse_histories.id')
        ->first();
        
        return [
            'status' => true,
            'msg' => 'Tạo phiếu order thành công',
            'data' => $wh_history_temp
        ];
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


    public function chitietxuatkho($id)
    {
        $wh_history_temp = DB::table('warehouse_histories')
        ->join('danhmucs','warehouse_histories.danhmucId','danhmucs.id')
        ->join('users','warehouse_histories.userid','users.id')
        ->where('warehouse_histories.id',$id)
        ->select('warehouse_histories.tenchuongtrinh','warehouse_histories.status','warehouse_histories.thoigian','warehouse_histories.ghichu','danhmucs.tenhang','danhmucs.mahang','danhmucs.dongia','warehouse_histories.soluong','warehouse_histories.hansudung','warehouse_histories.created_at','warehouse_histories.id','users.email','users.name')
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
        $hangnhap = DB::table('warehouse_histories');

        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];
        // return view('/pages/lichsuxuat', [
        //     'pageConfigs' => $pageConfigs,
        //     'files' => json_decode(json_encode($attachFile), true),
        //     'whhistorytemp' => (array)$wh_history_temp
        // ]);
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

        return view('/pages/danhsachkho', [
            'pageConfigs' => $pageConfigs,
            'warehouses' => json_decode(json_encode($warehouses), true),
        ]);
    }
}
