<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MyItemRequest;

use App\Item;
use App\User;
// use App\TodoItem;
use Carbon\Carbon;
use Config;


class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]); // indexメソッド以外はログインしていなかったらログインページに強制遷移
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function index()
    {
        $login = \Auth::user(); // ログインユーザー情報代入
        if (empty($login)) { // もしログインしてなかったら
            return view('home'); // home画面へ遷移
        } else { // ログインしていたら
            $items = Item::where('user_id', $login['id'])->get(); // $items = 'SELECT * FROM `items` WHERE `id`=$login["id"]';
            foreach ($items as $item) { // 全件まわす中で
                if ($item['user_id'] == $login['id']) { // itemの持ち主とログインユーザーのidが一致したら
                    $nav_flag = Config::get('const.nav'); // bucketList/config/const.phpのnavの値を代入
                    return view('home', compact('nav_flag')); // 既にregiで登録済みなのでhome画面にとどまれる。
                }
            }
            $nav_flag = Config::get('const.nav_regi'); // bucketList/config/const.phpのnav_regiの値を代入
            return view('item.regi', compact('login', 'nav_flag')); // 一致しない場合は未登録なのでregi.blade.phpへ遷移
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $login = \Auth::user();
        $nav_flag = Config::get('const.nav_regi');
        return view('item.regi', compact('login', 'nav_flag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $login = \Auth::user();
        if ($login['id'] == $id) {
            $nav_flag = Config::get('const.nav');
            $items = Item::oldest('limit_date')->where('user_id', $login['id'])->get();
            return view('item.mypage', compact('login', 'nav_flag', 'items'));
        } else {
            return redirect()->action('UsersController@show', ['id' => $id]);
        }
    }

    public function mystore(MyItemRequest $request, $id)
    {
        $login = \Auth::user();
        $input = $request->input();
        $request->session()->regenerateToken();
        $input['user_id'] = $login->id;

        $rank = Item::whereBetween('rank_code', [1, 5])->where('user_id', $login['id'])->get();

        for ($i=0; $i < count($rank); $i++) {
            if (!empty($rank) && $rank[$i]['rank_code'] == $input['rank_code']) {
                $rank[$i]['rank_code'] = 0;
                $rank[$i]->save();
            }
        }
        Item::create($input);
        return redirect()->to('/mypage/' . $id);
    }

    public function rank_update(Request $request, $id)
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
    public function update(Request $request, $id)
    {
        //
    }

    public function done($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
    }

    public function giveup($id)
    {
        //
    }
}
