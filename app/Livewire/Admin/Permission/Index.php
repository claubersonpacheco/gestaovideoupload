<?php

namespace App\Livewire\Admin\Permission;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 15;

    public function delete($id)
    {
        $data = Permission::findById($id);

        $data->delete();

        toastr()->success('Excluido com sucesso!');

        return redirect()->route('permissions');
    }

    #[Title('List Roles')]
    public function render()
    {
        return view('livewire.admin.permission.index', [
            'datos' => Permission::latest()->paginate($this->perPage)
        ]);
    }



}
