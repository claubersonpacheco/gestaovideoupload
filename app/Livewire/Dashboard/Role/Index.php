<?php

namespace App\Livewire\Dashboard\Role;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;


class Index extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 15;

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
        return view('livewire.dashboard.role.index', [
            'datos' => Role::latest()->paginate($this->perPage)
        ]);
    }



}
