<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Classes\ActivationService;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/';
    protected $activationService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->activationService = $activationService;
    }

    public function showLoginForm(){
        $pageConfigs = [
            'bodyClass' => "bg-full-screen-image",
            'blankPage' => true
        ];

        return view('/auth/login', [
            'pageConfigs' => $pageConfigs
        ]);
      }


    protected function authenticated(Request $request, $user)
    {
        if (!$user->active) {
            $this->activationService->sendActivationMail($user);
            auth()->logout();
            return back()->with('warning', 'Bạn cần xác thực tài khoản, chúng tôi đã gửi mã xác thực vào email của bạn, hãy kiểm tra và làm theo hướng dẫn.');
        }

        if ($user->permission == -1) {
            //$this->activationService->sendActivationMail($user);
            auth()->logout();
            return back()->with('warning', 'Tài khoản của bạn đang được quản trị viên xem xét, bạn sẽ nhận được email thông báo khi chúng tôi hoàn thành điều này');
        }

        if ($user->permission == -2) {
            //$this->activationService->sendActivationMail($user);
            auth()->logout();
            return back()->with('warning', 'Tài khoản đã bị vô hiệu hóa');
        }
        
        return redirect()->intended($this->redirectPath());
    }
}
