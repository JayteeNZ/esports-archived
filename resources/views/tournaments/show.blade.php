@extends('layouts.app')

@section('page-header')
    @include('tournaments.partials._tournament-header')
@stop

@section('content')
    <div class="container clears-nav">
        <div class="row">
            <div class="col-md-8">
                <section class="content-block">
                    <h3>Information</h3>
                    <p>Team registrations close 5 minutes prior to the Tournament commencing</p>
                    <table class="table">
                        <tr>
                            <th>Commences at:</th>
                            <td>{{ $tournament->starts_at->format('D jS M, Y - h:i A') }} NZT</td>
                        </tr>
                        <tr>
                            <th>Registrations</th>
                            <td>{{ $tournament->getRegistrationStatus() }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $tournament->getStatus() }}</td>
                        </tr>
                    </table>
                </section>
                <section class="content-block">
                    <h3>Schedule</h3>
                    <table class="table">
                        @for ($i = 1; $i <= $tournament->getRounds(); $i++)
                        <tr>
                            <th>Round {{ $i }}</th>
                            <td>{{ $tournament->starts_at->addHours($i - 1)->format('h:i A') }}</td>
                        </tr>
                        @endfor
                    </table>
                </section>
                <section class="content-block">
                    <h3>Support</h3>
                    <p>
                        If you require support for your match, you may send us a message via our Live Support system. Please provide your Match ID on request.
                    </p>
                    <p>
                        For all other enquiries, please Email us: <em>support@playparallel.com</em>
                    </p>
                </section>
            </div>
        </div>
    </div>
@stop