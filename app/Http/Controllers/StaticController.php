<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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


    public static function LogHistory($hanhdong,$tacnhan,$thongtin)
    {
        DB::table('system_histories')->insert([
            'hanhdong' => $hanhdong,
            'userid' => $tacnhan,
            'thongtin' => $thongtin
        ]);
    }
}
