@extends('layouts.base')
@section('title','書籍情報')
@section('main')

<form method="POST" action="/save/{{$b->id}}">
@csrf
@method('DELETE')

<div class="pl-2">
    <span id="isbn">ISBNコード:</span><br />
    {{$b->isbn}}
</div>

<div class="pl-2">
    <span id="title">書名：</span><br />
    {{ $b->title }}
  </div>
  <div class="pl-2">
    <span id="price">価格：</span><br />
    {{ $b->price }}円
  </div>
  <div class="pl-2">
    <span id="publisher">出版社：</span><br />
    {{ $b->publisher }}
  </div>
  <div class="pl-2">
    <span id="published">刊行日：</span><br />
    {{ $b->published }}
    </div>
  <div class="pl-2">
    <input type="submit" value="削除" />
  </div>
</form>
@endsection
