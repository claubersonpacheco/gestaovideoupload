<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 15;

    public $status;

    public function delete(User $user)
    {

        $userMCode = new User();

        $resCourseByUser = $userMCode->findCourseByUserMoodle($user->mcode);

        if(count($resCourseByUser) > 0){

            toastr()->error('Usuario não pode ser excluido, porque esta cadastrado em um Curso, verifique!');

            return false;
        }else{

            $resDelete = $userMCode->deleteUserMoodle($user->mcode);

            if($resDelete === null){

                $user->delete();

                toastr()->success('Usuario excluido com sucesso!');

                return redirect()->route('users');
            };
        }
    }

    #[Title('List Users')]
    #[On('ListUsers')]
    public function render()
    {
        return view('livewire.admin.user.index', [
            'datos' => User::search($this->search)->latest()->paginate($this->perPage)
        ]);
    }

    public function changeStatus($id)
    {

        $user = User::findOrFail($id);

        $user->suspended = !$user->suspended;

        $user->changeStatusUserMoodle($user->mcode, $user->suspended);

        $user->save();

        $this->dispatch('ListUsers');


    }
//    {
//        public $status = false;
//
//
//        //$user->changeStatusUserMoodle($user->mcode, $value);
//
//
//        //$this->dispatch('ListUsers');
//
//    }



}
