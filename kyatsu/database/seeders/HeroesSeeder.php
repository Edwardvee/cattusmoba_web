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
            "uuid" => "3f7b5693-bcdd-4bdb-b02f-47931a77715a",
            "name" => "Nala",
            "voice_actor" => "Ivan Qurioga",
            "description" => "Heroe description 1",
            "birthdate" => "2023-08-09 23:55",
        ]);
        Heroes::create([
            "uuid" => "795773be-63a5-4d48-83d1-fb6a2a744ce6",
            "name" => "Arquera",
            "voice_actor" => "Ivan Qurioga",
            "description" => "Heroe description 2",
            "birthdate" => "2023-08-09 23:55",
        ]);
        Heroes::create([
            "uuid" => "81187dfb-317e-423f-b52d-d948619714b4",
            "name" => "Heroe 3",
            "voice_actor" => "Ivan Qurioga",
            "description" => "Heroe description 3",
            "birthdate" => "2023-08-09 23:55",
        ]);
        Heroes::create([
            "uuid" => "d3396877-948f-4f10-bfa1-13bb07171be2",
            "name" => "Nagatoro",
            "voice_actor" => "Ivan Qurioga",
            "description" => "Heroe description 4",
            "birthdate" => "2023-08-09 23:55",
        ]);
        Heroes::create([
            "uuid" => "90b2b001-072d-4e42-8bb7-4a0346c4834c",
            "name" => "Rem",
            "voice_actor" => "Ivan Qurioga",
            "description" => "Heroe description 5",
            "birthdate" => "2023-08-09 23:55",
        ]);
        Heroes::create([
            "uuid" => "12123123",
            "name" => "Akira",
            "voice_actor" => "Ivan Qurioga",
            "description" => "Heroe description 6",
            "birthdate" => "2023-08-09 23:55",
        ]);
        Heroes::create([
            "uuid" => "12341",
            "name" => "Sylphiette",
            "voice_actor" => "Ivan Qurioga",
            "description" => "Heroe description 7",
            "birthdate" => "2023-08-09 23:55",
        ]);
        Heroes::create([
            "uuid" => "tomoko",
            "name" => "tomoko",
            "voice_actor" => "Ivan Qurioga",
            "description" => "Heroe description 8",
            "birthdate" => "2023-08-09 23:55",
        ]);

       // HeroesFactory::new()->trashed()->count(500)->create();
        //HeroesFactory::new()->count(500)->create();
    }
}
