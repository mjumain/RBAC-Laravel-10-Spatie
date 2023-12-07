<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuLabel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = MenuLabel::create([
            'name' => 'Pengaturan',
            'permission_name' => 'pengaturan',
            'posision' => 2,
        ]);

        Menu::create([
            'name' => 'Penggguna',
            'icon' => 'arrow-to-right',
            'route' => 'user.index',
            'permission_name' => 'user_index',
            'menu_label_id' => $setting->id,
            'posision' => 1,
        ]);

        Menu::create([
            'name' => 'Menu',
            'icon' => 'arrow-to-right',
            'route' => 'menu.index',
            'permission_name' => 'menu_label_index',
            'menu_label_id' => $setting->id,
            'posision' => 2,
        ]);

        Menu::create([
            'name' => 'Route',
            'icon' => 'arrow-to-right',
            'route' => 'route.index',
            'permission_name' => 'route_index',
            'menu_label_id' => $setting->id,
            'posision' => 3,
        ]);

        Menu::create([
            'name' => 'Role',
            'icon' => 'arrow-to-right',
            'route' => 'role.index',
            'permission_name' => 'role_index',
            'menu_label_id' => $setting->id,
            'posision' => 4,
        ]);

        Menu::create([
            'name' => 'Permission',
            'icon' => 'arrow-to-right',
            'route' => 'permission.index',
            'permission_name' => 'permission_index',
            'menu_label_id' => $setting->id,
            'posision' => 5,
        ]);
    }
}
