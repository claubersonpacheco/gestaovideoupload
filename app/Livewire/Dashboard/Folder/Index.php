<?php

namespace App\Livewire\Dashboard\Folder;

use App\Models\Folder;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 25;

    public function delete($id)
    {
        $data = Folder::findOrFail($id);

        $countVideos = $data->videos->count();

        if ($countVideos >= 1){

            toastr()->error('Erro ao excluir existem '.$countVideos.' videos neste Folder');

        }else{

            $data->delete();

            toastr()->success('Excluido com sucesso!');

            return redirect()->route('folders.index');
        }

    }

    public function render()
    {
        return view('livewire.dashboard.folder.index',[
            'folders' => Folder::all()
        ]);
    }
}
