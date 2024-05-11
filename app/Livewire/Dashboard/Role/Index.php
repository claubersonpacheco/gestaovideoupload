<?php

namespace App\Livewire\Dashboard\Role;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Role;


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

    public function delete($id)
    {
        $data = Role::findOrFail($id);

        $data->delete();

        toastr()->success('Excluido com sucesso!');

        return redirect()->route('roles.index');
    }

    #[Title('List Roles')]
    public function render()
    {
        $this->count = Role::count();

        return view('livewire.dashboard.role.index', [
            'datas' => Role::search($this->search)->latest()->paginate($this->perPage)
        ]);
    }



}
