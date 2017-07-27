<?php

namespace Tests\Feature\Builders;

use Tests\TestCase;
use Parallel\Platform;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePlatformTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function a_platform_can_be_created()
    {
    	$platform = create(Platform::class);
    	
    	$this->assertDatabaseHas('platforms', ['id' => $platform->id]);
    }
}
