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
        return view('users.profile');
    }
    public function search()
    {
        //ログインid名
        $login_id = Auth::id();
        //表示されているid名
        $current_id = DB::table('users')->pluck('id');
        //dd($current_id);OK
        //followsテーブルからログインidと表示されているidがあるidを取得
        $follow = DB::table('follows')
            ->where([
                ['follow', '=', $current_id],
                ['follower', '=', $login_id]
            ])
            ->pluck('id');
        //dd($follow);
        if (isset($follow)) {
            $result = DB::table('users')
                ->get();
            $follow_relation = 'フォロー関係にある';
            //dd($follow_relation);
            return view('users.search', ['result' => $result], ['follow' => $follow_relation]);
        } else {
            $result = DB::table('users')
                ->get();
            //dd($result);
            return view('users.search', ['result' => $result]);
        }
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