<?php

namespace App\Livewire\Admin\Category;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public CategoryForm $form;

    public function mount(int $id)
    {
        $data = Category::findOrFail($id);

        $this->form->setCategory($data);
    }

    public function save()
    {
        $this->form->update();
    }

    public function cancel()
    {
        return redirect()->route('categories');
    }

    public function render()
    {
        return view('livewire.admin.category.edit');
    }
}
