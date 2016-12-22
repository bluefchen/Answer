<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    /**
     * 将用户重定向到GITHUB界面
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }


    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        //todo: github等其余社会账户如何存储的问题：如果多个社会账户均用一个email注册怎么办（email要求是不一样的）
        if(!User::where('email',$user->email)->first()) {//如果该github_id不存在，则保存这个账户，email修改为可以相同？
            $userModel = new User;
            $userModel->email = $user->email;
            $userModel->name = $user->nickname;
            $userModel->save();
        }
        $userInstance = User::where('email',$user->email)->firstOrFail();
        Auth::login($userInstance);
        return back();//重定向响应到前一个位置
        
    }




}
