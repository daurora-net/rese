<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\User;
use App\Models\Reservation;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Laravel\Cashier\Cashier;

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
        // ログインユーザーを$userとする
        $user = Auth::user();

        // またStripe顧客でなければ、新規顧客にする
        $stripeCustomer = $user->createOrGetStripeCustomer();

        // フォーム送信の情報から$paymentMethodを作成する
        $paymentMethod = $request->input('stripePaymentMethod');

        // プランはconfigに設定したbasic_plan_idとする
        $plan = config('services.stripe.basic_plan_id');

        // 上記のプランと支払方法で、サブスクを新規作成する
        $user->newSubscription('default', $plan)
            ->create($paymentMethod);

        // 処理後に'ルート設定'にページ移行
        return redirect()->route('shop.mypage');
    }
    // public function index($id)
    // {
    //     $user = Auth::user();
    //     $shop = Shop::all();
    //     $reservation = Reservation::find($id);
    //     return view('payment.index', compact('user', 'shop', 'reservation'));
    // }

    // public function payment(Request $request)
    // {
    //     try {
    //         Stripe::setApiKey(env('STRIPE_SECRET'));

    //         $customer = Customer::create(array(
    //             'email' => $request->stripeEmail,
    //             'source' => $request->stripeToken
    //         ));

    //         $charge = Charge::create(array(
    //             'customer' => $customer->id,
    //             'amount' => 1000,
    //             'currency' => 'jpy'
    //         ));
    //         return back();
    //     } catch (\Exception $ex) {
    //         return $ex->getMessage();
    //     }
    // }
}
