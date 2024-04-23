<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\Category;
use GuzzleHttp\Exception\GuzzleException;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 15;

    public function delete($id)
    {
        $data = Category::findOrFail($id);


            $return = $data->deleteCategoryMoodle($data->mcode);

            if (!empty($return->exception)){

                toastr()->error('Erro ao excluir a categoria: ' . $return->message);

            }else{

                $data->delete();

                toastr()->success('Excluido com sucesso!');

                return redirect()->route('categories.index');
            }

    }

    public function render()
    {

        return view('livewire.dashboard.category.index', [
            'datos' => Category::latest()->paginate($this->perPage),
        ]);
    }


}
