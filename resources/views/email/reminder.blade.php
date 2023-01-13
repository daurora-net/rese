@component('mail::message')
# 予約日のご案内
{{$user->name}}様

本日は予約日です。ご確認ください。

@component('mail::button', ['url' => route('shop.mypage')])
予約を確認する
@endcomponent

@endcomponent