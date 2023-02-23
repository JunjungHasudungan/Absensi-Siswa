<?php

namespace App\Http\Livewire;

use App\Models\{
    User as Users,
    Role as Roles,
    Classroom as Classrooms,
    };
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    // create all properthies we need
    public  $name,
            $email,
            $roles,
            $role_id,
            $id_role,
            $classrooms,
            $classroom_id,
            $nisn,
            $address,
            $password,
            $users,
            $is_student,
            $is_teacher,
            $search,
            $is_create = false,
            $id_edit = false,
            $is_search = false,
            $id_detail = false;

    public function render()
    {
        return view('livewire.user', [
            $this->is_student = Users::with('role')->where('role_id', 3)->get(),
            $this->roles = Roles::all(),
            $this->classrooms = Classrooms::all(),
            $this->is_teacher = Users::where('role_id', 2)->get(),

        ]);
    }

    public function closeModalCreate()
    {
        return $this->is_create = false;
    }

    public function resetField()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role_id = '';
        $this->classroom_id = '';
        $this->nisn = '';
        $this->address = '';

    }

    public function openModalCreate()
    {
        return $this->is_create = true;
    }

    public function createUser()
    {
        $this->openModalCreate();
    }

    public function storeUser()
    {
        $this->validate([
            'name'                  => 'required|string|max:25|min:3',
            'email'                 => 'required',
            'password'              => 'required',
            'role_id'               => 'required|integer',
            'classroom_id'          => 'nullable',
            'nisn'                  => 'nullable|max:25|min:3',
            'address'               => 'nullable|max:25|min:3',
        ],[
            'name'                  => 'Nama Wajib di isi..',
            'email'                 => 'Email Wajib di isi..',
            'password'              => 'Password Wajib disi',
            'role_id.required'      => 'Jabatan wajib dipilih..'
        ]);

        Users::create([
            'name'          => $this->name,
            'email'         => $this->email,
            'password'      => Hash::make($this->password),
            'role_id'       => $this->role_id,
            'classroom_id'  =>$this->classroom_id,
            'nisn'          => $this->nisn,
            'address'       => $this->address
        ]);

        $this->closeModalCreate();

        $this->resetField();

        $this->dispatchBrowserEvent('toastr:info', [
            'message'   => 'Data Berhasil ditambahkan...'
        ]);
        // dd('Berhasil..');
    }
}
