<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use App\Models\Course;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Validation\Rule;


class CourseForm extends Form
{

    public ?Course $course;


    #[Validate('required|min:3|unique:courses,fullname', onUpdate: false)]
    public $fullname = '';

    #[Validate('required|min:3|unique:courses,shortname', onUpdate: false)]
    public $shortname = '';

    #[Validate('nullable| min:3')]
    public $summary = '';

    #[Validate('nullable')]
    public $startdate = '';

    #[Validate('nullable')]
    public $enddate = '';

    #[Validate('nullable')]
    public $visible = 1;

    #[Validate('required', onUpdate: false)]
    public $category;


    public function setCourse(Course $course)
    {
        $this->course = $course;

        $this->fullname = $course->fullname;
        $this->shortname = $course->shortname;
        $this->startdate = $course->startdate;
        $this->enddate = $course->enddate;
        $this->visible = $course->visible;
        $this->category = $course->category;
        $this->summary = $course->summary;
}

    public function store()
    {
        $this->validate();

        $courseMoodle = new Course();

        $findCourseMoodle = $courseMoodle->findCourseByField($this->shortname);


        if (count($findCourseMoodle->courses) === 0){

            $findCategoryIdMoodel = Category::where('id', $this->category)->first();

            $startdate = strtotime($this->startdate);
            $enddate = strtotime($this->enddate);

            $createCourseMoodle = $courseMoodle->createCourseMoodle(
                    $this->fullname,
                    $this->shortname,
                    $findCategoryIdMoodel->mcode,
                    $this->summary,
                    $this->visible,
                    $startdate,
                    $enddate,
            );

            Course::create([
                    'fullname' => $this->fullname,
                    'shortname' => $this->shortname,
                    'mcode' => $createCourseMoodle[0]->id,
                    'startdate' => $this->startdate,
                    'enddate' => $this->enddate,
                    'visible' => $this->visible,
                    'category_id' => $this->category,
                    'summary' => $this->summary,
                ]
            );

            toastr()->success('Criado com sucesso no moodle!');

            return redirect()->route('courses');

        }else{

            toastr()->error('Jé existe um curso com este nome curto no moodle!');

            return false;
        }
    }

    public function update()
    {

        $this->validate();

        $this->course->update(
            [
                'fullname' => $this->fullname,
                'shortname' => $this->shortname,
                'startdate' => $this->startdate,
                'enddate' => $this->enddate,
                'visible' => $this->visible,
                'category_id' => $this->category,
                'summary' => $this->summary,
            ]
        );

        toastr()->success('Atualizado com sucesso!');

        return redirect()->route('courses');


    }
}
