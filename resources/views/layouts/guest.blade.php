<!-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout> -->
<div>
    <h1><a href="/">確認メールの送信</a></h1>
    <div>
        @if (session('status') === 'verification-link-sent')
        <p>
            登録したメールアドレスを確認してください！！
        </p>
        <p><a href="/">TOPに戻る</a></p>
        @else
        <p>
            確認メールを送信してください！！
        </p>
        <form method="post" action="{{ route('verification.send') }}">
            @method('post')
            @csrf
            <div>
                <button type="submit">確認メールを送信</button>
            </div>
        </form>
        @endif
    </div>
</div>