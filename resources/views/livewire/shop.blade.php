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
    <h1 class="header_ttl"><a href="/"><img src="/images/logo.png" alt=""></a></h1>
  </div>
  <div class="search">
    <form action="{{ route('shop.search') }}" method="get" class="serch_form">
      @csrf
      <select name="area_id" class="search_select" id="search_select">
        <option disabled selected>All area</option>
        @foreach($areas as $area)
        <option value="{{ $area->id }}">{{ $area->name }}</option>
        @endforeach
      </select>
      <span class="search_form_bd"></span>
      <select name="genre_id" class="search_select" id="search_select">
        <option disabled selected>All genre</option>
        @foreach($genres as $genre)
        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
      </select>
      <span class="search_form_bd"></span>
      <img src="/images/search_icon.png" alt="serch_icon" class="search_input_img">
      <input type="text" class="search_input" name="name" value="{{ request()->query('name') }}" placeholder="Search..." />
    </form>
  </div>
  <div class="main shop">
    <div class="card_wrap">
      @foreach($shops as $shop)
      <div class="card">
        <img src="{{ $shop->image_url }}" alt="" class="card_img">
        <div class="card_txt">
          <p class="card_name">{{ $shop->name }}</p>
          <p class="card_area">#{{ $shop->area->name }}</p>
          <p class="card_genre">#{{ $shop->genre->name }}</p>
          <a href="{{ route('shop.detail', [ 'id'=>$shop->id ] ) }}" class="card_link">詳しく見る</a>
          @if($shop->isFavoritedBy(Auth::user()))
          <a href="{{ route('shop.favorite', $shop) }}">
            <img src="/images/like.png" class="like_icon">
          </a>
          @else
          <a href="{{ route('shop.favorite', $shop) }}">
            <img src="/images/unlike.png" class="like_icon">
          </a>
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection