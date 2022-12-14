@extends('layouts.app')
@section('content')
<div class="overlay">
  <nav class="overlay_nav">
    <ul class="overlay_ul">
      <li class="overlay_li"><a href="/" class="overlay_link">Home</a></li>
      <li class="overlay_li">
        <form method="post" action="/logout">
          @csrf
          <input class="overlay_link" type="submit" value="Logout">
        </form>
      </li>
      <li class="overlay_li"><a href="/mypage" class="overlay_link">Mypage</a></li>
    </ul>
  </nav>
</div>
<div class="container">
  <div class="header">
    <div class="sp-nav">
      <div class="header_nav">
        <span class="first-line"></span>
        <span class="center-line"></span>
        <span class="last-line"></span>
      </div>
    </div>
    <h1 class="header_ttl"><a href="/"><img src="/img/logo.png" alt=""></a></h1>
  </div>
  <div class="main thanks">
    <div class="thanks_wrap">
      <p class="thanks_txt">ご予約ありがとうございます</p>
      <input value="戻る" onclick="history.back();" type="button" class="btn_done">
    </div>
  </div>
</div>
@endsection