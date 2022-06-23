<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StateController extends Controller
{

    public function recCookie()#cookie保存
    {
        return response()
        ->view('state.view')
        ->cookie('app_title','laravel',60*24*30);
        /*
        cookieメソッドの引数=名前、値、有効期限、パス、ドメイン、HTTPSでのみ送信true/false
        今回は名前app_title,値laravel,有効期限30日間
        */
    }

    public function readCookie(Request $req)#cookie取得
    {
        return view('state.readcookie',[
            'app_title'=>$req->cookie('app_title')
        ]);
    }

    public function session1(request $req) #sessionの取得、設定
    {
        $req->session()->put('series','速習しりーず');
        return 'sessionを保存しました';
    }
    public function sesstion2(Request $req)
    {
        $series=$req->session()->get('series','未定');
        return 'シリーズ;'.$series;
    }#sessionに値を出し入れするのはsession()経由でput(name,value)かget(name,default)を呼び出し

   /* $series=$req->session()->get('series',function(){
        return '未定'
    });引数defaultは関数として表すことも可能*/

    /*session(['key'=>'value']);
    $value=session('key','default value');
     session関数を利用可能*/

     


}
