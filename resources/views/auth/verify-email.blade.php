@extends('layouts.app')
@section('content')
<div class="container">
    <div class="main verify">
        <div class="verify_wrap">
            <p class="verify_txt">ご登録ありがとうございます。<br>
                お送りしたメールのリンクをクリックしていただき、<br>
                メールアドレス認証を行ってください。</p>
            <p class="verify_txt">※メールを受け取っていない場合は、メール再送信ボタンをクリック</p>
            @if (session('status') == 'verification-link-sent')
            <p class="verify_txt">登録されたメールアドレスに、<br>新しい確認リンクが送信されました</p>
            @endif
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn_verify">メール再送信</button>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn_verify">ログアウト</button>
            </form>
        </div>
    </div>
</div>
@endsection