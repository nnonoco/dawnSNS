<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PostsController extends Controller
{
    //
    protected function create(Request $request)
    {
        $post = $request->input('newPosts');
        DB::table('posts')->insert([
            'user_id' => Auth::id(),
            'posts' => $post,
            'created_at' => now()
        ]);


        return redirect('/top');
    }

    public function index()
    {
        $post = DB::table('users')
            ->join('posts', 'users.id', 'posts.user_id')
            ->select('posts.*', 'users.username', 'users.images')
            ->latest()
            ->get();

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
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $up_post],
                ['updated_at' => $updated_at]
            );
        return redirect('/top');
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
            $bio = "自己紹介を入れてね。";
        }
        //dd($bio);
        return view('posts.profile', compact('user_address', 'password', 'bio'));
    }

    public function update(Request $request)
    {
        //dd($_FILES);
        //dd($request);
        $id = $request->input('id');
        $username = $request->input('username');
        $user_address = $request->input('userAddress');
        $password = $request->input('password');
        $new_password = $request->input('newPassword');
        $bio = $request->input('bio');
        //$filename = $request->input('image');
        $filename = $_FILES['image']['name'];
        //dd($filename);
        if (isset($nes_password)) {
            $pass = $new_password;
        } else {
            $pass = $password;
        }
        DB::table('users')
            ->where('id', $id)
            ->update(
                ['username' => $username],
                ['mail' => $user_address],
                ['password' => $pass],
                ['bio' => $bio],
                ['images' => $filename],
                ['updated_at' => now()]
            );
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