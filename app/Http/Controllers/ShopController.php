<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;

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
        // $reservations = Reservation::where('user_id', $user->id)->get();
        $reservations = Reservation::all();
        $reservations = $shop->reservations()->whereDate('started_at', '>', Carbon::now())->orderBy('started_at', 'asc')->get();
        $age_data = [
            'young' => '10代～20代',
            'middle' => '30代～50代',
            'senior' => '60代以上'
        ];
        return view('detail', compact('user', 'shop', 'reservations', 'age_data'));
    }
    public function favorite(Shop $shop)
    {
        Auth::user()->togglefavorite($shop);
        return back();
    }
}
