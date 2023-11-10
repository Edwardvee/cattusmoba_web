<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TiendaModel;

class TiendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TiendaModel::create([
          
            'name' => 'Quirocoins',
            'description' => 'eeee',
            'quantity' => 1,
            'unit_price' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null
        ]);

        TiendaModel::create([
         
            'name' => 'Quirocoins',
            'description' => 'aaaa',
            'quantity' => 2,
            'unit_price' => 2,
            'created_at' =>now(),
            'updated_at' => now(),
            'deleted_at' => null
        ]);

        TiendaModel::create([
        
            'name' => 'Quirocoins',
            'description' => 'ssss',
            'quantity' => 3,
            'unit_price' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null
        ]);

        TiendaModel::create([
           
            'name' => 'Quirocoins',
            'description' => 'hhhh',
            'quantity' => 4,
            'unit_price' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null
        ]);
    }
}
