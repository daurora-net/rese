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
  <div class="main detail">
    <div class="detail_shop_wrap">
      <div class="detail_shop_top">
        <button id="btn_back" class="btn_back">﹤</button>
        <p class="detail_shop_name">{{ $shop->name }}</p>
      </div>
      <img src="{{ $shop->image_url }}" alt="" class="detail_shop_img">
      <p class="detail_area">#{{ $shop->area->name }}</p>
      <p class="detail_genre">#{{ $shop->genre->name }}</p>
      <p class="detail_overview">{{ $shop->overview }}</p>
    </div>
    <div class="detail_reserve_wrap">
      <p class="detail_resarve_ttl">予約</p>
      <form action="{{ route('reserve.create') }}" method="post" class="detail_resarve_form">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}" />
        <input type="hidden" name="shop_id" value="{{ $shop->id }}" />
        <input type="date" name="date" class="resarve_input_date" />
        @error('started_at')
        <span class="error_message" id="Error-date">{{ $message }}</span>
        @enderror
        <select name="time" class="time_select" id="time_select"></select>
        <select name="num_of_users" class="num_select" id="num_select"></select>
        <div class="reserves_result">
          @foreach($reservations as $reservation)
          <table class="reserves_result_tb">
            <tr>
              <th>Shop</th>
              <td>{{ $reservation->shop->name }}</td>
            </tr>
            <tr>
              <th>Date</th>
              <td>{{ \Carbon\Carbon::parse($reservation->started_at)->format('Y-m-d')}}</td>
            </tr>
            <tr>
              <th>Time</th>
              <td>{{ \Carbon\Carbon::parse($reservation->started_at)->format('H:i') }}</td>
            </tr>
            <tr>
              <th>Number</th>
              <td>{{ $reservation->num_of_users }}人</td>
            </tr>
          </table>
          @endforeach
        </div>
        <button type="submit" class="resarve_btn">予約する</button>
      </form>
    </div>
  </div>
</div>
@endsection