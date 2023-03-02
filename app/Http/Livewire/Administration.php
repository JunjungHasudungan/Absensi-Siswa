<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{Administration as Administrations,
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
            $teacher,
            $title,
            $method_learning,
            $method_learnings,
            $subjects,
            $status,
            $comment,
            $description,
            $completeness,
            $classroom_id,
            $subject_id,
            $teacher_id;

    public function render()
    {
        return view('livewire.administration', [

            $this->administrations = Administration::all(),
            $this->subjects = Subjects::where('user_id', auth()->user()->id)->select('name')->get(),
            // dd($this->subjects)
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
            'title'                     => 'required|max:35',
            'subject_id'                => 'required',
            'method_learning'           => 'required',
            'classroom_id'              => 'required'
        ],[
            'title.required'            => 'Judul Materi wajib di isi..',
            'subject_id.required'       => 'Mata Pelajaran Wajib di pilih..',
            'method_learning.required'  => 'Metode Pengajaran wajib dipilih',
            'classroom_id.required'     => 'Kelas Wajib dipilih',
        ]);
        // dd('Testing');
       Administrations::create([
            'title' => $this->title,
            'subject_id'    => $this->subject_id,
            'method_learning'   => $this->method_learning,
            'completeness'      => $this->completeness,
            'classroom_id'      => $this->classroom_id,
            'teacher_id'        => auth()->user()->id
        ]);
            // $this->resetField();
            // $administration = new Administrations();
            // $administration->title = $this->title;
            // $administration->subject_id = $this->subject_id;
            // dd($administration);
            // $administration->save();
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
