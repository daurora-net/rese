<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Shop;
use App\Models\Reservation;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $shops = Shop::all();
        $reservations = Reservation::where('user_id', Auth::user()->id)->get();
        $reservations = $user->reservations()->whereDate('started_at', '>', Carbon::now())->orderBy('started_at', 'asc')->get();
        $def['shop_times'] = __('define.shop_times');
        $def['num'] = __('define.num');
        return view('/mypage', compact('user', 'shops', 'reservations', 'def'));
    }
    public function favorite(Shop $shop)
    {
        Auth::user()->togglefavorite($shop);
        return back();
    }
}
