<?php

namespace App\Models;

use App\Models\Traits\CreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use  Spatie\Permission\Models\Role  as  SpatieRole ;

class Role extends SpatieRole
{
    use HasFactory, CreatedAt;

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")
            ->orWhere('description', 'like', "%{$value}%");

    }
}
