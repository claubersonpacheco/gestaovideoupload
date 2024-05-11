<?php

namespace App\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Users')]
class Index extends Component
{
    use WithPagination;
    public $perPage = 25;

    public $search = '';

    public $status;

    public $count;

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

                return redirect()->route('users.index');
            };
        }
    }

    #[On('searchData')]
    public function search($searchTerm)
    {
        $this->search = $searchTerm;
    }

    #[On('ListUsers')]
    public function render()
    {

        $this->count = User::count();

            return view('livewire.dashboard.user.index', [
                'datas' => User::search($this->search)->latest()->paginate($this->perPage)
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

}
