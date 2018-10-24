<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Config;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // ログインしていなかったらログインページに強制遷移
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $login = \Auth::user();
        $query = User::query();
        $users = $query->orderBy('id','desc')->paginate(20);
        $nav_flag = Config::get('const.nav');
        return view('user.index', compact('nav_flag', 'users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // $idには$user['id']が入っている。show.blade.phpに遷移する処理
    {
        $login = \Auth::user();
        $nav_flag = Config::get('const.nav'); // bucketList/config/const.phpのnavの値を代入
        $user = User::find($id); // $user = 'SELECT * FROM `users` WHERE `id`=$id';
        $items = $user->items; // $items = 'SELECT * FROM `items` WHERE `user_id`=$user["id"]';
        return view('item.show', compact('nav_flag', 'user', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    private function extension($request)
    {
        //
    }
}
