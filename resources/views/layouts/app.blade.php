
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Web Push Notifications')</title>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body v-cloack>
  <div id="app">
    @yield('content')
  </div>

  <!-- Scripts -->
  <script>
    window.USER = {!! Auth::check() ? Auth::user() : 'null' !!};

    window.PUSHER_OPTIONS = {
      key: '{{ config('broadcasting.connections.pusher.key') }}',
    };
  </script>
  <script src="/js/app.js"></script>
  @yield('scripts')
</body>
</html>
