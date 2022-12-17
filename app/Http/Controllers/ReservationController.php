<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use App\Http\Requests\ReserveRequest;

class ReservationController extends Controller
{
    public function mypage($id)
    {
        $user = Auth::user();
        $shop = Shop::find($id);
        // $reservations = Reservation::where('user_id', $user->id)->get();
        $reservations = Reservation::all();
        $reservations = $shop->reservations()->whereDate('started_at', '>', Carbon::now())->orderBy('started_at', 'asc')->get();
        return view('mypage', compact('user', 'shop', 'reservations'));
    }
    public function create(ReserveRequest $request)
    {
        $reservations = Reservation::create($request->all());
        $form = $request->all();
        unset($form['_token']);
        return view('done', compact('reservations'));
    }
    public function update(ReserveRequest $request)
    {
        // dd($request->all());
        // dd($request->id);
        $form = $request->all();
        unset($form['_token']);
        $reservations = Reservation::find($request->id);
        $reservations->fill($form)->save();
        return back();
    }
    public function delete(Request $request)
    {
        Reservation::find($request->id)->delete();
        return back();
    }
}
