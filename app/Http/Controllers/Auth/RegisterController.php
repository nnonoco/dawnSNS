<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'username' => 'required|string|min:4|max:255',
            'mail' => 'required|string|email|min:4|max:255|unique:users',
            'password' => 'required|alpha_num|min:4|max:12|unique:users',
            'password-confirm' => 'required|same:password'
        ], [
            'username.required' => '入力必須項目です。',
            'username.min' => '4文字以上で入力してください。',
            'username.max' => '255文字以内で入力してください。',
            'mail.required' => '入力必須項目です。',
            'mail.min' => '4文字以上で入力してください。',
            'mail.max' => '255文字以内で入力してください。',
            'mail.unique' => 'すでに使われているメールアドレスです。',
            'password.required' => '入力必須項目です。',
            'password.alpha_num' => '英数字で入力してください。',
            'password.min' => '4文字以上で入力してください。',
            'password.max' => '12文字以内で入力してください。',
            'password.unique' => 'すでに使われているパスワードです。',
            'password-confirm.required' => '入力必須項目です。',
            'password-confirm.same' => 'パスワードが一致しません。',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();

            $validator = $this->validator($data);

            if ($validator->fails()) {
                return redirect('/register')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $this->create($data);
                return redirect('/added');
            }
        }
        return view('auth.register');
    }

    public function added()
    {
        $list = DB::table('users')->latest()->first();
        return view('auth.added', ['list' => $list]);
    }
}