<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLabel extends Model
{
    use HasFactory, Uuids;
    protected $fillable = ['name', 'status', 'permission_name', 'posision'];

    protected $casts = ['status' => 'boolean'];

    public function items()
    {
        return $this->hasMany(Menu::class);
    }
}
