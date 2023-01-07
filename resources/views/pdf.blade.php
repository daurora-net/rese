@extends('layouts.app')
@section('title','予約詳細')
@section('content')
<style>
@font-face {
    font-family: ipag;
    font-style: normal;
    font-weight: normal;
    src:url('{{ storage_path('fonts/ipag.ttf')}}');
}

body {
    font-family: ipag;
}
</style>
<div class="container">
    <div class="main reserve">
        <b>{{$reservation->user->name}}様ご予約</b>
        <table class="reserve_tb" border="1">
            <tr>
                <th>店舗</th>
                <td>{{ $reservation->shop->name }}</td>
            </tr>
            <tr>
                <th>予約日</th>
                <td>{{ $reservation->started_at->format('Y年m月d日H:i')}}</td>
            </tr>
            <tr>
                <th>Number</th>
                <td>{{ $reservation->num_of_users }}人</td>
            </tr>
        </table>
    </div>
</div>
@endsection