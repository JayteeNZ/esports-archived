<div class="tournament" data-platform="xbox">
    <div class="tournament-image" style="background-image: url(https://psmedia.playstation.com/is/image/psmedia/call-of-duty-ghosts-listing-thumb-01-ps4-eu-03nov14?$Icon$)">
        <div class="overlay-dark-soft"></div>
        <div class="tags">
            <span class="badge badge-purple">Xbox One</span>
            <span class="badge badge-purple">4v4</span>
        </div>
    </div>
    <div class="information">
        <h3 class="tournament-name text-dark">
            <a href="/tournaments/{{ $tournament->id }}">{{ $tournament->name }}</a>
        </h3>
        <div class="text-light-muted font-sm letter-spacing text-uppercase d-inline-flex justify-content-between">
            <div>
                <span>{{ $tournament->game->display_name }}</span>
                &mdash;
                <span class="font-xs">{{ $tournament->starts_at->format('jS M h:i a') }}</span>
            </div>
        </div>
    </div>
</div>