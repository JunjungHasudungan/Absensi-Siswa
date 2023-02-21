<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Auth\User;
use App\Models\{
    Classroom as Classrooms,
    User as Users,
};
use Livewire\WithPagination;

class Classroom extends Component
{

    use WithPagination;

    // create properthies
    public  $is_create = false,
            $is_detail = false,
            $is_edit = false,
            $is_search = false,
            $search = '',
            $page = 1,
            $id_classroom,
            $code_classroom,
            $user_id,
            $classroom,
            $classrooms,
            $classroom_subject,
            $name,
            $teachers,
            $teacher_name,
            $students_name;

    // create rules
    protected $rules  = [
        'name'              => 'required|unique|string|max:10|min:3',
        'code_classroom'    => 'required|string|max:10|min:3',
        'user_id'           => 'required|integer'
    ];

    protected $listeners = [
        'deleteClassroom'
    ];

    public function openModalCreate()
    {
        return $this->is_create  = true;
    }

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
        $this->teachers = User::where('role_id', 2)->orderBy('name', 'asc')->get();
    }

    public function render()
    {
        $searchParam  = '%' . $this->search  . '%';

        return view('livewire.classroom', [

            $this->classrooms = Classrooms::where('name', 'LIKE', $searchParam)
                                ->orWhere('code_classroom', 'LIKE', $searchParam)->get(),

            $this->teachers = User::where('role_id', 2)->orderBy('name', 'asc')->get(),
        ]);
    }

    public function createClassroom()
    {
        $this->openModalCreate();
    }

    public function storeClassroom()
    {
        $this->validate([
            'name'                          => 'required|string|unique:classrooms,name',
            'code_classroom'                => 'required',
            'user_id'                       => 'required|integer'
        ],[
            'name.required'                 => 'Nama Kelas Wajib di isi...',
            'name.unique'                   => 'Nama Kelas Sudah di gunakan...',
            'code_classroom.required'       => 'Kode Kelas Wajib di isi..',
            'name'                          => 'required',
            'user_id'                       => 'required|integer'
        ]);

        Classrooms::create([
            'code_classroom'    => $this->code_classroom,
            'name'              => $this->name,
            'user_id'           => $this->user_id,
        ]);

        $this->resetFieldModal();

        $this->closeModalCreate();

        $this->dispatchBrowserEvent('toastr:info', [
            'message'   => 'Data Berhasil ditambahkan...'
        ]);
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
        $this->openModalDetail();

        $this->name = $classroom->name;

        dd($classroom);

    }

    public function closeModalDetail()
    {
        return $this->is_detail = false;
    }

    public function openModalEdit()
    {
        return $this->is_edit = true;
    }

    public function openSearch()
    {
        return $this->is_search = false;
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

        $this->dispatchBrowserEvent('swal:confirm', [
            'type'  => 'warning',
            'title' => 'Yakin Menghapus?',
            'text'  => '',
            'id'    => $id
        ]);
    }

    public function deleteClassroom($id)
    {
        Classrooms::where('id', $id)->delete();

        $this->dispatchBrowserEvent('classroomDeleted');
    }

    public function resetFieldModal()
    {
        $this->name = '';
        $this->code_classroom = '';
    }

}
