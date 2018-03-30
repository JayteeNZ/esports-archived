<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Tournaments\RegistrationClosed' => [
            'App\Listeners\Tournaments\UpdateRegistrationAbility',
            'App\Listeners\Tournaments\CreateBrackets'
        ],
        'App\Events\Tournaments\BracketsCreated' => [
            'App\Listeners\Tournaments\UpdateInternalBrackets',
            'App\Listeners\Tournaments\AddParticipantsToBrackets',
        ],
        'App\Events\Tournaments\ParticipantsAddedToBracket' => [
            'App\Listeners\Tournaments\UpdateInternalParticipants',
            'App\Listeners\Tournaments\StartBrackets'
        ],
        'App\Events\Tournaments\BracketsStarted' => [
            'App\Listeners\Tournaments\RetrieveMatches'
        ],
        'App\Events\Tournaments\MatchesRetrieved' => [
            'App\Listeners\Tournaments\UpdateInternalMatches'
        ],
        'App\Events\Tournaments\InsufficientTeamsRegistered' => [
            'App\Listeners\Tournaments\DeleteTournament'
        ],
        'App\Events\Tournaments\TournamentStarted' => [
            'App\Listeners\Tournaments\SetStatusToCommenced'
        ],
        'App\Events\Account\UserHasRegistered' => [
            'App\Listeners\Account\AttachDefaultRole',
            'App\Listeners\Account\CreateProfile',
            'App\Listeners\Account\CreateStatistics'
        ],
        'App\Events\Match\ScoreReported' => [
            'App\Listeners\Match\SetMatchStatus'
        ],
        'App\Events\Match\BothTeamsHaveReported' => [
            'App\Listeners\Match\CompareScoresAndReport'
        ],
        'App\Events\Match\ScoreCalculationsComplete' => [
            'App\Listeners\Match\SetStatusToComplete',
            'App\Listeners\Match\UpdateScoresOnChallonge'
        ],
        'App\Events\Match\MatchDisputed' => [
            'App\Listeners\Match\SetStatusToDisputed',
            'App\Listeners\Notifications\NotifyStaffOfDispute'
        ],
        'App\Events\Tournaments\ChallongeUpdated' => [
            'App\Listeners\Tournaments\SearchForNewMatches'
        ],
        'App\Events\Comments\MatchCommentCreated' => [

        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
