<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class SaveController extends Controller
{

    public function sinki()
    {
        return view('save.create');
    }
    public function create()
    {
        return view('save.create');
    }
    
    public function store(Request $req)
    {
        $this->validate($req,Book::$rules);#requestオブジェクト、検証ルール

        $b = new Book();
        $b->fill($req->except('_token'))->save();
        return redirect('tweets/list');
    }

    public function edit($id)
    {
        return view('save.edit',[
            'b'=>Book::findOrFail($id)#書籍情報取得
        ]);
    }

    public function update(Request $req,$id)
    {
        $b = Book::find($id);//目的のid

        $b->fill($req->except('_token','_method'))->save();
        return redirect('hello/list');//入力値でモデルを更新保存

    }

    public function show($id)
    {
        return view('save.show',[
            'b'=>Book::findOrFail($id)
        ]);
    }

    public function destroy($id)
    {
        $b=Book::findOrFail($id);
        $b->delete();
        return redirect('hello/list');
    }
}
