<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;



class CategoryForm extends Form
{

    public ?Category $category;


    #[Validate('required|min:3|unique:categories,name')]
    public $name = '';

    #[Validate('nullable| min:3')]
    public $description = '';


    public function setCategory(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->description = $category->description;

    }

    public function store()
    {
        $this->validate();

        $categoryMoodle = new Category();

        $resCategory = $categoryMoodle->findCategoryByField($this->name);

        if (count($resCategory) === 0){

            $createCategory = $categoryMoodle->createCategoryMoodle( $this->name, $this->description);

                Category::create([
                        'name' => $this->name,
                        'description' => $this->description,
                        'mcode' => $createCategory[0]->id
                    ]
                );

                toastr()->success('Criado com sucesso no moodle!');

                return redirect()->route('categories');


        }else{

            toastr()->error('Este Categoria já existe no moodle!');

        }
    }

    public function update()
    {

        $this->validate();

        $this->category->update(
                $this->only([
                    'name',
                ])
            );

        toastr()->success('Atualizado com sucesso!');

        return redirect()->route('categories');


    }
}
