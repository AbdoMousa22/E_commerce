<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\category;
use App\Models\priv;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // priv::create([
        //     "name"=>"owner",
        //     "number"=>300

        // ]);
        // priv::create([
        //     "name"=>"admin",
        //     "number"=>200

        // ]);
        // priv::create([
        //     "name"=>"super",
        //     "number"=>100

        // ]);


        category::create([
            "name"=>"Android"
        ]);
        category::create([
            "name"=>"IOS"
        ]);
    }
}
