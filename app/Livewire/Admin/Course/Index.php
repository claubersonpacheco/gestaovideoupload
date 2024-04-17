<?php

namespace App\Livewire\Admin\Course;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 15;

    public function delete($id)
    {
        $data = Course::findOrFail($id)->first();


        $findCourseMoodle = $data->findCourseByField($data->mcode, 'id');

        if($findCourseMoodle->courses === ''){

            $return = $data->deleteCourseMoodle($data->mcode);

            if ($return['warning'][0]['message'] === ''){

                $data->delete();

                toastr()->success('Excluido com sucesso!');

                return redirect()->route('courses');

            }else{

                toastr()->error('Erro ao excluir: '.$return['warning'][0]['message']);

                return redirect()->route('courses');
            }



        }else{

            $data->delete();

            toastr()->success('Excluido com sucesso!');

            return redirect()->route('courses');

        }

    }
    public function render()
    {
        return view('livewire.admin.course.index', [
            'datos' => Course::latest()->paginate($this->perPage),
        ]);
    }
}
