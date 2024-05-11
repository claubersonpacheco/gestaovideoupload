<?php

namespace App\Livewire\Dashboard\Video;

use App\Models\Video;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    public $search = '';

    public $count;

    public $perPage = 25;

    #[On('searchData')]
    public function search($searchTerm)
    {
        $this->search = $searchTerm;
    }

    #[Title('List Videos')]
    public function render()
    {
        $this->count = Video::count();

        return view('livewire.dashboard.video.index', [
            'datas' => Video::search($this->search)->latest()->paginate($this->perPage)
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
