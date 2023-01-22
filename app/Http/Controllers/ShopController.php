<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use App\Models\Review;

class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        $reservations = Reservation::get();
        return view(
            'index',
            compact('user', 'shops', 'reservations', 'areas', 'genres')
        );
    }
    public function search(Request $request)
    {
        $user = Auth::user();
        $areas = Area::all();
        $genres = Genre::all();
        $keyword = $request['name'];
        $area_id = $request['area_id'];
        $genre_id = $request['genre_id'];
        $shops = Shop::doSearch($keyword, $area_id, $genre_id);
        return view('index', compact('user', 'shops', 'areas', 'genres'));
    }
    public function detail($id)
    {
        $user = Auth::user();
        $shop = Shop::find($id);
        // 未来の予約のみ表示
        $reservations = $shop->reservations()->whereDate('started_at', '>', Carbon::now())
            ->orderBy('started_at', 'asc')->where('user_id', Auth::user()->id)->get();
        // 過去の予約のみ表示
        $review_src = $shop->reservations()->whereDate('started_at', '<', Carbon::now())
            ->whereRaw(" NOT id IN ( select reservation_id from reviews where shop_id = {$shop->id} ) ")
            ->orderBy('started_at', 'asc')->where('user_id', Auth::user()->id)->get();
        $reviews = Review::all();
        $reviews = $shop->reviews()->orderBy('created_at', 'asc')->get();
        return view('detail', compact('user', 'shop', 'reservations', 'reviews', 'review_src'));
    }
    public function favorite(Shop $shop)
    {
        Auth::user()->togglefavorite($shop);
        return back();
    }
}
