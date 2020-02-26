<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class DanhmucController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        $danhmuc = DB::table('danhmucs')->get();
        
        return view('/pages/danhmuc', [
            'pageConfigs' => $pageConfigs,
            // 'products' => $objs['products'],
            'products' => json_decode(json_encode($danhmuc), true)
        ]);
    }

    function product_price($priceFloat)
    {
        $symbol = ' đ';
        $symbol_thousand = '.';
        $decimal_place = 0;
        $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
        return $price . $symbol;
    }

    public function categoryInfo(Request $request)
    {
        $iddanhmuc = $request->input('iddanhmuc');
        $danhmuc = DB::table('danhmucs')->where('id',$iddanhmuc)->first();
        if(count((array)$danhmuc)){
            return [
                'status' => true,
                'msg' => '',
                'data' => $danhmuc
            ];
        }else{
            return [
                'status' => false,
                'msg' => 'Không tìm thấy category này',
                'data' => ''
            ];
        }
    }


    public function deleteCategory(Request $request)
    {
        $iddanhmuc = $request->input('iddanhmuc');

        DB::table('danhmucs')->where('id', $iddanhmuc)->delete();

        return [
            'status' => true,
            'msg' => 'Xóa thành công',
            'data' => ''
        ];
    }

    public function editCategory(Request $request)
    {
        $madanhmuc = $request->input('madanhmuc');
        $loaihang = $request->input('loaihang');
        $tenhang = $request->input('tenhang');
        $dongia = $request->input('dongia');
        $iddanhmuc = $request->input('iddanhmuc');

        $danhmuccu = DB::table('danhmucs')->where('id', $iddanhmuc)->first();

        $check = false;
        if($danhmuccu->mahang == $madanhmuc){
            $check = true;
        }else{
            $danhmuc_check = DB::table('danhmucs')->where('mahang', $madanhmuc)->first();
            if(count((array)$danhmuc_check) < 1 ){
                $check = true;
            }
        }

        if($check){
            DB::table('danhmucs')->where('id',$iddanhmuc)->update([
                'loaihang' => $loaihang,
                'tenhang' => $tenhang,
                'mahang' => $madanhmuc,
                'dongia' => $dongia
            ]);

            return [
                'status' => true,
                'msg' => 'Sửa danh mục thành công',
                'data' => [
                    'id' => $iddanhmuc,
                    'loaihang' => $loaihang,
                    'tenhang' => $tenhang,
                    'mahang' => $madanhmuc,
                    'dongia' => $this->product_price($dongia)
                ]
            ];

        }else{
            return [
                'status' => false,
                'msg' => 'Mã danh mục đã tồn tại',
                'data' => ''
            ];
        }
    }

    public function addCategory(Request $request)
    {
        $madanhmuc = $request->input('madanhmuc');
        $loaihang = $request->input('loaihang');
        $tenhang = $request->input('tenhang');
        $dongia = $request->input('dongia');

        $danhmuc = DB::table('danhmucs')->where('mahang', $madanhmuc)->first();

        if (count((array) $danhmuc) < 1) {
            $iddanhmuc = DB::table('danhmucs')->insertGetId([
                'loaihang' => $loaihang,
                'tenhang' => $tenhang,
                'mahang' => $madanhmuc,
                'dongia' => $dongia
            ]);

            $danhmuc_lastadd = DB::table('danhmucs')->where('id', $iddanhmuc)->first();
            return [
                'status' => true,
                'msg' => 'Thêm thành công danh mục',
                'data' => [
                    'id' => $danhmuc_lastadd->id,
                    'loaihang' => $danhmuc_lastadd->loaihang,
                    'tenhang' => $danhmuc_lastadd->tenhang,
                    'mahang' => $danhmuc_lastadd->mahang,
                    'dongia' => $this->product_price($danhmuc_lastadd->dongia),
                    'created_at' => $danhmuc_lastadd->created_at
                ]
            ];
        } else {
            return [
                'status' => false,
                'msg' => 'Mã danh mục đã tồn tại',
                'data' => 'madanhmuc'
            ];
        }
    }
}
