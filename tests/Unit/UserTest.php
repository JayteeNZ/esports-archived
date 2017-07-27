<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /** @test **/
    public function when_a_user_registers_for_an_account_a_default_role_is_assigned()
    {
    	$user = factory('Parallel\User')->create();
    }
}
