<?php

namespace App\Models;

use App\Models\Traits\CreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use GuzzleHttp\Client;
USE GuzzleHttp\Psr7;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Video extends Model
{
    use HasFactory;
    use CreatedAt;

    protected $guarded;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);

    }

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")->orWhere('file_path', 'like', "%{$value}%");

    }

    public function createVideoInBunny($title){

        $setup = Setting::find('1');

        $client = new Client();

        $response = $client->request('POST', 'https://video.bunnycdn.com/library/'.$setup->streamLibraryId.'/videos', [
            'body' => '{"title":"'.$title.'"}',
            'headers' => [
                'AccessKey' => $setup->streamApiKey,
                'accept' => 'application/json',
                'content-type' => 'application/*+json',
            ],
        ]);

        $resultado = json_decode($response->getBody()->getContents());

        return $resultado;
    }

    public function updateVideoInBunny($title, $guid){

        $setup = Setting::find('1');

        $client = new Client();

        $response = $client->request('POST', 'https://video.bunnycdn.com/library/'.$setup->streamLibraryId.'/videos/'.$guid, [
            'body' => '{"title":"'.$title.'"}',
            'headers' => [
                'AccessKey' => $setup->streamApiKey,
                'accept' => 'application/json',
                'content-type' => 'application/*+json',
            ],
        ]);

        $resultado = json_decode($response->getBody()->getContents());

        return $resultado;
    }

    public function delVideo($guid)
    {

        $setup = Setting::find('1');

        $client = new Client();

        $response = $client->request('DELETE', 'https://video.bunnycdn.com/library/'.$setup->streamLibraryId.'/videos/'.$guid, [
            'headers' => [
                'AccessKey' => $setup->streamApiKey,
                'accept' => 'application/json',
            ],
        ]);

        $result = json_decode($response->getBody()->getContents());

        return $result;

    }


    public function uploadVideoFromBunny($guid, $url)
    {
        $setup = Setting::find('1');

        $client = new Client();

        try {
            $response = $client->request('PUT', 'https://video.bunnycdn.com/library/'.$setup->streamLibraryId.'/videos/'.$guid, [
                'headers' => [
                    'AccessKey' => $setup->streamApiKey,
                    'accept' => 'application/json',
                ],
                'body' => Psr7\Utils::tryFopen($url, 'r'),

            ]);

            return json_decode($response->getBody()->getContents());
        }catch (\Exception $e) {
            echo 'Erro durante o upload: ' . $e->getMessage();
        }
    }


}
