<?php

namespace App\Livewire\Admin\Course\Enrollment;

use App\Models\Course;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ListUsers extends Component
{
    public $id;

    public $users;

    #[On('listUsers')]
    public function mount()
    {
        $course = Course::find($this->id);

        $this->users = $course->users;
    }

    public function detachUser($id)
    {
        $course = Course::find($this->id);

        $course->users()->detach($id);

        $this->dispatch('listUsers');


    }


    public function render()
    {
        return view('livewire.admin.course.enrollment.list-users');
    }
}
