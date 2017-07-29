@extends('layouts.app')

@section('content')
	<div class="flex align-items-center flex-column justify-content-center" style="height: 100vh;">
		<register-team :tournament="{{ $tournament->toJson() }}"></register-team>
	</div>
@stop