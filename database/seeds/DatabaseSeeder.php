<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Platform::class, 3)->create();
        factory(App\Authorization\Role::class)->states('member')->create();
        factory(App\Game::class, rand(0, 4))->create();
    }
}
