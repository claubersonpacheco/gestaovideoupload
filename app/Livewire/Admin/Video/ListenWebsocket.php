<?php

namespace App\Livewire\Admin\Video;

use App\Models\Video;
use Livewire\Component;

class ListenWebsocket extends Component
{

    public array $items = [];

    public $status = "Aguardando envio...";

    public $videoid;


    protected $listeners = ['echo:videoupload,VideoEvent' => 'status'];

    public function render()
    {
        return view('livewire.admin.video.listen-websocket');
    }

    public function status($data)
    {

        $status = $data["data"]["Status"];

        $video = Video::where('guid', $this->videoid)->first();

        if ($video === null) {

            $this->status = "null";

        } else {

           $this->status =  $this->message($status);

        }
    }

    public function message($status)
    {
        return match ($status){

            0 => 'Aguardando processamento...',
            1 => 'Iniciando processamento do arquivo...',
            2 => 'Codificando arquivo...aguarde!',
            4 => 'Processando resolução...aguarde!',
            5 => 'Processando falhou!',
            3 => 'Processo finalizado, aguarde ser redirecionado...',
            default => "Aguardando envio ...",
        };
    }
}
