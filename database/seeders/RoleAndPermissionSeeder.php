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
        // Project permissies
        Permission::create(['name' => 'index project']);
        Permission::create(['name' => 'create project']);
        Permission::create(["name" => "show project"]);
        Permission::create(['name' => 'edit project']);
        Permission::create(['name' => 'delete project']);

        // task permissies
        Permission::create(['name' => 'index task']);
        Permission::create(['name' => 'create task']);
        Permission::create(["name" => "show task"]);
        Permission::create(['name' => 'edit task']);
        Permission::create(['name' => 'delete task']);

        // Rollen aanmaken en permissies geven
        $role = Role::create(['name' => 'student']);
        $role->givePermissionTo([
            // project permissies
            'index project',
            'create project',
            'show project',
            'edit project',

            // task permissies
            'index task',
            'create task',
            'show task',
            'edit task',
        ]);

        $role = Role::create(['name' => 'teacher']);
        $role->givePermissionTo(
            [
                // project permissies
                'index project',
                'create project',
                'show project',
                'edit project',
                'delete project',

                // task permissies
                'index task',
                'create task',
                'show task',
                'edit task',
                'delete task',
            ]);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
