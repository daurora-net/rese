@component('mail::message')
# Reseよりご案内
{{ $name }}様

{{ $content }}

@component('mail::button', ['url' => route('shop.mypage')])
    マイページへ
@endcomponent

Rese運営
@endcomponent
