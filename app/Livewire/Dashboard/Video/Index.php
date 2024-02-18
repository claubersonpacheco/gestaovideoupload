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

    public $deleteId;

    #[Title('List Videos')]
    public function render()
    {
        return view('livewire.dashboard.video.index', [
            'videos' => auth()->user()->videos()->search($this->search)->latest()->paginate($this->perPage)
        ]);
    }


    public function delete($record)
    {
        $data = Video::findOrFail($record);

        $data->delVideo($data->guid);

        $data->delete();

        return redirect()->route('videos');
    }
}
