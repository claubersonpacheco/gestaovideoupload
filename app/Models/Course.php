<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use GuzzleHttp\Client;

class Course extends Model
{
    use HasFactory;

    protected $guarded;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function users():BelongsToMany
    {
        return  $this->belongsToMany(User::class);
    }

    public static function findAllCourses(): array
    {

        $client = new Client();

        $resultado = $client->request('GET', setting()->moodleUrl, [
            'query' => [
                'wstoken' => setting()->moodleToken,
                'wsfunction' => 'core_course_get_courses',
                'moodlewsrestformat' => 'json'
            ]
        ]);

        $listJsonResult = json_decode($resultado->getBody()->getContents());
        $nuevalista = [];

        foreach ( $listJsonResult as $item){
            array_push($nuevalista, [
                'id' => $item->id,
                'shortname' => $item->shortname,
                'fullname' => $item->fullname,
                'visible' => $item->visible,
            ]);
        }

        usort($nuevalista, function ($a, $b){
            return strtolower($a['fullname']) > strtolower($b['fullname']);
        });

        return $nuevalista;
    }

    public function findCourseByField($shortname, $field = 'shortname'){

        $client = new Client();

        $resultado = $client->request('GET', setting()->moodleUrl, [
            'query' => [
                'wstoken' => setting()->moodleToken,
                'wsfunction' => 'core_course_get_courses_by_field',
                'moodlewsrestformat' => 'json',
                'field' => $field,
                'value' => $shortname
            ]
        ]);

        $resultado = json_decode($resultado->getBody()->getContents());

        return $resultado;

    }

    public static function createCourseMoodle($fullname, $shortname, $category, $summary, $visible, $startDate = null, $endDate = null, )
    {
        $client = new Client();

        $result = $client->request('GET', setting()->moodleUrl, [
            'query' => [
                'wstoken' => setting()->moodleToken,
                'wsfunction' => 'core_course_create_courses',
                'moodlewsrestformat' => 'json',
                'courses[0][fullname]' => $fullname,
                'courses[0][shortname]' => $shortname,
                'courses[0][categoryid]' => $category,
                'courses[0][summary]' => $summary,
                'courses[0][startdate]' => $startDate,
                'courses[0][enddate]' => $endDate,
                'courses[0][visible]' => $visible,

            ]
        ]);

        $resultado = json_decode($result->getBody()->getContents());

        return $resultado;

    }

    public function deleteCourseMoodle($id)
    {
        $client = new Client();

        $result = $client->request('GET', setting()->moodleUrl,[
            'query' => [
                'wstoken' => setting()->moodleToken,
                'wsfunction' => 'core_course_delete_courses',
                'moodlewsrestformat' => 'json',
                'courseids[0]' => $id,
            ]
        ]);

        $resultado = json_decode($result->getBody()->getContents());

        return $resultado;

    }


}
