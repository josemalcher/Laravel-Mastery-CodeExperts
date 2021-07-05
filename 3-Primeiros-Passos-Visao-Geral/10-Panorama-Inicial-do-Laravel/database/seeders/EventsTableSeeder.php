<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Event::factory(30)
              ->hasPhotos(4)
              ->hasCategories(3)
              ->create();
    }
}
