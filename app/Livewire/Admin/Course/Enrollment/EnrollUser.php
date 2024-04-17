<?php

namespace App\Livewire\Admin\Course\Enrollment;

use App\Models\Course;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EnrollUser extends ModalComponent
{
    public $id;

    public $course;

    public $users = [];

    public $user;



    public function mount()
    {
        $course = $this->course;

        $usersWithoutCourse = User::whereDoesntHave('courses', function ($query) use ($course) {
            $query->where('id', $course);
        })->get();

        $this->users = $usersWithoutCourse;

    }

    public function attachUser()
    {
        $user = User::find($this->user);

        $user->courses()->attach($this->course);

        $this->closeModal();
        $this->dispatch('listUsers');
    }

    public function render()
    {


        return view('livewire.admin.course.enrollment.enroll-user');
    }
}
