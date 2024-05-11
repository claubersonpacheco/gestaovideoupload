<?php

namespace App\Livewire\Dashboard\Folder;

use App\Models\Folder;
use App\Models\Video as ModelVideo;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;

class Video extends Component
{
    public $datas;

    public $count;

    public $id;

    public $perpage = 25;

    public function delete($id)
    {

        $data = ModelVideo::findOrFail($id);

        $data->delVideo($data->guid);

        $data->delete();

        toastr()->success('Deleted with successfully!');

        return redirect()->route('folders.video', $this->id );
    }

    public function render()
    {
        $this->datas = Folder::with('videos')->find($this->id);

        return view('livewire.dashboard.folder.video');
    }
}
