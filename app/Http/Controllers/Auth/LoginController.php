<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * 获取登录TOKEN
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function token(Request $request)
    {
        dd(2);
        $username = $request->get('username');
        $user = User::orWhere('email', $username)->orWhere('phone', $username)->first();

        if ($user && ($user->status == 0)) {
            throw  new UnauthorizedHttpException('', '账号已被禁用');
        }

        $client = new Client();
        try {
            $request = $client->request('POST', request()->root() . '/api/oauth/token', [
                'form_params' => config('passport') + $request->only(array_keys($request->rules()))
            ]);

        } catch (RequestException $e) {
            throw  new UnauthorizedHttpException('', '账号验证失败');
        }

        if ($request->getStatusCode() == 401) {
            throw  new UnauthorizedHttpException('', '账号验证失败');
        }
        return response()->json($request->getBody()->getContents());
    }
}
