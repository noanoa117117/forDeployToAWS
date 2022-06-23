@extends('layouts.base')
@section('title', 'フォームの基本')
@section('main')

<form method="POST" action="/tweets/result">

  @csrf
  <label id="name">名前：</label>
  <input id="name" name="name" type="text" value="" />
  <input type="submit" value="送信" />
  <p> {{ $result }} </p>
</form>
@endsection