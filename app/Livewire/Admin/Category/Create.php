<?php

namespace App\Livewire\Admin\Category;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;

class Create extends Component
{
    public CategoryForm $form;

    public function save():void
    {
        $this->form->store();
    }

    public function cancel()
    {
        return redirect()->route('categories');
    }

    public function render()
    {
        return view('livewire.admin.category.create');
    }


}
