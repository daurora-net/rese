@extends('layouts.app')
@section('content')
<x-overlay-nav-guest />
<div class="container">
    <x-header />
    <div class="main">
        <div class="auth_container">
            <p class="auth_ttl">Registration</p>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('register') }}" class="auth_form">
                @csrf
                <!-- Name -->
                <div>
                    <img src="/img/username_icon.png" alt="" class="auth_icon">
                    <x-input id="name" class="auth_input" type="text" name="name" :value="old('name')" required
                        autofocus placeholder="Username" />
                </div>
                <!-- Email Address -->
                <div class="mt-4">
                    <img src="/img/email_icon.png" alt="" class="auth_icon">
                    <x-input id="email" class="auth_input" type="email" name="email" :value="old('email')" required
                        placeholder="Email" />
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <img src="/img/password_icon.png" alt="" class="auth_icon">
                    <x-input id="password" class="auth_input" type="password" name="password" required
                        autocomplete="new-password" placeholder="Password" />
                </div>
                <x-button class="auth_btn">
                    {{ __('登録') }}
                </x-button>
            </form>
        </div>
    </div>
</div>
@endsection