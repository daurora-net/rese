<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Reservation;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $shops = Shop::all();
        $reservations = Reservation::all();
        return view('/mypage', compact('user', 'shops', 'reservations'));
    }
    public function favorite(Shop $shop)
    {
        Auth::user()->togglefavorite($shop);
        return back();
    }
}