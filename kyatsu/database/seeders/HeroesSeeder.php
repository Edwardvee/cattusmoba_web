<?php

namespace Database\Seeders;

use App\Models\Heroes;
use Database\Factories\HeroesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Heroes::create([
            "name" => "Heroe 1",
            "voice_actor" => "Ivan Qurioga",
            "description" => "Heroe description 1",
            "birthdate" => "2023-08-09 23:55",
        ]);
        Heroes::create([
            "name" => "Heroe 2",
            "voice_actor" => "Ivan Qurioga",
            "description" => "Heroe description 1",
            "birthdate" => "2023-08-09 23:55",
        ]);
        Heroes::create([
            "name" => "Heroe 3",
            "voice_actor" => "Ivan Qurioga",
            "description" => "Heroe description 1",
            "birthdate" => "2023-08-09 23:55",
        ]);
        Heroes::create([
            "name" => "Heroe 4",
            "voice_actor" => "Ivan Qurioga",
            "description" => "Heroe description 1",
            "birthdate" => "2023-08-09 23:55",
        ]);
        Heroes::create([
            "name" => "Heroe 5",
            "voice_actor" => "Ivan Qurioga",
            "description" => "Heroe description 1",
            "birthdate" => "2023-08-09 23:55",
        ]);
       // HeroesFactory::new()->trashed()->count(500)->create();
        //HeroesFactory::new()->count(500)->create();
    }
}
