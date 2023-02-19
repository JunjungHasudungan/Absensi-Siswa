<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Http\Request;
use App\Models\{
            Subject as Subjects,
            User,
        };


class Subject extends Component
{
    use WithPagination;

    public $id_subject,
            $subjects,
            $subject,
            $name,
            $code_subject,
            $teachers,
            $teacher_id,
            $teacher_name,
            $start_time,
            $end_time,
            $subject_weekday;

    public  $is_create = false,
            $is_edit = false,
            $is_search = false,
            $is_detail = false;

    public function mount()
    {
        $this->teacher_id = User::where('role_id', 2)->get();
        $this->subject_weekday = Subjects::with('subjectWeekday')->get();
    }

    public function render()
    {
        return view('livewire.subject', [
            $this->subjects = Subjects::with(['teacher', 'subjectWeekday'])->get(),
            $subject_paginate = Subjects::paginate(5),
            $this->teachers = User::where('role_id', 2)->get(),
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
        'teacher_id'       =>   'required|integer'
    ];



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

    public function storeSubject()
    {
        $this->validate([
            'code_subject'      => 'required|unique:subjects|string|max:25|min:3',
            'name'              => 'required|string|max:25|min:3',
            'teacher_id'        => 'required|integer'
        ],[
            'code_subject.required' => 'Kode Mata Pelajaran Wajib di isi...',
            'code_subject.min'      => 'Kode Mata Pelajaran minimal 3 karakter',
            'code_subject.unique'   => 'Kode Mata Pelajaran Sudah Digunakan',
            'name.required'         => 'Nama Mata Pelajaran Wajib terisi..',
            'teacher_id'            => 'Guru Mata Pelajaran Wajib dipilih..'
        ]);

        Subjects::updateOrCreate([
            'code_subject'      => $this->code_subject,
            'name'              => $this->name,
            'teacher_id'        => $this->teacher_id
        ]);

        $this->closeCreateModal();

        $this->resetField();

        $this->dispatchBrowserEvent('toastr:info', [
            'message'   => 'Data Berhasil ditambahkan...'
        ]);
    }

    public function editSubject($id)
    {
        $this->openEditModal();

        $teachers = User::where('role_id', 2)->orderBy('name', 'asc')->get();

        $subject = Subjects::find($id);

        // dd($subject);
        $this->code_subject = $subject->code_subject;
        $this->name = $subject->name;
        $this->teacher_id = $teachers;
        $this->id_subject = $id;

        $this->dispatchBrowserEvent('successStoredSubject');
    }

    public function updateSubject($id_subject)
    {
        $subject = Subjects::find($id_subject);

        $subject->code_subject = $this->code_subject;
        $subject->name = $this->name;
        $subject->teacher_id = $this->teacher_id;
        $subject->save();

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

        $this->id_subject = $subject->id;
        $this->name = $subject->name;
        $this->teacher_name = $subject->teacher->name;

        // dd($this->teacher_name);
        $this->subject_weekday = $subject->subjectWeekday;
    }

    public function deleteClassroom($id)
    {
        Subjects::where('id', $id)->delete();

        $this->dispatchBrowserEvent('subjectDeleted');
    }
}
