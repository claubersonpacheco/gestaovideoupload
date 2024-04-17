<?php

namespace App\Livewire\Admin\Course;

use App\Livewire\Forms\CourseForm;
use App\Models\Category;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{
    public CourseForm $form;

    public $startdate;
    public $enddate;

    public function mount()
    {
        $this->startdate = Carbon::now();
        // Defina a data atual como valor padrão para o campo "enddate"
        $this->form->startdate = $this->startdate->toDateTimeLocalString();

        $this->enddate = Carbon::now();

        $this->form->enddate = $this->enddate->addYears(1)->toDateTimeLocalString();
    }

    public function save():void
    {
        $this->form->store();
    }
    public function cancel()
    {
        return redirect()->route('courses');
    }
    public function render()
    {
        $categories = Category::all();
        $startdate = Carbon::now();

        return view('livewire.admin.course.create', [
            'categories' => $categories,
            'startdate' => $startdate
        ]);
    }


}
