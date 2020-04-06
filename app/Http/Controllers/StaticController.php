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

    public static function CheckPermission($page){
        //
        $user = DB::table('users')
            ->where('id','=',Auth::id())->first();

        if($user->permission == 0){
            return 'Administrator';
        }

        if($user->permission == -1){
            return 'Không cấp quyền';
        }

        if($user->permission == 2){
            //Check quyền
            $permission = DB::table('permissions')
                ->where('id','=',Auth::id())->first();

            switch ($page){
                case 'delivery' :

                default:
                    return 'Không cấp quyền';
            }
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
