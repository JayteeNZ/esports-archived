@include('tournaments.partials.cover-show')

<nav class="tabs-underlined centered">
    <a href="{{ route('tournaments.show', $tournament) }}" class="tab {{ active("tournaments/{$tournament->id}", 'exact') }}">Information</a>
    <a href="{{ route('ruleset.show', $tournament) }}" class="tab {{ active("tournaments/{$tournament->id}/rules") }}">Ruleset</a>
    <a href="{{ route('teams.index', $tournament) }}" class="tab {{ active("tournaments/{$tournament->id}/teams", 'exact') }}">Teams</a>
    <a href="{{ route('matches.index', $tournament) }}" class="tab {{ active("tournaments/{$tournament->id}/matches") }}">Matches</a>
    <a href="{{ route('brackets.index', $tournament) }}" class="tab {{ active("tournaments/{$tournament->id}/brackets") }}">Brackets</a>
    @if (auth()->check() && ! auth()->user()->hasTeam($tournament) && !$tournament->hasCommenced())
        <a href="{{ route('teams.create', $tournament) }}" class="tab {{ active("tournaments/{$tournament->id}/teams/create", 'exact') }}">Signup</a>
    @endif
</nav>