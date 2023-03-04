<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Administration as Administrations,
    Classroom as Classrooms,
    Subject as Subjects,
};
use Illuminate\Support\Facades\DB;
// use App\Models\Subject;

class Administration extends Component
{
    public  $administrations,
            $id_administration,
            $is_create = false,
            $is_review = false,
            $is_edit = false,
            $is_detail = false,
            $teacher_name,
            $title,
            $method_learning,
            $method_learnings,
            $subject,
            $subjects,
            $classroom,
            $classrooms,
            $status,
            $comment,
            $description,
            $completeness,
            $classroom_id,
            $subject_id,
            $user_id,
            $teacher_id;


    public function mount()
    {
        $this->subjects = Subjects::with('classroomSubject')
                                    ->where('user_id', auth()->user()->id)->get();

    }

    public function render()
    {
        return view('livewire.administration', [

            $this->administrations = Administrations::with(['teacher', 'subject', 'classroom', 'comment'])
                                    ->where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public $listeners = [
        'deleteClassroom'
    ];

    protected $rules = [
        'title'             => 'required|string|max:20',
        'method_learning'   => 'required',
        'status'            => 'required',
        'completeness'      => 'required',
        'classroom_id'      => 'required',
        'subject_id'        => 'required',
        'user_id'           => 'required'
    ];

    public function isOpenModalCreate()
    {
        return $this->is_create = true;
    }

    public function storeAdministration()
    {
        $this->isOpenModalCreate();

        $this->validate([
            'title'                         => 'required',
            'subject_id'                    => 'required',
            'classroom_id'                  => 'required',
            'method_learning'               => 'required',
            'completeness'                  => 'required'
        ],[
            'title.required'                => 'Judul Mata Pelajaran Wajib diisi..',
            'subject_id.required'           => 'Mata Pelajaran Wajib dipilih..',
            'classroom_id.required'         => 'Kelas Wajib dipilih',
            'method_learning.required'      => 'Metode Wajib dipilih..',
            'completeness.required'         => 'Ketuntasan Wajib dipilih..'

        ]);

        Administrations::create([
            'title'             => $this->title,
            'completeness'      => $this->completeness,
            'method_learning'   => $this->method_learning,
            'subject_id'        => $this->subject_id,
            'classroom_id'      => $this->classroom_id,
            'user_id'           => auth()->user()->id,
        ]);

            $this->resetField();

            $this->isCloseModalCreate();

            $this->dispatchBrowserEvent('toastr:info', [
                'message'   => 'Data Berhasil ditambahkan...'
            ]);
    }

    public function deleteConfirmation($id)
    {
        $this->id_administration = $id;

        $this->dispatchBrowserEvent('swal:confirm', [
            'type'  => 'warning',
            'title' => 'Yakin Menghapus?',
            'text'  => '',
            'id'    => $id
        ]);
    }

    public function isCloseModalCreate()
    {
        $this->resetField();

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
        $this->classroom = $administration->classroom;
        $this->subject = $administration->subject;
        $this->title = $administration->title;
        $this->completeness = $administration->completeness;
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
        $this->classroom_id = '';
        $this->subject_id = '';
        $this->completeness = '';
    }

    public function deleteClassroom($id)
    {
        Administrations::where('id', $id)->delete();

        $this->dispatchBrowserEvent('classroomDeleted');
        // dd($administration);
    }
}
