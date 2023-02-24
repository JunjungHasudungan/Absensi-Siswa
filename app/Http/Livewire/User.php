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
            $user_classroom,
            $is_student,
            $is_teacher,
            $search,
            $is_create = false,
            $is_edit = false,
            $is_search = false,
            $is_detail = false;

    public function render()
    {
        return view('livewire.user', [
            $this->users = Users::all(),
            // $this->users = Users::with('role')->where('role_id', 3)->get(),
            $this->roles = Roles::all(),
            $this->users = Users::with(['role', 'classroom'])->get(),
            $this->classrooms = Classrooms::all(),
            $this->is_teacher = Users::where('role_id', 2)->get(),

        ]);
        // dd($this->users);
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

    public function openModalDetail()
    {
        return $this->is_detail = true;
    }

    public function detailUser(Users $user)
    {
        $this->openModalDetail();

        dd($user);
    }

    public function closeModalDetail()
    {
        return $this->is_detail = false;
    }

    public function openModalEdit()
    {
        return $this->is_edit = true;
    }

    public function editUser(Users $user)
    {
        $this->openModalEdit();

        $this->user_classroom = Users::find($user);
        // dd('edit user');
        // $this->user_classroom = $user->classroom;

        dd($this->user_classroom);
    }

    public function closeModalEdit()
    {
        return $this->is_edit = false;
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
