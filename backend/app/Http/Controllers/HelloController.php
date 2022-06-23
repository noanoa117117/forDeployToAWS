<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\DB; 

class HelloController extends Controller
{
    public function index()
    {
        return 'こんにちは、世界！';
    }

    public function view()
    {
        $data = [
          'msg' => 'こんにちは、世界！'
        ];
        return view('hello.view', $data);
      }

      public function list()
      {
        $data = [
          
            'records' => Book::all()
          // 生のSQL
           //'records' => DB::select('SELECT * FROM books')
        ];
        return view('hello.list', $data);
      }
}
