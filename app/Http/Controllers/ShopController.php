<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $reserves = Reservation::all();
        return view('index', compact('user', 'shops', 'reserves', 'areas', 'genres'));
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
        $shop = Shop::find($id);
        return view('detail', compact('shop'));
    }
    public function favorite(Shop $shop)
    {
        Auth::user()->togglefavorite($shop);
        return back();
    }
}