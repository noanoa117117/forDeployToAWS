<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function param(int $id)
    {
        return 'id値:'.$id;
    }

    public function plain()
    {
        return response('hello',200) #response([text[,status[,headers]])本体、応答、
        ->header('Count-Type','text/plain');
    }#応答ステータスやヘッダーを付与できるメリット

    public function header()
    {
        return response()
        ->view('ctrl.header',['msg'=>'hello'],200)
        ->header('Content-Type','text/xml');
    /*  ->withheaders([
            'Content-Type'=>'text/xml', #複数のheaderの場合
            'X-Powered-FW'=>'Laravel/6'
        ]);   */
    }

    public function outJson()#json形式の出力
    {
        return response()
        ->json([
            'name'=>'yamada',
            'sex'=>'male',
            'age'=>'18']
        ->withCallback('callback')); #jsonp形式用の応答
    }
    #return[連想配列]でもヘッダー追加、jsonp整形が必要なければ可能

    #指定されたファイル/データをダウンロードさせる
    public function outFile()
    {
        return response()
        ->download('path','filename',
        ['content-type'=>'text/csv']);
    }

#ファイルでなく生成したデータをダウンロードさせたい
    public function outCsv()
    {
        return response()
        ->streamDownload(function(){
            print(
                "data".
                "data2"
            );
        },'download.csv',['content-type'=>'text/csv']);
    }

    #ダウンロードせず画面に出力
    public function outimage()
    {
        return response()
        ->file('path',['content-type'=>'image/png']);
    }

    #任意のページにredirect
    public function redirectBasic()
    {
        return redirect('path.blade');
    }/*return redirect()->route('list'); 
    route メソッドを使う場合Route::get('path',Controller@list)
                                ->name('list')と宣言必要*/
        
                        #return redirect()->route('path',['id'=>108]); パラメータ必要なら

    /*actiionメソッドに対してリダイレクト可能。パラメータ渡す場合
        return redirect()->action('RouteController@param',['id'=>108]);*/

    /*他サイトに移動awayメソッド
    return redirect()->away('https://'); */

    #リクエストオブジェクトの基本。リクエスト時のパスを渡す
    public function hoge1(Request $req)
    {
        return 'リクエストパス:'.$req->path();
    } #または、　return'リクエストパス:'.request()->path();

    /*リクエストオブジェクトとルートパラメータ同時可能
    public function hoge2(Request $request ,$id)
    {
        
    }*/

    public function form()
    {
        return view('tweet.form1',['result'=>'']);
    }

    /*public function result(Request $req)
    {
        $name = $req->name;             #=$req->input('name','名無し');規定値
        return view('tweet.result',[
            'result'=>'こんにちは、'.$name.'さん'
        ]);
    } */
    public function result(Request $req)
    {
            $name = $req->name;

            if(empty($name) || mb_strlen($name)>10){
                return redirect('tweets/result')
                ->withInput()
                 ->with('alert','名前必須10文字以内');      #withメソッドwith(key,value)
            }else{
                return view('tweet.form1',[
                    'result'=>'こんにちは'.$req->name.'さん'
                ]);
            }
    }



    

    
    public function middle()
    {
        return 'log is recorded';
    }


    /* コントローラーでミドルウェア指定
    public function __cunstruct()
    {
        $this->middleware(function($request,$next){
            略
            return $next($request);
        })->only(['basic1','basic2']);特定のアクションをonly exceptで指定もできる
    }*/





}

