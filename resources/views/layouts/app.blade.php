<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | Rese</title>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/auth.css">
  <link rel="stylesheet" href="/css/modal.css">
  <link rel="stylesheet" href="/css/stripe.css" >
</head>

<body class="body">
  @yield('content')
</body>
<script src="/js/main.js"></script>
<script src="https://js.stripe.com/v3/"></script>
</html>