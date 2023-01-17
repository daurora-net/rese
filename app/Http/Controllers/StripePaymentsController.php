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
            Stripe::setApiKey(env('STRIPE_SECRET')); //①

            //ここで顧客情報を登録②
            $customer = Customer::create(
                array(
                    'email' => $request->stripeEmail,
                    'source' => $request->stripeToken
                )
            );

            dump($customer);
            dump($customer->id);
            //お支払い処理③
            $charge = Charge::create(
                array(
                    'customer' => $customer->id,
                    'amount' => 100,
                    'currency' => 'jpy',
                )
            );
            // dump($charge);
            // dump($charge->source->id);
            // dump($charge->source->brand);
            // dump($charge->source->last4);
            // dump($charge->source->exp_month);
            // dump($charge->source->exp_year);

            return "COMPLETE";
        } catch (Exception $e) {

            return $e->getMessage();
        }
    }
}
