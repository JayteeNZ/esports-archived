@extends ('layouts.master')

@section('body')

	<div class="page-header">
		@include ('layouts._navbar')
		@yield ('page-header')
	</div>
	
	<div class="content-wrapper" style="margin-bottom: 6rem">
		@yield('content')
	</div>
@endsection