<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follows;
use Illuminate\Support\Facades\DB;

class FollowsController extends Controller
{
    //フォローリスト
    public function followList()
    {
        //ログインid名
        $login_id = Auth::id();
        //ログインidがfollowsテーブルのfollowerにいるfollowユーザーを取得
        $follow_image = DB::table('users')
            ->join('follows', 'users.id', 'follows.follow')
            ->select('users.*')
            ->where('follower', $login_id)
            ->get();
        //dd($follow_image);
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
            ->whereIn('user_id', $follow_id)
            ->select('posts.*', 'users.username', 'users.images')
            ->latest()
            ->get();
        //dd($post);

        return view('follows.followList', ['post' => $post, 'follow_image' => $follow_image]);
    }
    //フォロワーリスト
    public function followerList()
    {
        //ログインid名
        $login_id = Auth::id();
        //ログインidがfollowsテーブルのfollowにいるfollowerユーザーを取得
        $follower_image = DB::table('users')
            ->join('follows', 'users.id', 'follows.follower')
            ->select('users.*')
            ->where('follow', $login_id)
            ->get();
        //dd($follow_image);
        //ログインidがfollowsテーブルのfollowにいるfollowerユーザーのidを取得
        $follower = DB::table('follows')
            ->where('follow', $login_id)
            ->select('follows.follower')
            ->get()
            ->toArray();
        //$followに連想配列
        //dd($follower);
        $follower_id = array_column($follower, 'follower');
        //連想配列を単一に
        //dd($follower_id);
        $post = DB::table('users')
            ->join('posts', 'users.id', 'posts.user_id')
            ->whereIn('user_id', $follower_id)
            ->select('posts.*', 'users.username', 'users.images')
            ->latest()
            ->get();
        //dd($post);
        return view('follows.followerList', ['post' => $post], ['follower_image' => $follower_image]);
    }

    //フォロー登録
    public function follow(Request $request)
    {
        $login_id = $_POST["loginId"];
        $current_id = $_POST["currentId"];
        //dd($request->loginId);
        if (isset($login_id, $current_id)) {
            DB::table('follows')
                ->insert([
                    'follow' => $current_id,
                    'follower' => $login_id,
                    'created_at' => now()
                ]);
        }
        return redirect('/search');
    }
    //フォロー削除
    public function followDelete()
    {
        $login_id = $_POST["loginId"];
        $current_id = $_POST["currentId"];
        if (isset($login_id, $current_id)) {
            DB::table('follows')
                ->where([
                    ['follow', '=', $current_id],
                    ['follower', '=', $login_id]
                ])
                ->delete();
        }
        return redirect('/search');
    }
}