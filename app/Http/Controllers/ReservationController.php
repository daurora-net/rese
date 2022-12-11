<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use App\Http\Requests\ReserveRequest;

class ReservationController extends Controller
{
    public function create(ReserveRequest $request)
    {
        // $user = Auth::user();
        // $form = $request->all();
        // unset($form['_token']);
        // $reserve = new Reservation;
        // $request->user_id = $request->user()->id;
        // $reserve->user_id = Auth::id();
        // Reservation::create($form);
        // $reserve->fill($form)->save();
        // $shop = Reservation::with(['user', 'shop'])->find($reserve->id);
        // $user = Auth::user();
        // $reserve = Reservation::find($request->id);
        // $form = $this->unsetToken($request);
        // $reserve->fill($form)->save();
        // Reservation::find($request->id)->cerate();
        // $reserve = Reservation::find($request->id);
        // $reserve = new Reservation;
        // if ($reserve->user->id !== $user->id) return back();
        // $date = strtotime($request->input('date'));
        // dd($request->all());
        // $user = Auth::user();
        // $reserve = $user->reserve;
        $reserve = Reservation::create($request->all());
        $form = $request->all();
        unset($form['_token']);
        return view('done', compact('reserve'));
    }
    public function delete(Request $request)
    {
        Reservation::find($request->id)->delete();
        return back();
    }
}
