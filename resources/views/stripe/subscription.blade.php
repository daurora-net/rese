@extends('layouts.app')
@section('title', '有料会員登録')
@section('content')
    <x-overlay-nav-user />
    <div class="container">
        <x-header />
        <div class="main reserve">
            <script>
                window.onload = my_init;

                function my_init() {
                    const stripe = Stripe("{{ config('services.stripe.pb_key') }}");
                    const elements = stripe.elements();
                    var style = {
                        base: {
                            color: "#32325d",
                            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                            fontSmoothing: "antialiased",
                            fontSize: "16px",
                            "::placeholder": {
                                color: "#aab7c4"
                            }
                        },
                        invalid: {
                            color: "#fa755a",
                            iconColor: "#fa755a"
                        }
                    };
                    const cardElement = elements.create('card', {
                        style: style,
                        hidePostalCode: true
                    });
                    cardElement.mount('#card-element');
                    const cardHolderName = document.getElementById('card-holder-name');
                    const cardButton = document.getElementById('card-button');
                    const clientSecret = cardButton.dataset.secret;
                    cardButton.addEventListener('click', async (e) => {
                        e.preventDefault();
                        const {
                            setupIntent,
                            error
                        } = await stripe.confirmCardSetup(
                            clientSecret, {
                                payment_method: {
                                    card: cardElement,
                                    billing_details: {
                                        name: cardHolderName.value
                                    }
                                }
                            }
                        );
                        if (error) {
                            console.log('error');
                        } else {
                            stripePaymentHandler(setupIntent);
                        }
                    });
                }

                function stripePaymentHandler(setupIntent) {
                    var form = document.getElementById('payment-form');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripePaymentMethod');
                    hiddenInput.setAttribute('value', setupIntent.payment_method);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            </script>

            <div class="container">
                <h3 class="stripe_ttl">有料会員登録フォーム</h3>
                <form action="{{ route('stripe.afterpay') }}" method="post" id="payment-form">
                    @csrf
                    <label for="exampleInputEmail1">お名前</label>
                    <input type="test" class="form-control MyNameElement" id="card-holder-name" required>
                    <label for="exampleInputPassword1">カード番号</label>
                    <div class="form-group MyCardElement" id="card-element"></div>
                    <div id="card-errors" role="alert" style='color:red'></div>
                    <button class="btn_stripe" id="card-button" data-secret="{{ $intent->client_secret }}">送信する</button>
                </form>
            </div>
        </div>
    </div>
@endsection
