<?php

namespace App\Livewire\Dashboard\Course;

use App\Livewire\Forms\CourseForm;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

class Edit extends Component
{
    public CourseForm $form;

    public $description;

    public $category;

    public $checked;

    public $data;

    public function mount(int $id)
    {
        $this->data = Course::where('id', $id)->first();

        $this->checked = $this->data->visible;

        $this->description = $this->data->description;

        $this->category = $this->data->category->name;

        $this->form->setCourse($this->data);
    }

    public function save():void
    {
        $this->form->update();

    }

    public function cancel()
    {
        return redirect()->route('courses.index');
    }
    public function render()
    {
        $categories = Category::all();

        return view('livewire.dashboard.course.edit',[
            'categories' => $categories,
        ]);
    }
}
