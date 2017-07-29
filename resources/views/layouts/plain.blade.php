<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Parallel') }}</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="icon" href="/icon.ico" sizes="16x16 24x24 32x32 48x48 64x64 96x96 128x128 192x192 256x256">
    </head>
    <body class="{{ isset($body) ? $body : '' }}">
		<div id="app">
			<div class="content-wrapper">
				@yield('content')
			</div>
		</div>		
		
		<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>