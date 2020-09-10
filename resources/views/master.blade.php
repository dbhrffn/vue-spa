<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="/css/app.css">
  <title>SPA</title>
</head>
<body>

<div id="app"></div>

@if( app()->environment('local') )
  <script src="{{ mix('js/main.js') }}"></script>
@else
  <script src="{{ url('/js/main.js') }}"></script>
@endif
</body>
</html>
