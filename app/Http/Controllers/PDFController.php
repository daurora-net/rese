<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\shop;
use PDF;

class PDFController extends Controller
{
    public function show($id)
    {
        $user = Auth::user();
        $shop = Shop::all();
        $reservation = Reservation::find($id);
        $pdf = PDF::loadView('pdf', compact('user', 'shop', 'reservation'));
        return $pdf->stream();
        // return view('reserve', compact('user', 'shop', 'reservation'));
    }
}