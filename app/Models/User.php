<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Traits\CreatedAt;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use CreatedAt;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded;

//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//        'photo'
//    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function courses():BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")->orWhere('email', 'like', "%{$value}%");

    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function findUserByFieldMoodle($shortname, $field = 'username'){

        $client = new Client();

        $resultado = $client->request('GET', setting()->moodleUrl, [
            'query' => [
                'wstoken' => setting()->moodleToken,
                'wsfunction' => 'core_user_get_users_by_field',
                'moodlewsrestformat' => 'json',
                'field' => $field,
                'values[0]' => $shortname
            ]
        ]);

        $resultado = json_decode($resultado->getBody()->getContents());

        return $resultado;

    }

    public function createUserMoodle( $username, $password, $name, $lastname,  $email){

        $client = new Client();

        $result = $client->request('GET', setting()->moodleUrl, [
            'query' => [
                'wstoken' => setting()->moodleToken,
                'wsfunction' => 'core_user_create_users',
                'moodlewsrestformat' => 'json',
                'users[0][username]' => $username,
                'users[0][password]' => $password,
                'users[0][firstname]' => $name,
                'users[0][lastname]' => $lastname,
                'users[0][email]' => $email,


            ]
        ]);

        $resultado = json_decode($result->getBody()->getContents());

        return $resultado;

    }

    public function deleteUserMoodle($id)
    {
        $client = new Client();

        $result = $client->request('GET', setting()->moodleUrl,[
            'query' => [
                'wstoken' => setting()->moodleToken,
                'wsfunction' => 'local_gdpr_deleteuserdata_single',
                'moodlewsrestformat' => 'json',
                'parameters[userid]' => $id,
            ]
        ]);

        $resultado = json_decode($result->getBody(), true);

        return $resultado;

    }

    public function findCourseByUserMoodle($valor){

        $client = new Client();

        $resultado = $client->request('GET', setting()->moodleUrl, [
            'query' => [
                'wstoken' => setting()->moodleToken,
                'wsfunction' => 'core_enrol_get_users_courses',
                'moodlewsrestformat' => 'json',
                'userid' => $valor
            ]
        ]);

        $resultado = json_decode($resultado->getBody()->getContents());

        return $resultado;

    }

    public function changeStatusUserMoodle($id, $status)
    {

        $client = new Client();

        $result = $client->request('GET', setting()->moodleUrl, [
            'query' => [
                'wstoken' => setting()->moodleToken,
                'wsfunction' => 'core_user_update_users',
                'moodlewsrestformat' => 'json',
                'users[0][id]'=> $id,
                'users[0][suspended]=' => $status
            ]
        ]);

        $resultado = json_decode($result->getBody()->getContents());

        return $resultado;
    }

}
