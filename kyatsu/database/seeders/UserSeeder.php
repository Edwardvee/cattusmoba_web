<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**     
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "nico205",
            'email' => "nico205@gmail.com",
            'password' => Hash::make("auuha73277egFDA")
        ]);
        
        User::create([
            'name' => "tomoko",
            'email' => "tomoko@watamote.com",
            'password' => Hash::make("auuha73277egFDA")
        ]);
        
        User::create([
            'name' => "megumin",
            'email' => "megumin@konosuba.com",
            'password' => Hash::make("auuha73277egFDA")
        ]);
        UserFactory::new()->trashed()->count(500)->create();
        UserFactory::new()->count(500)->create();
    }
}
