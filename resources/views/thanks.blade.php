@extends('layouts.app')
@section('content')
    <x-overlay-nav-user />
    <div class="container">
        <x-header />
        <div class="main thanks">
            <div class="thanks_wrap">
                <p class="thanks_txt">会員登録ありがとうございます</p>
                <a href="{{ url('/') }}" class="btn_thanks">ログインする</a>
            </div>
        </div>
    </div>
@endsection
