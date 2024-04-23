<?php

namespace App\Livewire\Dashboard\Course\Enrollment;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class EnrollUser extends ModalComponent
{
    public $id;

    public $courseid;

    public $users = [];

    public $user;

    public $roles;

    public $role;



    public function mount()
    {

        $this->roles = DB::table('roles')
            ->having('name', '!=', 'master')
            ->having('name', '!=', 'frontpage')
        ->get();


        $usersWithoutCourse = User::whereDoesntHave('courses', function (Builder $query){
            $query->select('courses.id')
            ->where('course_id', $this->courseid);
        })->get();

        $this->users = $usersWithoutCourse;

    }

    public function attachUser()
    {
        $modelCourse = new Course();
        $mCode = $modelCourse->find($this->courseid)->first();

        $roleMcode = Role::findById($this->role);

        $user = User::find($this->user);

        // enroll user in moodle
        $modelCourse->enrollementUserByCourse($user->mcode, $mCode->mcode, $roleMcode->mcode);

        $user->courses()->attach($this->courseid, ['role_id' => $this->role ]);

        $this->closeModal();
        $this->dispatch('listUsers');
    }

    public function render()
    {


        return view('livewire.dashboard.course.enrollment.enroll-user');
    }
}
