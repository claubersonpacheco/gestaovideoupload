<?php

namespace App\Livewire\Dashboard\Course;

use App\Models\Course;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;

    public $search = '';

    public $count;

    public $perPage = 25;

    #[On('searchData')]
    public function search($searchTerm)
    {
        $this->search = $searchTerm;
    }

    public function delete($id)
    {
        $data = Course::findOrFail($id)->first();

        $findCourseMoodle = $data->findCourseByField($data->mcode, 'id');

        if($findCourseMoodle->courses === ''){

            $return = $data->deleteCourseMoodle($data->mcode);

            if ($return['warning'][0]['message'] === ''){

                $data->delete();

                toastr()->success('Excluido com sucesso!');

                return redirect()->route('courses.index');

            }else{

                toastr()->error('Erro ao excluir: '.$return['warning'][0]['message']);

                return redirect()->route('courses.index');
            }

        }else{

            $data->delete();

            toastr()->success('Excluido com sucesso!');

            return redirect()->route('courses.index');

        }

    }
    public function render()
    {
        $this->count = Course::count();

        return view('livewire.dashboard.course.index', [
            'datas' => Course::search($this->search)->latest()->paginate($this->perPage),
        ]);
    }
}
