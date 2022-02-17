<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class UsersController extends Controller
{
    //
    public function profile()
    {
        $post = DB::table('users')
            ->join('posts', 'users.id', 'posts.user_id')
            ->select('posts.*', 'users.username', 'users.images')
            ->latest()
            ->get();
        return view('users.profile', ['post' => $post]);
    }
    public function search()
    {
        //ログインid名
        $login_id = Auth::id();
        //dd($login_id);
        //followsテーブルからfollowerカラムにログインidがあるfollowカラムのidを取得
        $follow = DB::table('follows')
            ->where('follower', $login_id)
            ->select('follows.follow')
            ->get();
        //dd($follow);
        $result = DB::table('users')
            ->get();
        //dd($result);
        return view('users.search', ['result' => $result], ['follow' => $follow]);
    }
    public function result()
    {
        $search_username = $_POST["searchName"];
        $result = DB::table('users')
            ->where('username', 'like', '%' . $search_username . '%')
            ->get();

        return view('users.search', ['search_username' => $search_username], ['result' => $result]);
    }
}