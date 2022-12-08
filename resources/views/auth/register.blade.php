@extends('layouts.app')
@section('content')
<div class="overlay">
  <nav class="overlay_nav">
    <ul class="overlay_ul">
      <li class="overlay_li"><a href="/" class="overlay_link">Home</a></li>
      <li class="overlay_li"><a href="/register" class="overlay_link">Registration</a></li>
      <li class="overlay_li"><a href="/login" class="overlay_link">Login</a></li>
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
    <h1 class="header_ttl"><a href="/"><img src="/img/logo.png" alt=""></a></h1>
  </div>
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
          <x-input id="name" class="auth_input" type="text" name="name" :value="old('name')" required autofocus
            placeholder="Username" />
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
          <x-input id="password" class="auth_input" type="password" name="password" required autocomplete="new-password"
            placeholder="Password" />
        </div>
        <x-button class="auth_btn">
          {{ __('登録') }}
        </x-button>
      </form>
    </div>
  </div>
</div>
@endsection