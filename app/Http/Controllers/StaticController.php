<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaticController extends Controller
{
    //

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

    public static function checkMotQuyen($quyen){

        $q = 0;
        $permission = DB::table('permissions')->where('user_id',Auth::id())->get();


//        echo $quyen;
        foreach ($permission as $key => $value){
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
        }
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

        $permission = DB::table('permissions')
            ->where('user_id',Auth::id())
            ->where('warehouse_id',$warehouse)
            ->where('permission','Approved')
            ->orWhere('permission',' Administrator')
            ->first();

        if($permission){
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
