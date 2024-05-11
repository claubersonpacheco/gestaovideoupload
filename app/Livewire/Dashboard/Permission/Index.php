<?php

namespace App\Livewire\Dashboard\Permission;

use App\Models\Permission;
use App\Models\Role;
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

    public function delete($id)
    {
        $data = Permission::findById($id);

        $data->delete();

        toastr()->success('Excluido com sucesso!');

        return redirect()->route('permissions.index');
    }

    #[Title('List Roles')]
    public function render()
    {

        $this->count = Permission::count();

        return view('livewire.dashboard.permission.index', [
            'datas' => Permission::search($this->search)->latest()->paginate($this->perPage)
        ]);
    }



}
