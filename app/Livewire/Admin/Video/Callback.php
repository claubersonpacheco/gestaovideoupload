<?php

namespace App\Livewire\Admin\Video;


use App\Events\VideoEvent;
use App\Models\Video;
use App\Models\Webhook;
use Illuminate\Http\Request;
use Livewire\Component;

class Callback extends Component
{

    public function handleWebhook(Request $request)
    {

        $resVideo = $request->all();

        VideoEvent::dispatch($resVideo);

        return $request;
    }


}
