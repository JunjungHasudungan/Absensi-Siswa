<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject as Subjects;
use App\Models\User;
use Livewire\WithPagination;


class Subject extends Component
{
    use WithPagination;

    public $id_subject, $subjects, $name, $code_subject, $id_teacher, $teacher_name;

    // public Subjects $subjects;

    public $is_create = false, $is_edit = false, $is_detail = false;

    public function render()
    {
        $this->subjects = Subjects::all();

        return view('livewire.subject');
    }

    // cretate emit listener
    protected $listener = [
        'deleteConfirmed' => 'deleteSubject',
    ];

    // create properties rules
    protected $rules = [
        'code_subject'     =>  'required|unique:subjects|string|max:25|min:3',
        'name'             =>  'required|string|max:25|min:4'
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
    }

    // function for create new data subject
    public function createSubject()
    {
        $this->resetField();

        $this->openCreateModal();

        $subject = new Subjects();

        $teacher_id = User::where('role_id', 2)->orderBy('name', 'asc')->get();

        $this->id_subject = $subject->id;
        $this->code_subject = $subject->code_subject;
        $this->name = $this->name;
        $this->id_teacher = $teacher_id;

        // dd($teacher_id);
    }

    // function for store new data classroom
    public function storeSubject()
    {
        $subject = new Subjects();

        $teacher_id = User::where('role_id', 2)->orderBy('name', 'asc')->get();

        dd($subject->code_subject);
        // dd($teacher_id);
        $this->validate();
        $this->id_subject = $subject->id;
        $this->code_subject = $subject->code_subject;
        $this->name = $subject->name;
        $this->id_teacher = $teacher_id;

        $subject->save();

        $this->dispatchBrowserEvent('success', ['message' => 'Data Baru Berhasil ditambahkan..']);


        // recall function closeCreateModal
        $this->closeCreateModal();

        // recall function reset field
        $this->resetField();
    }

    // create function for edit data
    public function editSubject(Subjects $subject)
    {
        // create object and get id from Subject class

        $this->openEditModal();

        $teacher_id = User::where('role_id', 2)->orderBy('name', 'asc')->get();

        $this->code_subject = $subject->code_subject;
        $this->name = $subject->name;
        $this->id_teacher = $teacher_id;
    }

    // create function delete for item of subject data

    public function deleteConfirmation($id){
        $this->id_subject = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }



    public function detailSubject(Subjects $subject)
    {
        $this->openDetailModal();
        $this->id_subject = $subject->id;
        $this->name = $subject->name;
        $this->teacher_name = $subject->teacher->name;

        // $subject->load('teacher');
    }

    public function deleteSubject()
    {
        $subject = Subjects::where('id', $this->id_subject)->first();
        $subject->delete();
        $this->dispatchBrowserEvent('subjectDeleted');
    }
}
