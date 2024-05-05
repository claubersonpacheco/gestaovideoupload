<?php

namespace App\Livewire\Dashboard\Video;

use App\Models\Video;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 25;

    #[Title('List Videos')]
    public function render()
    {
        return view('livewire.dashboard.video.index', [
            'videos' => Video::search($this->search)->latest()->paginate($this->perPage)
        ]);
    }


    public function delete($id)
    {

        $data = Video::findOrFail($id);

        $data->delVideo($data->guid);

        $data->delete();

        toastr()->success('Deleted with successfully!');

        return redirect()->route('videos.index');
    }
}
