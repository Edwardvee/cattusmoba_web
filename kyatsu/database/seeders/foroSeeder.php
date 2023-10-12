<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\forumFactory;
use App\Models\Foro;

class foroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ 
    public function run(): void
    {
        /* Foro::factory()->count(20)->create(); */
        forumFactory::new()->count(20)->create();
    }
}
