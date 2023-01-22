<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $review = new Review();
        $review->score = $request->input('score');
        $review->comment = $request->input('comment');
        $review->shop_id = $request->input('shop_id');
        $review->reservation_id = $request->input('reservation_id');
        $review->user_id = Auth::user()->id;
        $review->save();
        return back();
    }
}
