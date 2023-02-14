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
            $user_id,
            $classrooms,
            $name,
            $teachers;

    // create rules
    public $rules  =[
        'name'      => 'required|unique|string|max:10|min:3',
        'user_id'   => 'required|integer'
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

    public function closeModalDetail()
    {
        return $this->is_detail = false;
    }

    public function openModalEdit()
    {
        return $this->is_edit = true;
    }

    public function editClassroom($id)
    {
        $this->id_classroom = $id;

        $this->openModalEdit();
    }

    public function closeModalEdit()
    {
        return $this->is_edit = false;
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
