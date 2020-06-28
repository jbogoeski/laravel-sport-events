<?php

use App\User;
use App\Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        {
            $users = factory(User::class, 10)
            ->create();
    
    
            $events = factory(Event::class, 10)
            ->make()
            ->each(function($event) use ($users){
                $event->event_id = $users->random()->id;
                $event->save();
            });
    
    
            }    }
}
