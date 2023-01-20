@extends('layouts.app')
@section('title', 'Top')
@section('content')
    <x-overlay-nav-user />
    <div class="container">
        <x-header />
        <div class="search">
            <form action="{{ route('shop.search') }}" method="get" class="serch_form">
                @csrf
                <select name="area_id" class="search_select" id="search_select">
                    <option disabled selected>All area</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                    @endforeach
                </select>
                <span class="search_form_bd"></span>
                <select name="genre_id" class="search_select" id="search_select">
                    <option disabled selected>All genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                <span class="search_form_bd"></span>
                <button type="submit" value="submit" class="btn_search">
                    <img src="/images/search_icon.png" alt="serch_icon">
                </button>
                <input type="text" class="search_input" name="name" value="{{ request()->query('name') }}"
                    placeholder="Search..." />
            </form>
        </div>
        <div class="main shop">
            <div class="card_wrap">
                @foreach ($shops as $shop)
                    <div class="card">
                        @if ($shop->image)
                            <img src="{{ 'storage/' . $shop->image }}" class="card_img">
                        @else
                            <img src="{{ $shop->image_url }}" alt="" class="card_img">
                        @endif
                        <div class="card_txt">
                            <p class="card_name">{{ $shop->name }}</p>
                            <p class="card_area">#{{ $shop->area->name }}</p>
                            <p class="card_genre">#{{ $shop->genre->name }}</p>
                            <a href="{{ route('shop.detail', ['id' => $shop->id]) }}" class="card_link">詳しく見る</a>
                            @if ($shop->isFavoritedBy(Auth::user()))
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
