<?php

namespace App\Rules;

use App\Models\Tournament;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class MustHaveAnAssociatedGameAccount implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Tournament $tournament)
    {
        $this->tournament = $tournament;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = User::where('username', $value)->first();
        $field = "account_" . $this->tournament->platform->name;
        return ! empty($user->profile->{$field});
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'That player does not have a Gamertag on their account.';
    }
}
