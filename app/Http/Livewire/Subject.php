<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Http\Request;
use App\Models\{
            Subject as Subjects,
            User,
            Classroom as Classrooms,
        };

use App\Helpers\Weekday;

class Subject extends Component
{
    use WithPagination;

    public Classrooms $classroom;

    public $id_subject,
            $subjects,
            $subject,
            $name,
            $code_subject,
            $teachers,
            $subject_teacher,
            $teacher_id,
            $teacher_name,
            $teacher_email,
            $start_time,
            $end_time,
            $search = '',
            $classrooms,
            $classroom_id,
            $classroom_subject,
            $classroom_amount,
            $weekdays,
            $subject_weekday;

    public  $is_create = false,
            $is_edit = false,
            $is_search = false,
            $page = 1,
            $is_detail = false;

    public $allClassroom = [];
    public $classroomSubject = []; // data array

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search'    => ['except'    => ''],
        'page'      => ['except'    => 1],
    ];

    public function updatedSearch()
    {
        $this->page = empty($this->search) ? 1 : $this->page;
    }

    public function mount()
    {
        $this->allClassroom = Classrooms::all();
        $this->classroomSubject = ['classroom_id'  => ''];
        $this->teacher_id = User::where('role_id', 2)->get();
        $this->weekdays = Weekday::WEEK_DAYS;
        $this->subject_weekday = Subjects::with('subjectWeekday')->get();
    }

    public function render()
    {
        $searchParam = '%' . $this->search . '%';
        return view('livewire.subject', [
            $this->subjects = Subjects::with(['teacher', 'subjectWeekday', 'classroomSubject'])
                            ->where('name', 'like', $searchParam)
                            ->orwhere('code_subject', 'like', $searchParam)->get(),
            $this->weekdays = Weekday::WEEK_DAYS,
            $this->teachers = User::where('role_id', 2)->get(),
            'subject_paginate'=> Subjects::paginate(5),
            $this->classrooms = Classrooms::all(),
        ]);
    }

    // cretate emit listener
    protected $listeners = [
        'deleteClassroom',
    ];

    // create properties rules
    protected $rules = [
        'code_subject'     =>  'required|string|max:30|min:3',
        'name'             =>  'required|string|max:25|min:4',
        'teacher_id'       =>  'required|integer',
        // 'classroom_id'     =>   'required|max:5'
    ];


    // function reset Page pagination
    public function updatingSearch()
    {
        return $this->resetPage();
    }

    // function for open modal
    public function openCreateModal()
    {
        return $this->is_create = true;
    }

    // function for clode modal
    public function closeCreateModal()
    {
        return $this->is_create = false;
    }

    public function openDetailModal($id = null)
    {
        return $this->is_detail = true;
    }

    public function closeDetailModal()
    {
        return $this->is_detail = false;
    }

    public function openEditModal()
    {
        return $this->is_edit = true;
    }

    public function closeEditModal()
    {
        return $this->is_edit = false;
    }


    // function for clear all field
    public function resetField()
    {
        // recall all properties and give empty value
        $this->code_subject = '';
        $this->name = '';
        $this->id_subject = '';
        $this->teacher_id = '';
    }

    // function for create new data subject
    public function createSubject()
    {
        $this->resetField();

        $this->openCreateModal();
    }

    public function addClassroom()
    {
        $this->classroomSubject[] = ['classroom_id' => ''];
    }

    public function removeClassroom($index)
    {
        unset($this->classroomSubject[$index]);

        $this->classroomSubject = array_values($this->classroomSubject);
    }

    public function storeSubject()
    {

        $this->validate([
            'code_subject'      => 'required|unique:subjects|string|max:25|min:3',
            'name'              => 'required|string|max:25|min:3',
            'teacher_id'        => 'required',
        ],[
            'code_subject.required' => 'Kode Mata Pelajaran Wajib di isi...',
            'code_subject.min'      => 'Kode Mata Pelajaran minimal 3 karakter',
            'code_subject.unique'   => 'Kode Mata Pelajaran Sudah Digunakan',
            'name.required'         => 'Nama Mata Pelajaran Wajib terisi..',
            'teacher_id.required'   => 'Guru Mata Pelajaran Wajib dipilih..',
        ]);

        Subjects::create([
            'code_subject'      => $this->code_subject,
            'name'              => $this->name,
            'teacher_id'        => $this->teacher_id,
        ]);

        $this->closeCreateModal();

        $this->resetField();

        $this->dispatchBrowserEvent('toastr:info', [
            'message'   => 'Data Berhasil ditambahkan...'
        ]);
    }

    public function editSubject($id_subject)
    {
        $this->openEditModal();

        $subject = Subjects::find($id_subject);

        $this->code_subject = $subject->code_subject;
        $this->name = $subject->name;
        $this->teacher_id = $subject->teacher_id;
        $this->id_subject = $subject->id;
    }

    public function updateSubject($id_subject)
    {
        $subject = Subjects::find($id_subject);

        $this->validate();

        $subject->update([
            'code_subject'      => $this->code_subject,
            'name'              => $this->name,
            'teacher_id'        => $this->teacher_id
        ]);

        // dd($subject);

        $this->closeEditModal();

        $this->resetField();

        $this->dispatchBrowserEvent('toastr:info', [
            'message'   => 'Data Berhasil diupdate...'
        ]);
    }

    public function deleteConfirmation($id){
        $this->id_subject = $id;

        $this->dispatchBrowserEvent('swal:confirm', [
            'type'  => 'warning',
            'title' => 'Are You sure to delete?',
            'text'  => '',
            'id'    => $id
        ]);
    }

    public function detailSubject(Subjects $subject)
    {
        $this->openDetailModal();

        $this->name = $subject->name;
        $this->teacher_name = $subject->teacher->name;
        $this->teacher_email = $subject->teacher->email;
        $this->subject_weekday = $subject->subjectWeekday;
        $this->classroom_amount = count($subject->classroomSubject);
        $this->classroom_subject = $subject->classroomSubject;
    }

    public function deleteClassroom(Subjects $subject)
    {
        $subject->delete();

        $this->dispatchBrowserEvent('subjectDeleted');
    }
}
