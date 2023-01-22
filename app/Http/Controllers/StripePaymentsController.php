<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripePaymentsController extends Controller
{
    public function subscription(Request $request)
    {
        $user = Auth::user();
        return view('stripe.subscription',  [
            'intent' => $user->createSetupIntent()
        ]);
    }
    public function afterpay(Request $request)
    {
        $user = Auth::user();
        $stripeCustomer = $user->createOrGetStripeCustomer();
        $paymentMethod = $request->input('stripePaymentMethod');
        $plan = config('services.stripe.basic_plan_id');
        $user->newSubscription('default', $plan)
            ->create($paymentMethod);
        return redirect()->route('shop.mypage');
    }
}
