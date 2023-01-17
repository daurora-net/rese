@extends('layouts.app')
@section('content')
<x-overlay-nav-user />
<div class="container">
  <x-header />
  <div class="main thanks">
    <div class="thanks_wrap">
      <p class="thanks_txt">お支払いありがとうございます</p>
      <a href="{{route('/mypage'}}" class="btn_done">戻る</a>
      <!-- <input value="戻る" onclick="history.back();" type="button" class="btn_done"> -->
    </div>
  </div>
</div>
@endsection