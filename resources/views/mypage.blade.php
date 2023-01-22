@extends('layouts.app')
@section('title', 'Mypage')
@section('content')
    <x-overlay-nav-user />
    <div class="container">
        <x-header />
        <div class="card_header">
            <p class="user_name">{{ $user->name }}さん</p>
            @if (isset($user->stripe_id))
                <a href="" disabled="disabled" class="btn_stripe_link_done" style="pointer-events: none;">有料会員登録済み</a>
            @else
                <a href="{{ route('stripe.subscription') }}" class="btn_stripe_link">有料会員登録へ</a>
            @endif
        </div>
        <div class="main mypage">
            <div class="my_reserve_wrap">
                <h2>予約状況</h2>
                @foreach ($reservations as $key => $reservation)
                    <div class="reserves_card">
                        <div class="reserves_card_top">
                            <img src="/images/time_icon.png" alt="" class="reserves_card_time">
                            <p class="reserves_card_top_txt">予約 {{ $key + 1 }}</p>
                            <form action="{{ route('reserve.delete', ['id' => $reservation->id]) }}" method="post">
                                @csrf
                                <button class="btn_reserve_delete">
                                    <img src="/images/close_icon.png" alt="" class="reserves_card_close">
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
                                        <input type="date" name="date[{{ $key }}]" class="update_input_date"
                                            value="{{ old('started_at', $reservation->started_at->format('Y-m-d')) }}" />
                                        @error("started_at.$key")
                                            <span class="error_message d_block" id="Error-date">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td>
                                        <select name="time" class="update_time_select">
                                            @foreach (__('define.shop_times') as $i => $v)
                                                <option value="{{ $i }}"
                                                    @if ($i == old('started_at', $reservation->started_at->format('H:i'))) selected @endif>
                                                    {{ $v }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Number</th>
                                    <td>
                                        <select name="num_of_users" class="update_num_select">
                                            @foreach (__('define.num') as $i => $v)
                                                <option value="{{ $i }}"
                                                    @if ($i == old('num_of_users', $reservation->num_of_users)) selected @endif>
                                                    {{ $v }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <button type="submit" class="btn btn-update">変更</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <a href="{{ route('reserve.show', ['id' => $reservation->id]) }}" class="btn_qr"
                            target="_blank">QRコード表示</a>
                    </div>
                @endforeach
            </div>
            <div class="my_like_wrap">
                <h2>お気に入り店舗</h2>
                <div class="card_wrap mypage_card_wrap">
                    @foreach ($shops as $shop)
                        @if ($shop->isFavoritedBy(Auth::user()))
                            <div class="card mypage_card">
                                <img src="{{ $shop->image_url }}" alt="" class="card_img">
                                <div class="card_txt">
                                    <p class="card_name">{{ $shop->name }}</p>
                                    <p class="card_area">#{{ $shop->area->name }}</p>
                                    <p class="card_genre">#{{ $shop->genre->name }}</p>
                                    <a href="{{ route('shop.detail', ['id' => $shop->id]) }}" class="card_link">詳しく見る</a>
                                    <a href="{{ route('shop.favorite', $shop) }}">
                                        <img src="/images/like.png" class="like_icon">
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
