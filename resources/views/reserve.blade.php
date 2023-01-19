@extends('layouts.app')
@section('title', '予約詳細')
@section('content')
    <div class="container">
        <div class="main reserve">
            <b>【予約】{{ $reservation->user->name }}様</b>
            <table class="reserve_tb" border="1">
                <tr>
                    <th>店舗</th>
                    <td>{{ $reservation->shop->name }}</td>
                </tr>
                <tr>
                    <th>予約日</th>
                    <td>{{ $reservation->started_at->format('Y年m月d日 H:i') }}</td>
                </tr>
                <tr>
                    <th>人数</th>
                    <td>{{ $reservation->num_of_users }}人</td>
                </tr>
            </table>
            <div class="qr">
                {!! QrCode::generate(url('admin/reservations/' . $reservation->id)) !!}
            </div>
        </div>
    </div>
@endsection
