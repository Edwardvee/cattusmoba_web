<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::create(['name' => 'admin access']));
        $role->givePermissionTo(Permission::create(["name" => "admin user-list"]));
        $role->givePermissionTo(Permission::create(["name" => "admin user-edit"]));
        $role->givePermissionTo(Permission::create(["name" => "admin banned-list"]));
        $role->givePermissionTo(Permission::create(["name" => "admin ban-users"]));
        $role->givePermissionTo(Permission::create(["name" => "admin unban-users"]));
        $role->givePermissionTo(Permission::create(["name" => "admin heroes-edit"]));
     //Administrador
     //Usuario   
    }
}
