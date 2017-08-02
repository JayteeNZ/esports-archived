<div class="cover-background" style="background-image: url(https://images7.alphacoders.com/446/thumb-1920-446471.png)">
    <div class="overlay-dark"></div>
    <div class="cover-inner">
        <div class="attached-bottom bg-black-semi-transparent py-4 px-4">
            <div class="container d-flex flex-md-row flex-column">
                <div class="tournament-info">
                    <h2 class="mb-1 text-light scale-mobile">{{ $tournament->name }}</h2>
                    <div class="mb-0 text-dark-muted font-xs letter-spacing">
                        <a href="#" class="text-light-faint">{{ $tournament->game->display_name }}</a> on 
                        <a href="#" class="text-light-faint">{{ $tournament->platform->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>