@extends('layouts.app')
@section('title','予約詳細')
@section('content')
<div class="container">
    <div class="main reserve">
        <p>{{$reservation->user->name}}様ご予約</p>
        <p>{{$reservation->shop->name}}</p>
    </div>
</div>
@endsection