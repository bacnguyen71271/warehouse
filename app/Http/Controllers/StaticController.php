<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaticController extends Controller
{
    //
    public static function soLuongHang(){
        $tongnhap = DB::table('warehouse_histories')->select(DB::raw('SUM(`soluong`) as soluong'))
            ->where('type',0)->first();
        $tongxuat = DB::table('warehouse_histories')
            ->join('donxuats','warehouse_histories.id','donxuats.id_history')
            ->selectRaw('SUM(`donxuats`.`soluong`) as soluong')
            ->where('warehouse_histories.type',1)
            ->where('warehouse_histories.status',1)->first();
        return ( $tongnhap->soluong - $tongxuat->soluong );
    }

    /**
     * @param int $id_kho
     * @param int $id_hang
     * @return Số lượng hàng còn trong kho
     */
    public static function hangTon($id_kho, $id_hang = -1){
        if($id_hang != -1){
            $tongnhap = DB::table('warehouse_histories')->select(DB::raw('SUM(`soluong`) as soluong'))
                ->where('type',0)
                ->where('danhmucId',$id_hang)
                ->where('warehouseId',$id_kho)
                ->first();
            $tongxuat = DB::table('warehouse_histories')
                ->join('donxuats','warehouse_histories.id','donxuats.id_history')
                ->selectRaw('SUM(`donxuats`.`soluong`) as soluong')
                ->where('donxuats.danhmucId',$id_hang)
                ->where('donxuats.warehouseId',$id_kho)
                ->where('warehouse_histories.type',1)
                ->where('warehouse_histories.status',1)->first();
        }else{
            $tongnhap = DB::table('warehouse_histories')->select(DB::raw('SUM(`soluong`) as soluong'))
                ->where('type',0)
                ->where('warehouseId',$id_kho)
                ->first();
            $tongxuat = DB::table('warehouse_histories')
                ->join('donxuats','warehouse_histories.id','donxuats.id_history')
                ->selectRaw('SUM(`donxuats`.`soluong`) as soluong')
                ->where('donxuats.warehouseId',$id_kho)
                ->where('warehouse_histories.type',1)
                ->where('warehouse_histories.status',1)->first();
        }

        return ( $tongnhap->soluong - $tongxuat->soluong );
    }

    public static function getNotification($id, $limit = 20){
        $ntf = DB::table('notificaiton')
        ->where('user_id',$id)
        ->orderBy('created_at', 'desc')
        ->limit($limit)
        ->get();

        for ($i=0; $i < count($ntf); $i++) { 
            $ntf[$i]->time = self::time_elapsed_string($ntf[$i]->created_at);
        }

        return $ntf;
    }

    public static function time_elapsed_string($datetime, $full = false) {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'năm',
            'm' => 'tháng',
            'w' => 'tuần',
            'd' => 'ngày',
            'h' => 'giờ',
            'i' => 'phút',
            's' => 'giây',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' trước' : 'vừa rồi';
    }

    public static function findUserPer ($warehouse, $per) {
        if (isset($warehouse) && isset($per)) {
            $perList = DB::table('permissions')
            ->where('permission', $per)
            ->where('warehouse_id', $warehouse)
            ->get();
            return $perList;
        }
    }

    public static function sendNotification ($userid, $title, $content, $link, $type) {
        if (isset($userid) && isset($title) && isset($content) && isset($link) && isset($type)) {
            DB::table('notificaiton')
            ->insert([
                'user_id' => $userid,
                'ntf_title' => $title,
                'ntf_content' => $content,
                'ntf_link' => $link,
                'ntf_style' => $type,
                'status' => 0
            ]);
            return true;
        }
        return false;
    }

    public static function getNotificationCount($id){
        $ntf = DB::table('notificaiton')
        ->select(DB::raw('SUM(`id`) as soluong'))
        ->where('user_id', $id)
        ->where('status', 0)
        ->first();
        return $ntf->soluong ? $ntf->soluong : 0 ;
    }

    public static function getWarehouseInfo($id){
        //check hàng trong kho
        $hangtrongkho = DB::table('warehouse_goods')
        ->where('warehouseid','=',$id)->get();
        $soluonghangtrongkho = 0;
        foreach ($hangtrongkho as $key => $value) {
            $soluonghangtrongkho += $value->soluong;
        }

        return [
            'hangtrongkho' => $soluonghangtrongkho
        ];
    }

    public static function getWHById($id){
        return DB::table('warehouses')
            ->where('id', $id)->first();
    }

    public static function delivery($id){
        $delivery = DB::table('delivery_history')
            ->where('orderid', $id)->first();
        return $delivery;
    }

    public static function getDetailById($id){
        $data = DB::table('donxuats')
            ->join('danhmucs','donxuats.danhmucId','danhmucs.id')
            ->where('donxuats.id_history', $id)
            ->get();
        return $data;
    }

    public static function getUserInfoByIdOrder($idorder){
        $order = DB::table('delivery_history')
            ->join('users', 'delivery_history.userid', 'users.id')
            ->where('delivery_history.orderid',$idorder)
            ->first();
        return $order;
    }

    public static function getUserInfo($id){
        //check hàng trong kho
        $user = DB::table('users')
            ->where('id','=',$id)->first();

        return [
            'user' => $user
        ];
    }

    public static function checkMotQuyen($quyen){

        $q = 0;
        $permission = DB::table('permissions')->where('user_id',Auth::id())->get();
        // var_dump( Auth::user()->permission );die;

//        echo $quyen;
        foreach ($permission as $key => $value){
//            echo $value->permission;
//            echo $quyen;
            if($quyen == "delivery" && $value->permission == 'Delivery'){
                $q +=1;
            }

            if($quyen == "user" && $value->permission == 'User'){
//                echo '1231';
                $q +=1;
            }
            if($quyen == "approved" && $value->permission == 'Approved'){
                $q +=1;
            }

			if($quyen == "admin" && $value->permission == 'Administrator'){
                $q +=1;
            }

            //echo $value->permission;
        }
    //    echo $q; die;
        if($q > 0) return true; else return false;
    }

    public static function QuenUser(){
        $user = DB::table('users')->where('id',Auth::id())->first();

        return $user->permission;
    }

    public static function Checknutgiaohang($warehouse){

        $permission = DB::table('permissions')
            ->where('user_id',Auth::id())
            ->where('warehouse_id',$warehouse)
            ->where('permission','Delivery')
            ->first();


        if($permission){
            return true;
        }else{
            return false;
        }
    }


    public static function checkNutXacnhan($warehouse){
		$users = DB::table('users')->where('id',Auth::id())->first();
        $permission = DB::table('permissions')
            ->where('user_id',Auth::id())
            ->where('warehouse_id',$warehouse)
            ->where('permission','Approved')
            ->orWhere('permission',' Administrator')
            ->first();

        if($permission || $users->permission == 0){
            return true;
        }else{
            return false;
        }
    }

    public static function LogHistory($hanhdong,$tacnhan,$thongtin)
    {
        DB::table('system_histories')->insert([
            'hanhdong' => $hanhdong,
            'userid' => $tacnhan,
            'thongtin' => $thongtin
        ]);
    }
}
