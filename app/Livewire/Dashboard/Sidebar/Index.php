<?php

namespace App\Livewire\Dashboard\Sidebar;

use App\Models\Folder;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        $folders = Folder::all();

        return view('livewire.dashboard.sidebar.index', [
            'folders' => $folders,
        ]);
    }
}
