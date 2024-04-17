<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded;

    public function courses():HasMany
    {
        return  $this->hasMany(Course::class);
    }

    public function getApiMoodleData()
    {
        $apiDatos = Setting::all();

        $datos = [];

        foreach ($apiDatos as $res)
        {
            $datos['moodleUrl'] = $res->moodleUrl;
            $datos['moodleToken'] = $res->moodleToken;
        }

        return $datos;

    }
    public function findCategoryByField($value, $field = 'name')
    {
        $client = new Client();

        $result = $client->request('GET', $this->getApiMoodleData()['moodleUrl'], [
           'query' => [
               'wstoken' => $this->getApiMoodleData()['moodleToken'],
               'wsfunction' => 'core_course_get_categories',
               'moodlewsrestformat' => 'json',
               'criteria[0][key]' => $field,
               'criteria[0][value]' => $value
           ]
        ]);

        $listJsonResult = json_decode($result->getBody()->getContents());

        return $listJsonResult;

    }

    public function createCategoryMoodle(string $name, string $description)
    {
        $client = new Client();

        $result = $client->request('GET', $this->getApiMoodleData()['moodleUrl'], [
            'query' => [
                'wstoken' => $this->getApiMoodleData()['moodleToken'],
                'wsfunction' => 'core_course_create_categories',
                'moodlewsrestformat' => 'json',
                'categories[0][name]' => $name,
                'categories[0][description]' => $description ,
            ]
        ]);

        $resultado = json_decode($result->getBody()->getContents());

        return $resultado;
    }

    public function deleteCategoryMoodle($id)
    {
        $client = new Client();

        $result = $client->request('DELETE', setting()->moodleUrl,[
            'query' => [
                'wstoken' => setting()->moodleToken,
                'wsfunction' => 'core_course_delete_categories',
                'moodlewsrestformat' => 'json',
                'categories[0][id]' => $id,
                'categories[0][newparent]' => null,
                'categories[0][recursive]' => 1
            ]
        ]);

        $resultado = json_decode($result->getBody(), true);

        return $resultado;

    }

}
