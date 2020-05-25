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

    public function getDetailById(Request $request)
    {
        $id = $request->input('id');

        $data = DB::table('donxuats')
            ->join('danhmucs', 'donxuats.danhmucId', 'danhmucs.id')
            ->where('donxuats.id_history', $id)
            ->get();
        return [
            'status' => true,
            'msg' => '',
            'data' => $data
        ];
    }

    public function delivery(Request $request)
    {
        $query = $request->all();
        //Lay thong tin user
        $user = DB::table('users')->where('id', Auth::id())->first();

        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        $wh_history = DB::table('warehouse_histories')
            ->join('donxuats', 'warehouse_histories.id', '=', 'donxuats.id_history')
            ->join('danhmucs', 'donxuats.danhmucId', '=', 'danhmucs.id')
            ->join('warehouses', 'warehouse_histories.warehouseId', '=', 'warehouses.id')
            ->leftJoin('delivery_history', 'warehouse_histories.id', 'delivery_history.orderid')
            ->leftJoin('users', 'users.id', 'delivery_history.userid')
            ->where('warehouse_histories.type', 1)
            ->where('warehouse_histories.status', 1)
            ->select(DB::raw('sum(`donxuats`.`soluong`) as `soluong`'), DB::raw('sum(`donxuats`.`soluong` * `danhmucs`.`dongia`) as `dongia`'), 'warehouse_histories.id', 'warehouse_histories.warehouseId', 'warehouse_histories.tenchuongtrinh', 'warehouse_histories.status', 'warehouse_histories.id', 'warehouse_histories.hansudung', 'warehouse_histories.ghichu', 'warehouse_histories.created_at')
            ->groupBy('warehouse_histories.id', 'delivery_history.orderid');

        if (array_key_exists('id', $query)) {
            $wh_history->where('warehouse_histories.id', $query['id']);
        }

        if (array_key_exists('from', $query) && $query['from'] != '') {
            $wh_history->where('warehouse_histories.created_at', ">=", $query['from']);
        }

        if (array_key_exists('to', $query) && $query['to'] != '') {
            $wh_history->where('warehouse_histories.created_at', "<=", $query['to']);
        }

        if (array_key_exists('title', $query) && $query['title'] != '') {
            $wh_history->where('warehouse_histories.tenchuongtrinh', "LIKE", "%{$query['title']}%");
        }

        if (array_key_exists('status', $query) && $query['status'] != '') {
            $wh_history->where('delivery_history.status', $query['status']);
        }

//        echo $wh_history->toSql();die;
        $wh_history = $wh_history->get();

        return view('/pages/delivery', [
            'pageConfigs' => $pageConfigs,
            'deliverys' => json_decode(json_encode($wh_history), true),
            'query' => $query
        ]);
    }

    public function deliveryUpdate(Request $request)
    {
        $madon = $request->input('madon');
        $trangthai = $request->input('trangthai');

        $order = DB::table('delivery_history')
            ->where('orderid', $madon)
            ->first();
        // print_r($order);
        if ($order->userid == -1) {
            StaticController::LogHistory('Nhận giao đơn hàng', Auth::id(), $madon);
            DB::table('delivery_history')
                ->where('orderid', $madon)
                ->update([
                    'status' => $trangthai + 1,
                    'userid' => Auth::id()
                ]);
            return [
                'status' => true,
                'msg' => '',
                'data' => ''
            ];
        } else {
            if ($order->userid == Auth::id()) {
                StaticController::LogHistory('Hoàn tất giao hàng', Auth::id(), $madon);
                DB::table('delivery_history')
                    ->where('orderid', $madon)
                    ->update([
                        'status' => $trangthai + 1
                    ]);
                return [
                    'status' => true,
                    'msg' => 'Thành công',
                    'data' => ''
                ];
            } else {
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
        $user = DB::table('users')->where('id', Auth::id())->first();
        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        //type = 0 - Nhập
        //type = 1 - Xuất
        $wh_history = DB::table('warehouse_histories')
            ->join('donxuats', 'warehouse_histories.id', '=', 'donxuats.id_history')
            ->join('danhmucs', 'donxuats.danhmucId', '=', 'danhmucs.id')
            ->join('warehouses', 'warehouse_histories.warehouseId', '=', 'warehouses.id')
            ->where('warehouse_histories.type', 1)
            ->select(DB::raw('sum(`donxuats`.`soluong`) as `soluong`'), DB::raw('sum(`donxuats`.`soluong` * `danhmucs`.`dongia`) as `dongia`'), 'warehouse_histories.tenchuongtrinh', 'warehouse_histories.status', 'warehouse_histories.id', 'warehouse_histories.hansudung', 'warehouse_histories.ghichu', 'warehouse_histories.created_at')
            ->groupBy('warehouse_histories.id');

        $warehouses = DB::table('warehouses');
        if ($user->permission != 0) {
            //Lay danh sach kho theo quyen
            $warehouses->where(function ($query) {
                $permission = DB::table('permissions')
                    ->where('user_id', Auth::id())->get();
                $query->where('id', -1);
                foreach ($permission as $key => $value) {
                    if ($value->permission != 'Delivery') {
                        $query->orWhere('id', $value->warehouse_id);
                    }
                }
            });


            //Kiểm tra quyền xem phieu xuat kho
            $wh_history->where(function ($query) {
                $permission = DB::table('permissions')
                    ->where('user_id', Auth::id())->get();

                $query->where('warehouses.id', -1);
                foreach ($permission as $key => $value) {
                    $query->orWhere('warehouses.id', $value->warehouse_id);
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

    public function viewfile($id)
    {
        return redirect('uploads/' . $id);
    }

    public function nhapKhoIndex()
    {
        $user = DB::table('users')->where('id', Auth::id())->first();
        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        //type = 0 - Nhập
        //type = 1 - Xuất
        $wh_history = DB::table('warehouse_histories')
            ->join('danhmucs', 'warehouse_histories.danhmucId', '=', 'danhmucs.id')
            ->join('warehouses', 'warehouse_histories.warehouseId', '=', 'warehouses.id')
            ->where('warehouse_histories.type', 0)
            ->select('danhmucs.loaihang', 'danhmucs.tenhang', 'warehouses.tenkho', 'danhmucs.mahang', 'danhmucs.dongia', 'warehouse_histories.tenchuongtrinh', 'warehouse_histories.soluong', 'warehouse_histories.id', 'warehouse_histories.hansudung', 'warehouse_histories.ghichu', 'warehouse_histories.created_at');


        $warehouses = DB::table('warehouses');


        if ($user->permission != 0) {

            //Lay danh sach kho theo quyen
            $warehouses->where(function ($query) {
                $permission = DB::table('permissions')
                    ->where('user_id', Auth::id())->get();
                $query->where('id', -1);
                foreach ($permission as $key => $value) {
                    if ($value->permission == 'Approved' || $value->permission == 'Administrator') {
                        $query->orWhere('id', $value->warehouse_id);
                    }
                }
            });

            //Kiểm tra quyền xem phieu xuat kho
            $wh_history->where(function ($query) {
                $permission = DB::table('permissions')
                    ->where('user_id', Auth::id())->get();
                $query->where('warehouses.id', -1);
                foreach ($permission as $key => $value) {
                    if ($value->permission == 'Approved' || $value->permission == 'Administrator') {
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

    public function gethangton(Request $request)
    {
        $kho = $request->input('kho');
        $mahang = $request->input('mahang');

        $hangtrongkho = StaticController::hangTon($kho, $mahang);

        if ($hangtrongkho) {
            return [
                'status' => true,
                'msg' => '',
                'data' => $hangtrongkho
            ];
        } else {
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
            'type' => 0,
            'warehouseId' => $kho,
            'tenchuongtrinh' => $tenchuongtrinh,
            'userid' => Auth::id(),
            'danhmucId' => $mahang,
            'soluong' => $soluong,
            'hansudung' => $hansudung,
            'ghichu' => $ghichu,
            'thoigian' => $ngaynhap,
        ]);


        $wh_history_temp = DB::table('warehouse_histories')
            ->join('danhmucs', 'warehouse_histories.danhmucId', 'danhmucs.id')
            ->join('warehouses', 'warehouse_histories.warehouseId', '=', 'warehouses.id')
            ->where('warehouse_histories.id', $wh_history_id)
            ->select('warehouses.tenkho', 'warehouse_histories.tenchuongtrinh', 'danhmucs.tenhang', 'danhmucs.dongia', 'warehouse_histories.soluong', 'warehouse_histories.hansudung', 'warehouse_histories.created_at', 'warehouse_histories.id')
            ->first();

        StaticController::LogHistory('Nhập kho', Auth::id(), $wh_history_temp->id);

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
        $ngayxuat = $request->input('ngayxuat');
        $ghichu = $request->input('ghichu');
        $data = $request->input('data');

        $datatemp = array();

        foreach ($data as $hang) {
            $searchFlag = 0;
            foreach ($datatemp as $key => $a) {
                if ($key == $hang['tenhang']) {
                    $datatemp[$key] += $hang['soluong'];
                    $searchFlag = 1;
                }
            }
            if ($searchFlag == 0) {
                $datatemp[$hang['tenhang']] = $hang['soluong'];
            }
        }


        //Check số lượng

        foreach ($datatemp as $key => $value) {
            $soluongtrongkho = $soluongtrongkho = StaticController::hangTon($kho, $key);
            if ($soluongtrongkho < $value) {
                return [
                    'status' => false,
                    'msg' => 'Số lượng hàng xuất nhiều hơn hàng trong kho, vui lòng thử lại với số lượng ít hơn',
                    'data' => ''
                ];
            }
        }

        $wh_history_id = DB::table('warehouse_histories')->insertGetId([
            'type' => 1,
            'warehouseId' => $kho,
            'tenchuongtrinh' => $tenchuongtrinh,
            'userid' => Auth::id(),
            'ghichu' => $ghichu,
            'status' => false,
            'thoigian' => $ngayxuat,
        ]);

        foreach ($datatemp as $key => $value) {
            DB::table('donxuats')->insertGetId([
                'id_history' => $wh_history_id,
                'warehouseId' => $kho,
                'danhmucId' => $key,
                'soluong' => $value,
            ]);
        }

        $wh_history_temp = DB::table('warehouse_histories')
            ->join('warehouses', 'warehouse_histories.warehouseId', '=', 'warehouses.id')
            ->where('warehouse_histories.id', $wh_history_id)
            ->select('warehouses.tenkho', 'warehouse_histories.tenchuongtrinh', 'warehouse_histories.soluong', 'warehouse_histories.hansudung', 'warehouse_histories.created_at', 'warehouse_histories.id')
            ->first();

        StaticController::LogHistory('Xuất kho', Auth::id(), $wh_history_temp->id);

        return [
            'status' => true,
            'msg' => 'Tạo phiếu order thành công',
            'data' => $wh_history_temp
        ];
    }

    public function comfirmXuatKho(Request $request)
    {
        $idorder = $request->input('id_order');

        $order = DB::table('warehouse_histories')
            ->where('id', $idorder)->first();

        $orderDetail = DB::table('donxuats')
            ->where('id_history', $idorder)->get();

        if ($order) {
            DB::table('warehouse_histories')
                ->where('id', $idorder)->update([
                    'status' => true
                ]);

            DB::table('delivery_history')->insert([
                'orderid' => $idorder,
                'userid' => -1,
                'status' => 0
            ]);


            StaticController::LogHistory('Xác nhận đơn hàng', Auth::id(), $idorder);

            return [
                'status' => true,
                'msg' => 'Xác nhận thành công',
                'data' => ''
            ];
        } else {
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
            ->join('danhmucs', 'warehouse_histories.danhmucId', 'danhmucs.id')
            ->join('users', 'warehouse_histories.userid', 'users.id')
            ->where('warehouse_histories.id', $id)
            ->select('warehouse_histories.tenchuongtrinh', 'warehouse_histories.warehouseId', 'warehouse_histories.thoigian', 'warehouse_histories.ghichu', 'danhmucs.tenhang', 'danhmucs.mahang', 'danhmucs.dongia', 'warehouse_histories.soluong', 'warehouse_histories.hansudung', 'warehouse_histories.created_at', 'warehouse_histories.id', 'users.email', 'users.name')
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

    public function luuphieuxuat(Request $request, $id)
    {
        $kho = $request->input('kho');
        $tenchuongtrinh = $request->input('tenchuongtrinh');
        $data = $request->input('data');
        $ngayxuat = $request->input('ngayxuat');

        //check trang thai
        $phieuxuat = DB::table('warehouse_histories')
            ->where('id', $id)->first();

        if ($phieuxuat->status != 0) {
            return [
                'status' => true,
                'msg' => '',
                'data' => ''
            ];
        }

        foreach ($data as $dt) {
            DB::table('donxuats')
                ->where('id', $dt['id'])
                ->where('id_history', $id)
                ->update([
                    'soluong' => $dt['soluong'],
                    'danhmucId' => $dt['mahang'],
                    'warehouseId' => $kho,
                ]);
        }

        DB::table('warehouse_histories')
            ->where('id', $id)
            ->update([
                'tenchuongtrinh' => $tenchuongtrinh,
                'warehouseId' => $kho,
                'thoigian' => $ngayxuat
            ]);

        return [
            'status' => true,
            'msg' => '',
            'data' => ''
        ];
    }

    public function luuphieunhap(Request $request, $id)
    {
        $kho = $request->input('kho');
        $tenchuongtrinh = $request->input('tenchuongtrinh');
        $mahang = $request->input('mahang');
        $soluong = $request->input('soluong');
        $ngayxuat = $request->input('ngayxuat');
        $ngayhethan = $request->input('ngayhethan');
        $ghichu = $request->input('ghichu');

        //check trang thai
        $phieuxuat = DB::table('warehouse_histories')
            ->where('id', $id)->first();

        if ($phieuxuat->status != 0) {
            return [
                'status' => true,
                'msg' => '',
                'data' => ''
            ];
        }

        DB::table('warehouse_histories')
            ->where('id', $id)
            ->update([
                'tenchuongtrinh' => $tenchuongtrinh,
                'warehouseId' => $kho,
                'danhmucId' => $mahang,
                'soluong' => $soluong,
                'thoigian' => $ngayxuat,
                'hansudung' => $ngayhethan,
                'ghichu' => $ghichu
            ]);
        return [
            'status' => true,
            'msg' => '',
            'data' => ''
        ];
    }

    public function suaphieuxuat($id)
    {
        $wh_history_temp = DB::table('warehouse_histories')
            ->join('users', 'warehouse_histories.userid', 'users.id')
            ->where('warehouse_histories.id', $id)
            ->select('warehouse_histories.id', 'warehouse_histories.status', 'warehouse_histories.tenchuongtrinh', 'warehouse_histories.warehouseId', 'warehouse_histories.thoigian', 'users.email', 'users.name', 'warehouse_histories.ghichu')
            ->first();

        $listhang = DB::table('donxuats')
            ->join('danhmucs', 'danhmucs.id', 'donxuats.danhmucId')
            ->where('donxuats.id_history', $id)
            ->select('donxuats.id', 'donxuats.danhmucId', 'danhmucs.mahang', 'danhmucs.dongia', 'donxuats.soluong')
            ->get();

        $attachFile = DB::table('files')->where('id_order', $id)->get();
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
            'listhang' => json_decode(json_encode($listhang), true),
            'warehouses' => json_decode(json_encode($warehouses), true),
            'categorys' => json_decode(json_encode($category), true)
        ]);
    }

    public function suaphieunhap($id)
    {
        $wh_history_temp = DB::table('warehouse_histories')
            ->join('users', 'warehouse_histories.userid', 'users.id')
            ->join('danhmucs', 'danhmucs.id', 'warehouse_histories.danhmucId')
            ->where('warehouse_histories.id', $id)
            ->first();

        $listhang = DB::table('donxuats')
            ->join('danhmucs', 'danhmucs.id', 'donxuats.danhmucId')
            ->where('donxuats.id_history', $id)
            ->get();

        $attachFile = DB::table('files')->where('id_order', $id)->get();
        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        $warehouses = DB::table('warehouses')->get();

        $category = DB::table('danhmucs')->get();

        return view('/pages/suaphieunhap', [
            'pageConfigs' => $pageConfigs,
            'files' => json_decode(json_encode($attachFile), true),
            'whhistorytemp' => (array)$wh_history_temp,
            'listhang' => json_decode(json_encode($listhang), true),
            'warehouses' => json_decode(json_encode($warehouses), true),
            'categorys' => json_decode(json_encode($category), true)
        ]);
    }

    public function chitietxuatkho($id)
    {
        $wh_history_temp = DB::table('warehouse_histories')
            ->join('users', 'warehouse_histories.userid', 'users.id')
            ->join('warehouses', 'warehouses.id', 'warehouse_histories.warehouseId')
            ->where('warehouse_histories.id', $id)
            ->select('warehouse_histories.warehouseId', 'warehouses.tenkho', 'warehouse_histories.tenchuongtrinh', 'warehouse_histories.status', 'warehouse_histories.thoigian', 'warehouse_histories.ghichu', 'warehouse_histories.soluong', 'warehouse_histories.hansudung', 'warehouse_histories.created_at', 'warehouse_histories.id', 'users.email', 'users.name')
            ->first();

        $listhang = DB::table('donxuats')
            ->join('danhmucs', 'danhmucs.id', 'donxuats.danhmucId')
            ->where('donxuats.id_history', $id)
            ->get();


        $attachFile = DB::table('files')->where('id_order', (array)$wh_history_temp->id)->get();

        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        return view('/pages/lichsuxuat', [
            'pageConfigs' => $pageConfigs,
            'files' => json_decode(json_encode($attachFile), true),
            'whhistorytemp' => (array)$wh_history_temp,
            'listhang' => json_decode(json_encode($listhang), true)
        ]);
    }

    public function hangtrongkho(Request $request)
    {
        $danhmuchang = DB::table('danhmucs')->get();
        $danhsachkho = DB::table('warehouses')->get();
        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        return view('/pages/hangtrongkho', [
            'pageConfigs' => $pageConfigs,
            'danhsachkho' => json_decode(json_encode($danhsachkho), true),
            'danhmuchang' => json_decode(json_encode($danhmuchang), true)
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

        $user = DB::table('users')->where('id', Auth::id())->first();

        return view('/pages/danhsachkho', [
            'pageConfigs' => $pageConfigs,
            'warehouses' => json_decode(json_encode($warehouses), true),
            'users' => $user
        ]);
    }
}
