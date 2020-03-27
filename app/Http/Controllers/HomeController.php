<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Thống kê hàng trong kho
        $hangtrongkho = 0;
        $warehouses = DB::table('warehouse_goods')->get();
        foreach ($warehouses as $key => $value) {
            $hangtrongkho += $value->soluong;
        }

        //Thống kê users
        $users = DB::table('users')->count();

        //Thống kê đơn đã giao
        $delivery = DB::table('delivery_history')->where('status',2)->count();       

        //Thống kê đơn xác nhận
        $order = DB::table('warehouse_histories')
        ->where('type','1')
        ->where('status',false)
        ->count();

        //Lịch sử
        $systemHistorys = DB::table('system_histories')
        ->join('users','users.id','=','system_histories.userid')
        ->orderBy('system_histories.created_at','desc')
        ->select('system_histories.hanhdong','system_histories.thongtin','system_histories.created_at','users.email','users.name')
        ->limit(10)->get();

        //print_r($systemHistorys);
        
        $pageConfigs = [
            'pageHeader' => false
        ];

        return view('/pages/dashboard-analytics', [
            'pageConfigs' => $pageConfigs,
            'hangtrongkho' => $hangtrongkho,
            'nguoidung' => $users,
            'historys' => json_decode(json_encode($systemHistorys),true),
            'order' => $order,
            'deliveryed' => $delivery
        ]);
    }
}
