<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Administration as Administrations,
    Subject as Subjects,
};
// use App\Models\Subject;

class Administration extends Component
{
    public  $administrations,
            $is_create = false,
            $is_review = false,
            $is_edit = false,
            $is_detail = false,
            $teacher_name,
            $title,
            $method_learning,
            $method_learnings,
            $subjects,
            $classrooms,
            $status,
            $comment,
            $description,
            $completeness,
            $classroom_id,
            $subject_id,
            $teacher_id;


    public function mount()
    {
        $this->subjects = Subjects::where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.administration', [

            $this->administrations = Administrations::with(['teacher', 'subject', 'classroom'])
                                    ->where('user_id', auth()->user()->id)->get(),
        ]);
    }

    protected $rules = [
        'title'     => 'required'
    ];

    public function isOpenModalCreate()
    {
        return $this->is_create = true;
    }

    public function storeAdministration()
    {
        $this->isOpenModalCreate();

        $this->validate([
            'title'     => 'required'
        ], [
            'title.required'    => 'Judul Mata Pelajaran Wajib diisi..'
        ]);

            $this->resetField();

            $this->isCloseModalCreate();
    }

    public function isCloseModalCreate()
    {
        return $this->is_create = false;
    }

    public function isOpenModalEdit()
    {
        return $this->is_edit = true;
    }

    public function isCloseModalEdit()
    {
        return $this->is_edit = false;
    }

    public function isOpenModalDetail()
    {
        return $this->is_detail = true;
    }

    public function detailAdministration($id_administration)
    {
        $this->isOpenModalDetail();

        $administration = Administrations::find($id_administration);
        // $$administration->teacher;
        // dd($administration);

    }

    public function isCloseDetail()
    {
        return $this->is_detail = false;
    }

    public function isOpenModalReview()
    {
        return $this->is_review = true;
    }

    public function isClonseModalReview()
    {
        return $this->is_review = false;
    }

    public function resetField()
    {
        $this->title = '';
        $this->method_learning = '';
        $this->description = '';
    }
}
