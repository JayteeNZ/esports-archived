<?php

namespace App\Listeners\Tournaments;

use App\Integrations\Challonge\Participant;
use App\Integrations\Challonge\Bracket;
use App\Events\Tournaments\RegistrationClosed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Tournaments\BracketsCreated;

class CreateBrackets
{
    // The iterated brackets from the for loop
    protected $bracket;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegistrationClosed  $event
     * @return void
     */
    public function handle(RegistrationClosed $event)
    {
        $bracketsToCreate = $this->calculateBrackets($event);
        $teamGroups = $this->calculateTeamGroups($event);

        for ($counter = 0; $counter < $bracketsToCreate; $counter++) 
        {
            $this->bracket = (new Bracket)->create($event->challonge, $event->tournament);
            event(new BracketsCreated($event->tournament, $this->bracket, $teamGroups[$counter]));
        }
    }

    /**
     * Calculates the amount of Brackets that needs to be created for the Tournament.
     * @return int
     */
    protected function calculateBrackets($event)
    {
        return ceil($event->tournament->teams->count() / $event->tournament->teams_per_bracket);
    }

    /**
     * Returns a collection of collections, sorted in groups for each bracket.
     * @return Collection
     */
    protected function calculateTeamGroups($event)
    {
        return $event->tournament->teams->shuffle()->chunk($event->tournament->teams_per_bracket);   
    }
}
