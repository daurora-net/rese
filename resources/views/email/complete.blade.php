@component('mail::message')
# Reseよりご案内
{{ $user->name }}様<br>

いつもお世話になっております。<br>
お気に入りのお店をチェックしてみませんか。<br>
是非ご利用ください。

@component('mail::button', ['url' => route('shop.mypage')])
マイページへ
@endcomponent

@endcomponent