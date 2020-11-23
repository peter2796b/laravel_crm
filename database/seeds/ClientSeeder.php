<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Client::class, 15)->create()->each(function ($client) {
            $client->transactions()->saveMany(factory(App\transaction::class, 5)->make());
        });;
    }
}