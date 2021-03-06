<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
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
