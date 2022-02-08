<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //
    public function profile()
    {
        return view('users.profile');
    }
    public function search()
    {
        $result = DB::table('users')
            ->get();
        return view('users.search', ['result' => $result]);
    }
    public function result()
    {
        $result = DB::table('users')
            ->where('username', 'like', '%' . $_POST["searchName"] . '%')
            ->get();

        return view('users.search', ['result' => $result]);
    }
}