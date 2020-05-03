<?php

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
        factory(\App\User::class)->create([
            'email'     => 'test1@example.com',
            'password'  => bcrypt('password')
        ])->channel()->create(['name'=>'test1']);
        factory(\App\User::class)->create([
            'email'     => 'test2@example.com',
            'password'  => bcrypt('password')
        ])->channel()->create(['name'=>'test2']);

    }
}
