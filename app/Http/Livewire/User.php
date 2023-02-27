<?php

namespace App\Http\Livewire;

use App\Models\{
    User as Users,
    Role as Roles,
    Classroom as Classrooms,
    Subject as Subjects,
    };
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    // create all properthies we need
    public  $name,
            $email,
            $roles,
            $role,
            $role_id,
            $id_role,
            $classroom,
            $classrooms,
            $home_teacher,
            $home_teacher_name,
            $classroom_id,
            $amount_student,
            $amount_subject_classroom,
            $amount_subject_student,
            $subject_teacher,
            $subject_student,
            $nisn,
            $address,
            $password,
            $user,
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
            $this->users = Users::with(['role', 'classroom', 'homeTeacher', 'subjectUser'])->get(),
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
        // Users
        $this->user = $user;
        $this->openModalDetail();
        $this->classroom = $user->classroom->name ??  ''; // classroom name
        $id_student_classroom = $user->classroom->user_id ?? '' ;
        $id_classroom = $user->classroom->id ?? ''; // id classroom user
        $this->subject_student = $user->subjectUser ?? ''; // mata pelajaran siswa
        $this->subject_teacher = $user->subjectTeacher; // mata pelajaran untuk guru
        $this->home_teacher_name = $user->homeTeacher ?? ''; // nama wali kelas
        $this->amount_subject_classroom = DB::table('classroom_subject')->where('classroom_id', $id_classroom)->count();
        $this->amount_student = Users::where('classroom_id', $id_classroom)->where('role_id', 3)->count();
        $this->amount_subject_student = count($user->subjectUser) ?? '';
        $this->name = $user->name;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->nisn = $user->nisn ?? '';
        $this->role = $user->role->name;
        $this->home_teacher = Users::find($id_student_classroom);
        // dd($user->classroom);
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

        $this->resetField();
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
