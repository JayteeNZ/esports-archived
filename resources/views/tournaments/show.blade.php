@extends('layouts.app')

@section('page-header')
    
    <!-- Page Cover -->
    @include('tournaments.partials.cover-show')

    <!-- Page Navigation -->
    <nav class="tabs-underlined centered">
        <a href="#information" class="tab active" data-toggle="tab">Information</a>
        <a href="#ruleset" class="tab" data-toggle="tab">Ruleset</a>
        <a href="#teams" class="tab" data-toggle="tab">Teams</a>
        <a href="#matches" class="tab" data-toggle="tab">Matches</a>
    </nav>
@stop

@section('content')
    <div class="container clears-nav">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="information">
                @include('tournaments.pages.information')
            </div>
            <!-- Tournament Ruleset -->
            <div class="tab-pane fade" id="ruleset">
                @include('tournaments.pages.ruleset')
            </div>
            <!-- Tournament Teams -->
            <div class="tab-pane fade" id="teams">
                @include('tournaments.pages.teams')
            </div>
            <!-- Tournament Matches -->
            <div class="tab-pane fade" id="matches">
                @include('tournaments.pages.matches')
            </div>
        </div>
    </div>
@stop