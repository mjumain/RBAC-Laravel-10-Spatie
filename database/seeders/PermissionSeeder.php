<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Model::unguard();

        // $this->call("OthersTableSeeder");

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'pengaturan']);

        // dashboard
        Permission::create(['name' => 'dashboard_index']);

        // General Setting
        Permission::create(['name' => 'setting_index']);
        Permission::create(['name' => 'setting_update']);

        // User Management
        Permission::create(['name' => 'user_index']);
        Permission::create(['name' => 'user_store']);
        Permission::create(['name' => 'user_update']);
        Permission::create(['name' => 'user_destroy']);
        Permission::create(['name' => 'user_edit']);

        // User Profile
        Permission::create(['name' => 'profile_index']);

        // Menu Management Title
        Permission::create(['name' => 'menu_index']);
        Permission::create(['name' => 'menu_store']);
        Permission::create(['name' => 'menu_update']);
        Permission::create(['name' => 'menu_destroy']);
        Permission::create(['name' => 'menu_edit']);

        // Menu Management Parent
        Permission::create(['name' => 'menu_label_index']);
        Permission::create(['name' => 'menu_label_store']);
        Permission::create(['name' => 'menu_label_update']);
        Permission::create(['name' => 'menu_label_destroy']);
        Permission::create(['name' => 'menu_label_edit']);

        // Route Management
        Permission::create(['name' => 'route_index']);
        Permission::create(['name' => 'route_store']);
        Permission::create(['name' => 'route_update']);
        Permission::create(['name' => 'route_destroy']);
        Permission::create(['name' => 'route_edit']);

        // Role Management
        Permission::create(['name' => 'role_index']);
        Permission::create(['name' => 'role_store']);
        Permission::create(['name' => 'role_update']);
        Permission::create(['name' => 'role_destroy']);
        Permission::create(['name' => 'role_edit']);

        // Permission Management
        Permission::create(['name' => 'permission_index']);
        Permission::create(['name' => 'permission_store']);
        Permission::create(['name' => 'permission_update']);
        Permission::create(['name' => 'permission_destroy']);
        Permission::create(['name' => 'permission_edit']);
    }
}
