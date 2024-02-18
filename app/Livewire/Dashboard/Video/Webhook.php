<?php

namespace App\Livewire\Dashboard\Video;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use GuzzleHttp\Client;

class Webhook extends Component
{

    public $status = 'Lendo status';

    public $guid;


    public $response;

    public function webhook(Request $request)
    {

            $data = $request->all();

            $response = response()->json([
                'success' => true,
                'data' =>  $data
            ], 200);

           return $response;

    }

    public function mount()
    {
        $client = new Client();

        $response = $client->request('GET', 'https://605f-2a0c-5a81-2202-e500-2c46-5abc-acd5-8a6e.ngrok-free.app/webhook');

        $resultado = json_decode($response->getBody()->getContents());

        return $resultado;

    }
    public function render()
    {
        return view('livewire.dashboard.video.webhook');
    }
}
