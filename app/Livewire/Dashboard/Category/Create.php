<?php

namespace App\Livewire\Dashboard\Category;

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
        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.dashboard.category.create');
    }


}
