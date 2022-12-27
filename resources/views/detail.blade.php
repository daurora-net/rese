@extends('layouts.app')
@section('title'){{ $shop->name }}@endsection
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
            <div class="review_result">
                <h3 class="review_result_ttl">レビュー</h3>
                @foreach($reviews as $review)
                <div class="review_result_box">
                    <p class="review_score">{{ str_repeat('★', $review->score) }}</p>
                    <p class="review_date">{{ $review->reservation->started_at->format('Y/m/d/H:i') }} 訪問</p>
                    <p class="review_comment">{{$review->comment}}</p>
                </div>
                @endforeach
            </div>
            <div class="review_form_wrap">
                @foreach($review_src as $reservation)
                <form method="POST" action="{{ route('reviews.store') }}" class="review_form">
                    @csrf
                    <p class="review_form_ttl">【{{$shop->name}}】{{$reservation->started_at->format('Y年m月d日H:i')}}
                        訪問のレビューを追加</p>
                    <p class="review_form_txt">評価</p>
                    <select name="score" class="review_score">
                        <option value="5" class="review_score">★★★★★</option>
                        <option value="4" class="review_score">★★★★</option>
                        <option value="3" class="review_score">★★★</option>
                        <option value="2" class="review_score">★★</option>
                        <option value="1" class="review_score">★</option>
                    </select>
                    <p class="review_form_txt">コメント</p>
                    <textarea name="comment" class="form_comment"></textarea>
                    <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
                    <button type="submit" class="btn btn_review">追加</button>
                </form>
                @endforeach
            </div>
        </div>
        <div class="detail_reserve_wrap">
            <h3 class="detail_resarve_ttl">予約</h3>
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
                            <td>{{ $reservation->started_at->format('Y-m-d')}}</td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>{{ $reservation->started_at->format('H:i') }}</td>
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