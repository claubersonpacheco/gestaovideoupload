<?php

namespace App\Models;

use App\Models\Traits\CreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use  Spatie\Permission\Models\Permission  as  SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory, CreatedAt;
    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")
            ->orWhere('description', 'like', "%{$value}%");

    }
}
