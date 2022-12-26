<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Shop;
use App\Models\Review;
use App\Models\Reservation;
use App\Http\Requests\ShopRequest;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function show($id)
    {
        $shop = Shop::find($id);
        $reservations = Reservation::all();
        $reviews = Review::all();
        // $reviews = $shop->reservations()->whereDate('started_at', '<', Carbon::now())->orderBy('started_at', 'asc')->get();

        return view('detail', compact('reservations', 'reviews'));
    }
    public function store(Request $request)
    {
        $review = new Review();
        $review->score = $request->input('score');
        $review->comment = $request->input('comment');
        $review->reservation_id = $request->input('reservation_id');
        $review->user_id = Auth::user()->id;
        $review->save();
        return back();
    }
}