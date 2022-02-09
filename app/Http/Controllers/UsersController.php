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
        $search_username = $_POST["searchName"];
        $result = DB::table('users')
            ->where('username', 'like', '%' . $search_username . '%')
            ->get();

        return view('users.search', ['search_username' => $search_username], ['result' => $result]);
    }
}