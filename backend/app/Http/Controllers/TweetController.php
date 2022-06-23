<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\Book;

class TweetController extends Controller
{
    //
    public function index(){
        return "hello";
    }

    public function view(){
        $data =[
        'msg'=> 'date(Ymd h:i:s)'
        ];

        return view('tweet.show',$data);
    }

    public function list(){
        $data = [
            'records' => Book::all()
        ];
        return view('tweet.list',$data);
    }

    public function if(){
        return view('tweet.index',[
            'random' => random_int(0,100)
        ]);
    }

    public function isset(){
        return view('tweet.index',[
            'msg' => 'hello',        
        ]);
    }

    public function switch(){
        return view('tweet.index',[
            'random'=>random_int(1,5)
        ]);
    }

    public function while(){
        return view('tweet.index');
    }

    public function foreach_assoc()
    {
        return view('tweet.index',[
            'member'=>[
                'name'=>'YAMADA,TAKASHI',
                'sex'=>'男',
                'birth'=>'1994-12-03'
            ]
            ]);
    }

    public function foreach_loop()
    {
        return view('tweet.list',[
            'weeks'=>['月','火','水','木','金','土','日']
        ]);
    }

    public function master()
    {
        return view('tweet.index',[
            'msg'=>'hello',
        ]);
    }

   
}

   
