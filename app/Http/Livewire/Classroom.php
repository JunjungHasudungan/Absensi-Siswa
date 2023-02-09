<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Classroom as Classrooms;
use App\Models\User as Users;

class Classroom extends Component
{
    // properti
    public $id_classroom, $name, $classrooms, $teacher_id, $teachers;
    public $isModal = false;
    public $isUpdate = false;
    public $isDetail = false;

    public function mount(Classroom $classroom)
    {
        $this->classrooms = $classroom;
    }

    public function render()
    {
        $this->teachers = Users::where('role_id', 2)->orderBy('name', 'asc')->pluck('name');

        $this->classrooms = Classrooms::with('homeTeacher')->get();

        return view('livewire.classroom');
    }

    public function openModal()
    {
        return $this->isModal = true;
    }

    public function openModalUpdate()
    {
        return $this->isUpdate = true;
    }

    public function closeModalUpdate()
    {
        return $this->isUpdate = false;
    }

    public function openModalDetail()
    {
        return $this->isDetail = true;
    }

    public function closeModalDetail()
    {

    }

    public function closeModal()
    {
        return $this->isModal = false;
    }

    public function resetInputField()
    {
        $this->name = '';
        $this->teacher_id = '';
    }

    // function untuk create data classroom
    public function create()
    {
        // panggil function resetFieldModal
        $this->resetInputField();

        // panggil function openModal
        $this->openModal();
    }

    public function editClassroom($id)
    {
        $this->resetInputField();

        $this->openModalUpdate();
    }

    public function store()
    {
        $this->validate([
            'name'  => 'required|string|max:25',
            'teacher_id'=> 'required|integer'
        ]);

        // create notification for message
        session()->flash('message', $this->id_classroom ? 'Data Kelas Berhasil Ditambahkan' :
    'Data Kelas Berhasil Diupdate');

    // tutup modal
    $this->resetInputField();
    $this->closeModal();
    }
}
