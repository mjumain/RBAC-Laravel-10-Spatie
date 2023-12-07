<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuLabel;
use App\Models\MenuParent;
use App\Models\MenuTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $general = MenuLabel::create([
            'name' => 'Dashboard',
            'permission_name' => 'dashboard',
            'posision' => 1,
        ]);

        Menu::create([
            'name' => 'Dashboard',
            'icon' => 'arrow-to-right',
            'route' => 'dashboard.index',
            'permission_name' => 'dashboard_index',
            'menu_label_id' => $general->id,
            'posision' => 1,
        ]);
    }
}
