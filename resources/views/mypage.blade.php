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
    <div class="card_header">
        <p class="user_name">{{ $user->name }}さん</p>
    </div>
    <div class="main mypage">
        <div class="my_reserve_wrap">
            <h2>予約状況</h2>
            @foreach($reservations as $key=>$reservation)
            <div class="reserves_card">
                <div class="reserves_card_top">
                    <img src="/img/time_icon.png" alt="" class="reserves_card_time">
                    <p class="reserves_card_top_txt">予約 {{$key+1}}</p>
                    <form action="{{ route('reserve.delete', ['id' => $reservation->id]) }}" method="post">
                        @csrf
                        <button class="btn_reserve_delete">
                            <img src="/img/close_icon.png" alt="" class="reserves_card_close">
                        </button>
                    </form>
                </div>
                <form action="{{ route('reserve.update', ['id' => $reservation->id]) }}" method="post">
                    @csrf
                    <table class="reserves_card_tb">
                        <tr>
                            <th>Shop</th>
                            <td>{{ $reservation->shop->name }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>
                                <input type="date" name="date" class="update_input_date"
                                    value="{{ old('started_at',\Carbon\Carbon::parse($reservation->started_at)->format('Y-m-d')) }}" />
                                @error('started_at')
                                <span class="error_message d_block" id="Error-date">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>
                                <select name="time" class="update_time_select" id="time_select">
                                    <!-- <option value="{{ $reservation->id }}" @if(old('reservation_id')==$reservation->id) selected @endif></option> -->
                                    <option value="{{ old('started_at',$reservation->started_at->format('H:i')) }}">
                                        {{ old('started_at',$reservation->started_at->format('H:i')) }}
                                    </option>
                                </select>

                                <select name="time" class="update_time_select" id="time_select">
                                    @foreach(range(0, 59, 15) as $started_at)
                                    {{ old('started_at') == $started_at ? 'selected' : '' }}
                                    <option value="{{ $started_at }}" @if ($started_at==$started_at) selected @endif>
                                        {{ $started_at }}
                                    </option>
                                    @endforeach
                                </select>


                                <select name="time" class="update_time_select" id="time_select">
                                    @for ($i = 17; $i <= 21; $i++) <option value="{{ $i }}" @if(old('started_at')=="$i"
                                        ) selected @endif>{{ $i }}
                                        </option>
                                        @endfor
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <th>Number</th>
                            <td>
                                <select name="num_of_users" class="update_num_select" id="num_select">
                                    <option value="{{ old('num_of_users',$reservation->num_of_users) }}">
                                        {{ $reservation->num_of_users }}人
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <button type="submit" class="btn btn-update">変更</button>
                            </td>
                        </tr>
                </form>
                </table>
            </div>
            @endforeach
        </div>
        <div class="my_like_wrap">
            <h2>お気に入り店舗</h2>
            <div class="card_wrap mypage_card_wrap">
                @foreach($shops as $shop)
                @if($shop->isFavoritedBy(Auth::user()))
                <div class="card mypage_card">
                    <img src="{{ $shop->image_url }}" alt="" class="card_img">
                    <div class="card_txt">
                        <p class="card_name">{{ $shop->name }}</p>
                        <p class="card_area">#{{ $shop->area->name }}</p>
                        <p class="card_genre">#{{ $shop->genre->name }}</p>
                        <a href="{{ route('shop.detail', [ 'id'=>$shop->id ] ) }}" class="card_link">詳しく見る</a>
                        <a href="{{ route('shop.favorite', $shop) }}">
                            <img src="/img/like.png" class="like_icon">
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection