<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Permission\Models\Role;

class CourseUser extends Pivot
{
    use HasFactory;

    protected $table = 'course_user';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $guarded;


    public function user():BelongsTo
    {
        return  $this->belongsTo(User::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);

    }

    public function course():BelongsTo
    {
        return  $this->belongsTo(Course::class);
    }

}
