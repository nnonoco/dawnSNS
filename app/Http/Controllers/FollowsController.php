<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follows;
use Illuminate\Support\Facades\DB;

class FollowsController extends Controller
{
    //
    public function followList()
    {
        return view('follows.followList');
    }
    public function followerList()
    {
        return view('follows.followerList');
    }

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