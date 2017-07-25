@extends('layouts.app')

@section('page-header')
    
    <!-- Page Cover -->
    @include('tournaments.partials.cover-index')

    <!-- Page Navigation -->
    <nav class="tabs-underlined centered">
        <a href="#" class="tab active">ALL</a>
        <a href="#" class="tab">Xbox</a>
        <a href="#" class="tab">PS4</a>
        <a href="#" class="tab">PC</a>
    </nav>
@endsection

@section('content')
<div class="container clears-nav">
    <transition name="fade">
        @if (count($tournaments))
            <div class="row">
                @foreach($tournaments as $tournament)
                    <div class="col-lg-4 col-md-6">
                        @include('partials._tournament')
                    </div>
                @endforeach
            </div>
        @else
            <p>Looks like no Tournaments are scheduled.</p>
        @endif
    </transition>
</div>
@stop