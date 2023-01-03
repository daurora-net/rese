@extends('layouts.app')
@section('content')
<x-overlay-nav-guest />
<div class="container">
    <x-header />
    <div class="main">
        <div class="auth_container">
            <p class="auth_ttl">Login</p>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('login') }}" class="auth_form">
                @csrf
                <!-- Email Address -->
                <div>
                    <img src="/img/email_icon.png" alt="" class="auth_icon">
                    <x-input id="email" class="auth_input" type="email" name="email" :value="old('email')" required
                        autofocus placeholder="Email" />
                </div>
                <!-- Password -->
                <div>
                    <img src="/img/password_icon.png" alt="" class="auth_icon">
                    <x-input id="password" class="auth_input" type="password" name="password" required
                        autocomplete="current-password" placeholder="Password" />
                </div>
                <x-button class="auth_btn">
                    {{ __('ログイン') }}
                </x-button>
            </form>
        </div>
    </div>
</div>
@endsection