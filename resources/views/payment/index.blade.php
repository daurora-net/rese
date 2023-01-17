@extends('layouts.app')
@section('title','Payment')
@section('content')
<x-overlay-nav-user />
<div class="container">
  <x-header />
  <div class="main reserve">
    <b>【予約】{{$reservation->user->name}}様</b>
    <table class="reserve_tb" border="1">
      <tr>
        <th>店舗</th>
        <td>{{ $reservation->shop->name }}</td>
      </tr>
      <tr>
        <th>予約日</th>
        <td>{{ $reservation->started_at->format('Y年m月d日 H:i')}}</td>
      </tr>
      <tr>
        <th>人数</th>
        <td>{{ $reservation->num_of_users }}人</td>
      </tr>
    </table>
    <div class="qr">
      <form action="{{ asset('payment') }}" method="POST">
        @csrf
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ env('STRIPE_KEY') }}" data-amount="100" data-name="Stripe決済デモ" data-label="決済をする" data-description="これはデモ決済です" data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="JPY">
        </script>
      </form>
    </div>
  </div>
</div>
@endsection