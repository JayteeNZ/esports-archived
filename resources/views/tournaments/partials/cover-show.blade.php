<div class="cover-background" style="background-image: url(https://images7.alphacoders.com/446/thumb-1920-446471.png)">
    <div class="overlay-dark"></div>
    <div class="cover-inner">
        <div class="attached-bottom bg-black-semi-transparent py-4 px-4">
            <div class="container d-flex flex-md-row flex-column justify-content-md-between">
                <div class="tournament-info">
                    <h2 class="mb-1 text-light scale-mobile">{{ $tournament->name }}</h2>
                    <div class="mb-0 text-dark-muted font-xs letter-spacing">
                        <a href="#" class="text-light-faint">INFINITE WARFARE</a> on 
                        <a href="#" class="text-light-faint">XBOX ONE</a>
                    </div>
                </div>
                <div class="align-self-md-center mt-3 mt-md-0">
                    @if (auth()->check())
                        <a href="#" class="btn btn-primary align-self-center" style="max-width: 120px">Register</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>