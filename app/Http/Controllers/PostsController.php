<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{
    //
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function create(Request $request)
    {
        $post = $request->input('posts');
        $validator = Validator::make($request->all(), [
            'posts' => 'max:200'
        ], [
            'posts.max' => '200文字以内で入力してください。'
        ]);

        if ($validator->fails()) {
            return redirect('/top')
                ->withErrors($validator)
                ->withInput();
        } else {
            DB::table('posts')->insert([
                'user_id' => Auth::id(),
                'posts' => $post,
                'created_at' => now()
            ]);
            return redirect('/top');
        }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        //dd($data);
        return Validator::make($data, [
            'username' => 'required|string|min:4|max:255',
            'mail' => ['required', 'string', 'email', 'min:4', 'max:255', Rule::unique('users')->ignore(Auth::id()),],
            'password' => 'nullable|alpha_num|min:4|max:12|unique:users|different:password',
            'bio' => 'nullable|max:200',
            'image' => 'nullable|image|mimes:jpg,png,bmp,gif,svg|alpha_num',
        ], [
            'username.required' => '入力必須項目です。',
            'username.min' => '4文字以上で入力してください。',
            'username.max' => '255文字以内で入力してください。',
            'mail.required' => '入力必須項目です。',
            'mail.min' => '4文字以上で入力してください。',
            'mail.max' => '255文字以内で入力してください。',
            'mail.unique' => 'すでに使われているメールアドレスです。',
            'password.alpha_num' => '英数字で入力してください。',
            'password.min' => '4文字以上で入力してください。',
            'password.max' => '12文字以内で入力してください。',
            'password.unique' => 'すでに使われているパスワードです。',
            'password.different' => '登録されているパスワードです。',
            'bio.max' => '200文字以内で入力してください',
            'image.image' => '画像ファイルではありません。',
            'image.mines' => 'jpg,png,bmp,gif,svgファイル以外の画像は不可。',
            'image.alpha_num' => '英数字で入力してください。',
        ]);
    }
    public function index()
    {
        //ログインid名
        $login_id = Auth::id();
        //dd($login_id);
        //ログインidがfollowsテーブルのfollowerにいるfollowユーザーのidを取得
        $follow = DB::table('follows')
            ->where('follower', $login_id)
            ->select('follows.follow')
            ->get()
            ->toArray();
        //$followに連想配列
        //dd($follow);
        $follow_id = array_column($follow, 'follow');
        //連想配列を単一に
        //dd($follow_id);
        $post = DB::table('users')
            ->join('posts', 'users.id', 'posts.user_id')
            ->where('user_id', $login_id)
            ->orWhereIn('user_id', $follow_id)
            ->select('posts.*', 'users.username', 'users.images')
            ->latest()
            ->get();
        //dd($post);

        return view('posts.index', ['post' => $post]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function updateForm($id)
    {
        $post = DB::table('users')
            ->join('posts', 'users.id', 'posts.user_id')
            ->select('posts.*', 'users.username', 'users.images')
            ->latest()
            ->get();

        $update_post = DB::table('posts')
            ->where('id', $id)
            ->first();
        //dd($post);
        return view('posts.index', compact('update_post', 'post'));
    }

    public function postUpdate(Request $request)
    {
        //dd($request);
        $id = $request->input('id');
        $up_post = $request->input('posts');
        $updated_at = $request->input('update_at');

        $validator = Validator::make($request->all(), [
            'posts' => 'max:200'
        ], [
            'posts.max' => '200文字以内で入力してください。'
        ]);

        if ($validator->fails()) {
            return redirect('/top')
                ->withErrors($validator)
                ->withInput();
        } else {
            DB::table('posts')
                ->where('id', $id)
                ->update(
                    [
                        'posts' => $up_post,
                        'updated_at' => $updated_at
                    ]
                );
            return redirect('/top');
        }
    }

    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/top');
    }

    public function profile()
    {
        $user = Auth::user();
        $user_address = $user['mail'];
        //dd($user_address);
        $password = $user['password'];
        $bio = $user['bio'];
        if (!isset($bio)) {
            $bio = "";
        }
        //dd($bio);
        return view('posts.profile', compact('user_address', 'password', 'bio'));
    }

    public function update(Request $request)
    {
        $data = $request->input();

        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect('/login-profile')
                ->withErrors($validator)
                ->withInput();
        } else {
            //dd($_FILES);
            //dd($request);
            $id = $request->input('id');
            $username = $request->input('username');
            $user_address = $request->input('mail');
            $new_password = $request->input('password');
            $bio = $request->input('bio');
            //dd($bio);
            //$filename = $request->input('image');
            $filename = $_FILES['image']['name'];
            //dd($filename);
            if (!empty($new_password)) {
                DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'password' => $new_password
                    ]);
            }
            //dd($pass);
            DB::table('users')
                ->where('id', $id)
                ->update(
                    [
                        'username' => $username,
                        'mail' => $user_address,
                        'bio' => $bio,
                        'updated_at' => now()
                    ]
                );
            if (!empty($filename)) {
                DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'images' => $filename
                    ]);
            }
            //dd($_FILES);
            //画像があればローカルフォルダに保存
            if (!empty($_FILES)) {
                $filename = $_FILES['image']['name'];

                $uploaded_path = 'images/' . $filename;

                move_uploaded_file($_FILES['image']['tmp_name'], $uploaded_path);
            }
            return redirect('/top');
        }
    }
}