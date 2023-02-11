<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject as Subjects;
use App\Models\User;
use Livewire\WithPagination;
use App\Http\Requests\UpdateSubjectRequest;


class Subject extends Component
{
    use WithPagination;

    public $id_subject, $subjects, $subject, $name, $code_subject, $teachers, $teacher_id, $teacher_name;

    // public Subjects $subjects;

    public $is_create = false, $is_edit = false, $is_detail = false;

    public function render()
    {
        $this->subjects = Subjects::all();
        $this->teachers = User::where('role_id', 2)->get();

        return view('livewire.subject');
    }

    // cretate emit listener
    protected $listener = [
        'deleteConfirmed' => 'deleteSubject',
    ];

    // create properties rules
    protected $rules = [
        'code_subject'     =>  'required|string|max:30|min:3',
        'name'             =>  'required|string|max:25|min:4',
        'teacher_id'       =>   'required|integer'
    ];


    public function mount()
    {
        $this->teachers = User::where('role_id', 2)->get();
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
    }

    // function for create new data subject
    public function createSubject()
    {
        $this->resetField();

        $this->openCreateModal();

    }
    
    public function storeSubject()
    {
        $subject = new Subjects();
        
        $this->validate([
            'code_subject'      => 'required|unique:subjects|string|max:25|min:3',
            'name'              => 'required|string|max:25|min:3',
            'teacher_id'        => 'required|integer'
        ],[
            'code_subject.min'      => 'Kode Mata Pelajaran minimal 3 karakter',
            'code_subject.unique'   => 'Kode Mata Pelajaran Sudah Digunakan',
            'name.required'         => 'Nama Mata Pelajaran Wajib terisi..'
        ]);
        
        $subject->create([
            'code_subject'      => $this->code_subject,
            'name'              => $this->name,
            'teacher_id'        => $this->teacher_id
        ]);

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
        $this->openEditModal();

        $teachers = User::where('role_id', 2)->orderBy('name', 'asc')->get();

        $this->code_subject = $subject->code_subject;
        $this->name = $subject->name;
        $this->teachers = $teachers;

        // dd($this->teachers);
    }

    public function updateUpdate($id)
    {
        $this->subject = Subjects::where('id', $id)->update([
            'code_subject'      => $this->code_subject,
            'name'              => $this->name,
            'teacher_id'        => $this->teacher_id,
        ]);

        $this->subject->save();
    }

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
