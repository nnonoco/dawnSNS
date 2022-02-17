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
        //dd($bio);
        return view('posts.profile', ['user_address' => $user_address], ['password' => $password], ['bio' => $bio]);
    }

    public function update()
    {
        $id = $_POST["id"];
        $username = $_POST["username"];
        $user_address = $_POST["userAddress"];
        $password = $_POST["password"];
        $new_password = $_POST["newPassword"];
        $bio = $_POST["bio"];
        $image = $_POST["image"];
        DB::table('users')
            ->where(['id', $id])
            ->update([
                'username' => $username,
                'mail' => $user_address,
                'password' => $new_password,
                'bio' => $bio,
                'images' => $image,
                'updated_at' => now()
            ]);

        return redirect('/top');
    }
}