<?php

namespace App\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 2;

    public $deleteId;

    #[Title('List Videos')]
    public function render()
    {
        return view('livewire.dashboard.user.index', [
            'datos' => User::search($this->search)->latest()->paginate($this->perPage)
        ]);
    }


    public function delete($record)
    {
        $data = Video::findOrFail($record);
        $data->delete();

        return redirect()->route('video');
    }
}
