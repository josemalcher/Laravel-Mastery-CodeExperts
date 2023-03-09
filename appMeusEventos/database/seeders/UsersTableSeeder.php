<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)
            ->has(
                Event::factory(6)
                ->hasPhotos(4)
                ->hasCategories(3)
            )
            ->hasProfile()
            ->create();
    }
}
