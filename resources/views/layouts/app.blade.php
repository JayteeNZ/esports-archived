<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Parallel') }}</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="/icon.ico" sizes="16x16 24x24 32x32 48x48 64x64 96x96 128x128 192x192 256x256">

    <script>
    	window.Parallel = {!! json_encode([
    		'csrfToken' => csrf_token(),
    		'user' => [
    			'id' => auth()->check() ? auth()->user()->id : null,
    			'username' => auth()->check() ? auth()->user()->username : null
    		]
		]); !!};
    </script>
</head>
<body>

	<div id="app">
		<div class="page-header">
			@include ('layouts._navbar')
			@yield ('page-header')
		</div>

		<div class="content-wrapper" style="margin-bottom: 6rem">
			@yield('content')
		</div>

		@include('layouts._footer')
	</div>		
	
	<script src="{{ asset('js/socket-io.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>
	@include('sweet::alert')
	@stack('afterScripts')

	<script>
		@include('layouts._analytics')
	</script>

	{{-- @include('matches._report-scores-modal') --}}
</body>
</html>