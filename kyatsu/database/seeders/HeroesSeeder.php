<?php

namespace Database\Seeders;

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
        HeroesFactory::new()->trashed()->count(500)->create();
        HeroesFactory::new()->count(500)->create();
    }
}
