<?php

use App\Channel;
use App\Subscription;
use App\User;
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
        //$this->call(UserSeeder::class);
        $user1 = factory(User::class)->create([
            'email'     => 'test1@example.com',
            'password'  => bcrypt('password')
        ]);
        $user2 =factory(\App\User::class)->create([
            'email'     => 'test2@example.com',
            'password'  => bcrypt('password')
        ]);

        $channel1 = factory(Channel::class)->create([
            'user_id'=>$user1->id,
        ]);

        $channel2 = factory(Channel::class)->create([
            'user_id'=>$user2->id,
        ]);
        $channel1->subscriptions()->create([
            'user_id'=>$user2->id,
        ]);

        $channel2->subscriptions()->create([
            'user_id'=>$user1->id,
        ]);

        factory(Subscription::class, 10000)->create([
            'channel_id'=>$channel1->id,
        ]);

        factory(Subscription::class, 10000)->create([
            'channel_id'=>$channel2->id,
        ]);


    }
}
