<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Classroom as Classrooms;
use App\Models\User as Users;
use Illuminate\Foundation\Auth\User;

class Classroom extends Component
{

    // create properthies
    public  $is_create = false,
            $is_detail = false,
            $is_edit = false,
            $id_classroom,
            $code_classroom,
            $user_id,
            $classrooms,
            $name,
            $teachers,
            $teacher_name,
            $students_name;

    // create rules
    protected $rules  =[
        'name'      => 'required|unique|string|max:10|min:3',
        'user_id'   => 'required|integer'
    ];

    protected $listener = [
        'deleteConfirmed'   => 'deleteClasroom'
    ];
    public function openModalCreate()
    {
        return $this->is_create  = true;
    }

    public function mount()
    {
        $this->teachers = User::where('role_id', 2)->orderBy('name', 'asc')->get();
    }

    public function createClassroom()
    {
        $this->openModalCreate();
    }

    public function storeClassroom()
    {
        $this->validate([
            'name.required' => 'Nama Kelas Wajib di isi...',
            'name.unique'   => 'Nama Kelas Sudah di gunakan...'
        ],[
            'name'      => 'required',
            'user_id'   => 'required|integer'
        ]);

        $classroom = Classrooms::create([
            'name'      => $this->name,
            'user_id'   => $this->user_id,
        ]);

        // $this->resetFieldModal();

        // $this->closeModalCreate();
    }

    public function closeModalCreate()
    {
        return $this->is_create = false;
    }

    public function openModalDetail()
    {
        return $this->is_detail = true;
    }

    public function detailClassroom(Classrooms $classroom)
    {
        $this->id_classroom = $classroom->id;

        $this->openModalDetail();

        $this->students_name = $classroom->students()->where('role_id', 3)->get();
        $this->code_classroom = $classroom->code_classroom;
        $this->teacher_name  = $classroom->homeTeacher->name;
    }

    public function closeModalDetail()
    {
        return $this->is_detail = false;
    }

    public function openModalEdit()
    {
        return $this->is_edit = true;
    }

    public function editClassroom(Classrooms $classroom)
    {
        $this->id_classroom = $classroom->id;
        $this->code_classroom  = $classroom->code_classroom;
        $this->name = $classroom->name;
        $this->user_id = $classroom->user_id;

        $this->openModalEdit();
    }

    public function updateClassroom(Classrooms $classroom)
    {
        dd('Testing updating');
    }

    public function closeModalEdit()
    {
        return $this->is_edit = false;
    }


    public function deleteConfirmation($id)
    {
        $this->id_classroom = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function resetFieldModal()
    {
        $this->name = '';
    }

    public function render()
    {
        $this->classrooms = Classrooms::all();

        $this->teachers = User::where('role_id', 2)->orderBy('name', 'asc')->get();

        return view('livewire.classroom');
    }
}
