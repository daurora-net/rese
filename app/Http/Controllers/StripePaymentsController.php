<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Reservation;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class StripePaymentsController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        $shop = Shop::all();
        $reservation = Reservation::find($id);
        return view('payment.index', compact('user', 'shop', 'reservation'));
    }

    public function payment(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 100,
                'currency' => 'jpy'
            ));

            return redirect()->route('payment.complete');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function complete()
    {
        return view('payment/complete');
    }
}
