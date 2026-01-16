<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Permissies aanmaken
        Permission::create(['name' => 'index project']);
        Permission::create(['name' => 'create project']);
        Permission::create(["name" => "show project"]);
        Permission::create(['name' => 'edit project']);
        Permission::create(['name' => 'delete project']);

        // Rollen aanmaken en permissies geven
        $role = Role::create(['name' => 'student']);
        $role->givePermissionTo([
            'index project',
            'create project',
            'show project',
            'edit project'
        ]);

        $role = Role::create(['name' => 'teacher']);
        $role->givePermissionTo(
            [
                'index project',
                'create project',
                'show project',
                'edit project',
                'delete project'
            ]);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
