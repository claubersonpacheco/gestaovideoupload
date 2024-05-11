<?php

namespace App\Models;

use App\Models\Traits\CreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Folder extends Model
{
    use HasFactory, CreatedAt;

    protected $guarded;

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%");

    }

    public function videos():HasMany
    {
        return $this->hasMany(Video::class);
    }
}
