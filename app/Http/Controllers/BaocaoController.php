<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class BaocaoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function baocaokho(Request $request){

        $tenhang = $request->input('tenhang');
        $loaibaocao = $request->input('report-type');
        $title = $request->input('title');
        $from = $request->input('from');
        $to = $request->input('to');
        $kho = $request->input('kho');

        $danhsachkhos = DB::table('warehouses')->get();
        $danhsachkhos = json_decode($danhsachkhos,true);
        if(!$kho){
            $kho =  $danhsachkhos[0]['id'];
        }
        if(!$loaibaocao){
            $loaibaocao = 'nhapkho';
        }


        $query = DB::table('warehouse_histories')
            ->join('danhmucs','warehouse_histories.danhmucId','danhmucs.id');

        if($title){
            $query->where('warehouse_histories.tenchuongtrinh','like','%'.$title.'%');
        }

        if($tenhang){
            $query->whereIn('danhmucs.mahang',$tenhang);
        }

        $query->where('warehouse_histories.warehouseId',$kho);

        $query->select('warehouse_histories.created_at','warehouse_histories.tenchuongtrinh','warehouse_histories.soluong','warehouse_histories.ghichu','warehouse_histories.hansudung','danhmucs.tenhang','danhmucs.mahang','danhmucs.dongia');
        if($loaibaocao == 'nhapkho' || $loaibaocao == 'xuatkho'){
            if($from){
                $query->where('warehouse_histories.created_at','>=', $from.' 00:00:00' );
            }

            if($to){
                $query->where('warehouse_histories.created_at','<=', $to.' 23:59:59' );
            }

            if($loaibaocao == 'nhapkho'){
                $query->where('type',0);
            }
            if($loaibaocao == 'xuatkho'){
                $query->where('type',1);
            }
            $result = $query->get();
        }
        if($loaibaocao == 'ketxuat'){

            //Nhap dau ky
            $query_ndk = clone $query;
            $query_ndk->where('warehouse_histories.created_at','<=', $from.' 00:00:00' );
            $query_ndk->where('type',0);
            $nhapdauky = $query_ndk->get();
            $nhapdauky = json_decode($nhapdauky,true);

            //Nhap cuoi ky
            $query_nck = clone $query;
            $query_nck->where('warehouse_histories.created_at','<=', $to.' 23:59:59' );
            $query_nck->where('type',0);
            $nhapcuoiky = $query_nck->get();
            $nhapcuoiky = json_decode($nhapcuoiky,true);

            //Xuat dau ky
            $query_xdk = clone $query;
            $query_xdk->where('warehouse_histories.created_at','<=', $from.' 00:00:00' );
            $query_xdk->where('type',1);
            $query_xdk->where('status',1);
            $xuatdauky = $query_xdk->get();
            $xuatdauky = json_decode($xuatdauky,true);

            //Xuat cuoi ky
            $query_xck = clone $query;
            $query_xck->where('warehouse_histories.created_at','<=', $to.' 23:59:59' );
            $query_xck->where('type',1);
            $query_xck->where('status',1);
            $xuatcuoiky = $query_xck->get();
            $xuatcuoiky = json_decode($xuatcuoiky,true);

            $tongMahang = [];
            //Tong hop mang
            $tongMahang = $this->gopmang($tongMahang,$nhapdauky);
            $tongMahang = $this->gopmang($tongMahang,$xuatdauky);
            $tongMahang = $this->gopmang($tongMahang,$nhapcuoiky);
            $tongMahang = $this->gopmang($tongMahang,$xuatcuoiky);

            $result = [

            ];
            foreach ($tongMahang as $mahang){
                $dulieu = [
                    'tenhang' => '',
                    'mahang' => '',
                    'dongia' => 0,
                    'tondauky' => 0,
                    'toncuoiky' => 0,
                    'biendong' => 0
                ];
                //Xu ly du lieu dau ky
                foreach ($nhapdauky as $ndk){
                    if($ndk['mahang'] == $mahang){
                        $dulieu['tenhang'] = $ndk['tenhang'];
                        $dulieu['mahang'] = $ndk['mahang'];
                        $dulieu['dongia'] = $ndk['dongia'];
                        $dulieu['tondauky'] += $ndk['soluong'];
                    }
                }

                foreach ($xuatdauky as $xdk){
                    if($xdk['mahang'] == $mahang){
                        $dulieu['tenhang'] = $xdk['tenhang'];
                        $dulieu['mahang'] = $xdk['mahang'];
                        $dulieu['dongia'] = $xdk['dongia'];
                        $dulieu['tondauky'] -= $xdk['soluong'];
                    }
                }

                //Xu ly du lieu cuoi ky
                foreach ($nhapcuoiky as $ndk){
                    if($ndk['mahang'] == $mahang){
                        $dulieu['tenhang'] = $ndk['tenhang'];
                        $dulieu['mahang'] = $ndk['mahang'];
                        $dulieu['dongia'] = $ndk['dongia'];
                        $dulieu['toncuoiky'] += $ndk['soluong'];
                    }
                }

                foreach ($xuatcuoiky as $xdk){
                    if($xdk['mahang'] == $mahang){
                        $dulieu['tenhang'] = $xdk['tenhang'];
                        $dulieu['mahang'] = $xdk['mahang'];
                        $dulieu['dongia'] = $xdk['dongia'];
                        $dulieu['toncuoiky'] -= $xdk['soluong'];
                    }
                }

                array_push($result, $dulieu);

            }

            for ($i = 0; $i < count($result); $i++){
                $result[$i]['biendong'] = $result[$i]['toncuoiky'] - $result[$i]['tondauky'];
            }

        }

        $listhanghoa = DB::table('danhmucs')->get();


        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        return view('/pages/baocaokho', [
            'pageConfigs' => $pageConfigs,
            'danhsachkho' => json_decode(json_encode($danhsachkhos), true),
            'tenhang' => $tenhang,
            'kho' => $kho,
            'from' => $from,
            'to' => $to,
            'loaibaocao' => $loaibaocao,
            'title' => $title,
            'results' => json_decode(json_encode($result), true),
            'listhanghoa' => json_decode(json_encode($listhanghoa), true)

        ]);
    }

    function timtrongmang($array,$value){
        foreach ($array as $arr){
            if($arr== $value){
                return true;
                break;
            }
        }
        return false;
    }

    function gopmang($array1, $array2){
        $array_tep = $array1;
//        echo $array2;
        foreach ($array2 as $arr){
            if(!$this->timtrongmang($array_tep,$arr['mahang'])){
                array_push($array_tep, $arr['mahang']);
            }
        }
        return $array_tep;
    }
}
