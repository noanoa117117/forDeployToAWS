
@extends('layouts.base')

@section('title','共通レイアウト')

@section('main')

    @component('components.alert',['type'=>'success'])

        @slot('alert_title')
        初めての
        
        @endslot
        hello
    @endcomponent
@endsection

