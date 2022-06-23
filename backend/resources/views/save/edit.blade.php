@extends('layouts.base')
@section('title', '書籍情報フォーム（編集）')
@section('main')
@if(count($errors)>0)
<ul>
    @foreach($errors->all() as $err)
    <li class="text-danger">{{$err}}</li>
    @endforeach
</li>
@endif
<form method="POST" action="/save/{{ $b->id }}">
  @csrf
  @method('PATCH')
  
  <div class="pl-2">
    <label id="isbn">ISBNコード：</label><br />
    <input id="isbn" name="isbn" type="text"
      size="15" value="{{ old('isbn', $b->isbn) }}" />
  </div>
  <div class="pl-2">
    <label id="title">書名：</label><br />
    <input id="title" name="title" type="text"
      size="30" value="{{ old('title', $b->title) }}" />
  </div>
  <div class="pl-2">
    <label id="price">価格：</label><br />
    <input id="price" name="price" type="text"
    size="5" value="{{ old('price', $b->price) }}" />円
  </div>
  <div class="pl-2">
    <label id="publisher">出版社：</label><br />
    <input id="publisher" name="publisher" type="text"
      size="10" value="{{ old('publisher', $b->publisher) }}" />
  </div>
  <div class="pl-2">
    <label id="published">刊行日：</label><br />
    <input id="published" name="published" type="text"
      size="10" value="{{ old('published', $b->published) }}" />
  </div>
  <div class="pl-2">
    <input type="submit" value="更新" />
  </div>
</form>
@endsection