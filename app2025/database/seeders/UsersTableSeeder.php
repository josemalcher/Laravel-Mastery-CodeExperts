<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User::factory(10)->create();
//        User::factory(50)
//            ->hasProfile()
//            ->create();
        User::factory(50)
            ->has(
                Event::factory(30)
                    ->hasPhotos(4)
                    ->hasCategories(3)
            )
            ->hasProfile()
            ->create();
    }
}
