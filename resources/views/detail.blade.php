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
        <input type="hidden" name="name" value="{{ $shop->name }}" />
        <input type="date" name="date" class="resarve_input_date" />
        @error('date')
        <span class="error_message" id="Error-date">{{ $message }}</span>
        @enderror
        <select name="time" class="time_select">
          <option selected>17:00</option>
          <option>18:00</option>
          <option>19:00</option>
          <option>20:00</option>
        </select>
        <select name="num_of_users" class="num_select">
          <option selected value="1">1人</option>
          <option value="2">2人</option>
          <option value="3">3人</option>
          <option value="4">4人</option>
          <option value="5">5人</option>
        </select>
        <div class="reserves_result">
          <table class="reserves_result_tb">
            <tr>
              <th>Shop</th>
              <td>{{ $shop->name }}</td>
            </tr>
            <tr>
              <th>Date</th>
              <td>{{ old('date') }}</td>
            </tr>
            <tr>
              <th>Time</th>
              <td>{{ old('time') }}</td>
            </tr>
            <tr>
              <th>Number</th>
              <td>{{ old('num_of_users') }}人</td>
            </tr>
          </table>
        </div>
        <button type="submit" class="resarve_btn">予約する</button>
      </form>
    </div>
  </div>
</div>
@endsection