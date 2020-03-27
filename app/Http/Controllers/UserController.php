<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userView($id)
    {
        $user = DB::table('users')
        ->where('email',$id)
        ->select('users.email','users.name','users.id','users.permission','users.active','users.created_at')
        ->first();

        //Check permission
        $permission = DB::table('users')
        ->join('permissions','permissions.user_id','users.id')
        ->join('warehouses','warehouses.id','permissions.warehouse_id')
        ->where('users.id',$user->id)
        ->select('permissions.permission','permissions.warehouse_id','warehouses.tenkho')
        ->get();

        $warehouses = DB::table('warehouses')->get();
        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        return view('/pages/user-view', [
            'pageConfigs' => $pageConfigs,
            'user' => (array)$user,
            'warehouses' => json_decode(json_encode($warehouses), true),
            'permissions' => json_decode(json_encode($permission), true),
        ]);
    }


    public function userEditPost(Request $request)
    {
        $perJson = $request->input('permission');
        $emailUser = $request->input('email');

        $perArray = json_decode($perJson,true);

        $userInfo = DB::table('users')->where('email',$emailUser)->first();

        // print_r($perJson);
        //Xóa per cũ
        DB::table('permissions')->where('user_id',$userInfo->id)->delete();

        //Thêm lại các permission
        foreach ($perArray as $key => $value) {
            if($value !== 'Không cấp quyền'){
                DB::table('permissions')->insert([
                    'user_id' => $userInfo->id,
                    'warehouse_id' => $key,
                    'permission' => $value
                ]);
            }
        }

        return [
            'status' => true,
            'msg' => 'Lưu thay đổi thành công',
            'data' => ''
        ];
    }

    public function userEdit($id)
    {
        $user = DB::table('users')
        ->where('email',$id)
        ->select('users.email','users.id','users.name','users.permission','users.active','users.created_at')
        ->first();

        //Check permission
        

        // print_r($permission);

        $warehouses = DB::table('warehouses')->get();
        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
        ];

        $pageConfigs2 = [
            'bodyClass' => "bg-full-screen-image",
            'blankPage' => true,
            'footerType' => 'static',
            'verticalMenuNavbarType' => 'floating'
        ];

        $permission = DB::table('users')
            ->join('permissions','permissions.user_id','users.id')
            ->join('warehouses','warehouses.id','permissions.warehouse_id')
            ->where('users.id',$user->id)
            ->select('permissions.permission','permissions.warehouse_id')
            ->get();

        //Tìm quyền
        $user = DB::table('users')->where('id',Auth::id())->first();
        if($user->permission == 0){
            
            
            return view('/pages/admin-user-edit', [
                'pageConfigs' => $pageConfigs,
                'user' => (array)$user,
                'warehouses' => json_decode(json_encode($warehouses), true),
                'permissions' => json_decode(json_encode($permission), true),
            ]);
        }
        if($id == $user->email){
            return view('/pages/user-edit', [
                'pageConfigs' => $pageConfigs,
                'user' => (array)$user,
                'warehouses' => json_decode(json_encode($warehouses), true),
                'permissions' => json_decode(json_encode($permission), true),
            ]);
        }
        
        return view('/pages/not-auth', [
            'pageConfigs' => $pageConfigs2,
        ]);
    }

    public function userIndex(Request $request)
    {
        $user = DB::table('users')
        ->select('users.email','users.name','users.permission','users.active','users.created_at')
        ->get();
        $pageConfigs = [
            // 'pageHeader' => false,
            'navbarType' => 'sticky',
            
        ];

        return view('/pages/danhsachuser', [
            'pageConfigs' => $pageConfigs,
            'users' => json_decode(json_encode($user), true),
        ]);
    }
}
