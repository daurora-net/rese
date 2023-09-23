@extends('layouts.app')
@section('content')
    <div class="overlay">
        <nav class="overlay_nav">
            <ul class="overlay_ul">
                <li class="overlay_li"><a href="{{ url('/') }}" class="overlay_link">Home</a></li>
                <li class="overlay_li"><a href="register" class="overlay_link">Registration</a></li>
                <li class="overlay_li"><a href="login" class="overlay_link">Login</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="header">
            <div class="sp-nav">
                <div class="header_nav">
                    <span class="first-line"></span>
                    <span class="center-line"></span>
                    <span class="last-line"></span>
                </div>
            </div>
            <h1 class="header_ttl"><a href="{{ url('/') }}"><img src="{{ url('/images/logo.png') }}" alt=""></a></h1>
        </div>
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
                        <img src="images/email_icon.png" alt="" class="auth_icon">
                        <x-input id="email" class="auth_input" type="email" name="email" :value="old('email')" required
                            autofocus placeholder="Email" />
                    </div>
                    <!-- Password -->
                    <div>
                        <img src="images/password_icon.png" alt="" class="auth_icon">
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
