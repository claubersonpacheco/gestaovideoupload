<?php

namespace App\Livewire\Dashboard\Course\Enrollment;

use App\Models\Course;
use App\Models\CourseUser;
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
        $alunos = CourseUser::where('course_id', $this->id)->get();

        $this->users = $alunos;
    }

    public function detachUser(User $user)
    {
        $course = Course::findOrFail($this->id);

        $course->unrollementUserByCourse($user->mcode, $course->mcode );

        $course->users()->detach($user->id);

        $this->dispatch('listUsers');


    }


    public function render()
    {
        return view('livewire.dashboard.course.enrollment.list-users');
    }
}
