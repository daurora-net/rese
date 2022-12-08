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
        $form = $this->unsetToken($request);
        $reserve = new Reservation;
        $reserve->fill($form)->save();
        return view('reserve/done');
    }
    public function unsetToken($request)
    {
        $form = $request->all();
        unset($form['_token']);
        return $form;
    }
    public function delete(Request $request)
    {
        Reservation::find($request->id)->delete();
        return back();
    }
}