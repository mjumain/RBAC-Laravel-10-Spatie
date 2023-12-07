<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, Uuids;
    protected $fillable = ['name', 'icon', 'route', 'status', 'permission_name', 'menu_label_id', 'posision'];

    protected $casts = ['status' => 'boolean'];
}
