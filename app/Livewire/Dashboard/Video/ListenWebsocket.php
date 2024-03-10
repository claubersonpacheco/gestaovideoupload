<?php

namespace App\Livewire\Dashboard\Video;

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
        return view('livewire.dashboard.video.listen-websocket');
    }

    public function status($data)
    {
        $VideoLibraryId = $data["data"]["VideoLibraryId"];
        $Status = $data["data"]["Status"];
        $VideoGuid = $data["data"]["VideoGuid"];

        $video = Video::where('guid', $this->videoid)->first();

        if ($video === null) {

            $this->status = "null";

        } else {

            $status = $Status;

            switch ($status) {
                case 0:
                    $this->status = 'Aguardando processamento...';
                    break;
                case 1:
                    $this->status = 'Iniciando processamento do arquivo...';
                    break;
                case 2:
                    $this->status = 'Codificando arquivo...aguarde!';
                    break;

                case 4:
                    $this->status = 'Processando resolução...aguarde!';
                    break;
                case 5:
                    $this->status = 'Processando falhou!';
                    break;
                case 3:
                    $this->status = 'Processo finalizado, aguarde ser redirecionado...';

                    toastr()->success('Save with successfully!');

                    return redirect()->route('videos');
                default;

                    $this->status = 'Aguardando processar...';
                    break;

            }
        }
    }
}
