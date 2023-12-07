<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dashboard
        Route::insert([
            [
                'id'=> Str::uuid(),
                'route' => 'dashboard.index',
                'permission_name' => 'dashboard_index'
            ],
        ]);

        // General Setting
        Route::insert([
            [
                'id'=> Str::uuid(),
                'route' => 'setting.index',
                'permission_name' => 'setting_index'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'setting.update',
                'permission_name' => 'setting_update'
            ],
        ]);

        // User Management
        Route::insert([
            [
                'id'=> Str::uuid(),
                'route' => 'user.index',
                'permission_name' => 'user_index'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'user.store',
                'permission_name' => 'user_store'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'user.update',
                'permission_name' => 'user_update'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'user.destroy',
                'permission_name' => 'user_destroy'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'user.edit',
                'permission_name' => 'user_edit'
            ],
        ]);

        // User Profile
        Route::insert([
            [
                'id'=> Str::uuid(),
                'route' => 'profile.index',
                'permission_name' => 'profile_index'
            ]
        ]);

        // Menu Group Management
        Route::insert([
            [
                'id'=> Str::uuid(),
                'route' => 'menu.index',
                'permission_name' => 'menu_label_index'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'menu.store',
                'permission_name' => 'menu_label_store'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'menu.update',
                'permission_name' => 'menu_label_update'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'menu.destroy',
                'permission_name' => 'menu_label_destroy'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'menu.edit',
                'permission_name' => 'menu_label_edit'
            ],
        ]);

        // Menu Item Management
        Route::insert([
            [
                'id'=> Str::uuid(),
                'route' => 'menu.item.index',
                'permission_name' => 'menu_index'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'menu.item.store',
                'permission_name' => 'menu_store'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'menu.item.update',
                'permission_name' => 'menu_update'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'menu.item.destroy',
                'permission_name' => 'menu_destroy'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'menu.item.edit',
                'permission_name' => 'menu_edit'
            ],
        ]);

        // Route Management
        Route::insert([
            [
                'id'=> Str::uuid(),
                'route' => 'route.index',
                'permission_name' => 'route_index'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'route.store',
                'permission_name' => 'route_store'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'route.update',
                'permission_name' => 'route_update'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'route.destroy',
                'permission_name' => 'route_destroy'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'route.edit',
                'permission_name' => 'route_edit'
            ],
        ]);

        // Role Management
        Route::insert([
            [
                'id'=> Str::uuid(),
                'route' => 'role.index',
                'permission_name' => 'role_index'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'role.store',
                'permission_name' => 'role_store'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'role.update',
                'permission_name' => 'role_update'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'role.destroy',
                'permission_name' => 'role_destroy'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'role.edit',
                'permission_name' => 'role_edit'
            ],
        ]);

        // Permission Management
        Route::insert([
            [
                'id'=> Str::uuid(),
                'route' => 'permission.index',
                'permission_name' => 'permission_index'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'permission.store',
                'permission_name' => 'permission_store'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'permission.update',
                'permission_name' => 'permission_update'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'permission.destroy',
                'permission_name' => 'permission_destroy'
            ],
            [
                'id'=> Str::uuid(),
                'route' => 'permission.edit',
                'permission_name' => 'permission_edit'
            ],
        ]);
    }
}
