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
use Illuminate\Support\Str;

class User extends Component
{
    // create all properthies we need
    public  $name,
            $email,
            $roles,
            $role,
            $role_id,
            $id_role,
            $id_user,
            $classroom,
            $classrooms,
            $all_classroom,
            $home_teacher,
            $home_teacher_classroom,
            $get_classroom = '',
            $classroom_id,
            $amount_student,
            $selectGroup,
            $amount_subject_classroom,
            $amount_subject_student,
            $subject_teacher,
            $subject_student,
            $classroom_subject,
            $nisn,
            $address,
            $password,
            $user,
            $users,
            $students,
            $user_classroom,
            $is_student,
            $is_teacher,
            $teacher,
            $teacher_id,
            $search,
            $page = 1,
            $is_create = false,
            $is_edit = false,
            $is_search = false,
            $is_detail = false;
        public $testing = 'testing';

    public $selected = [];
    public $clasroomSubject = [];

    public function setClassroom($id_classroom){
        $this->get_classroom = $id_classroom;
        dd($this->get_classroom);
    }

    public function render()
    {
        $searchParam = '%' . $this->search . '%'; // var for search field
        return view('livewire.user', [
            $this->users = Users::all(),
            $this->roles = Roles::all(),
            $this->users = Users::with(['role', 'classroom', 'homeTeacher', 'subjectUser'])
            ->where('name', 'LIKE', $searchParam)
            ->orWhere('role_id', 'LIKE', $searchParam)->get(),
            $this->classrooms = Classrooms::all(),
            $this->is_teacher = Users::where('role_id', 2)->get(),
            // $this->getClassroom(),

        ]);
    }

    public $rules = [
        'name'              => 'required',
        'email'             => 'required|unique',
        'password'          => 'required',
        'role_id'           => 'required',
        'classroom_id'      => 'nullable|array',
        'nisn'              => 'nullable',
        'address'           => 'nullable'
    ];

    protected $queryString = [
        'search'    => ['except'    => ''],
        'page'      => ['except'    => 1],
    ];

    public function updatedSearch()
    {
        $this->page = empty($this->search) ? 1 : $this->page;
    }

    protected $listeners = [
        'deleteClassroom',
    ];

    public function closeModalCreate()
    {
        return $this->is_create = false;
    }

    public function getClassroom()
    {
        $classrooms = Classrooms::all();
        foreach($classrooms as $classroom){
            $this->all_classroom = $classroom;

        }
        dd($classrooms);
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

    public function detailUser($id_user)
    {
        $user = Users::with(['classroom', 'homeTeacher', 'subjectUser', 'subjectTeacher'])->find($id_user);
        $this->user = $user;
        $this->openModalDetail();
        $this->classroom = $user->classroom->name ??  ''; // classroom name
        $classroom_id_student = $user->classroom->id ?? ''; // classroom id student
        $classroom_student = Classrooms::where('id', $classroom_id_student)->get(); // id classroom

        foreach($classroom_student as $classroom){
            $this->teacher_id = $classroom->user_id;
        }
        $this->teacher = Users::select('name')->with(['homeTeacher'])->where('role_id', 2)
                            ->where('id', $this->teacher_id)->get(); // home teacher name

        $id_student_classroom = $user->classroom->user_id ?? '' ;
        $id_classroom = $user->homeTeacher->id ?? ''; // id classroom teacher
        $this->subject_student = $user->subjectUser ?? ''; // mata pelajaran siswa
        // dd($this->subject_student);
        $this->subject_teacher = $user->subjectTeacher ?? ''; // mata pelajaran untuk guru
        $this->home_teacher_classroom = $user->homeTeacher ?? ''; // nama kelas wali
        $this->amount_subject_classroom = DB::table('classroom_subject')->where('classroom_id', $id_classroom)->count();
        $this->amount_student = Users::where('classroom_id', $id_classroom)->where('role_id', 3)->count();
        $this->amount_subject_student = count($user->subjectUser) ?? '';
        $this->name = $user->name;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->nisn = $user->nisn ?? '';
        $this->role = $user->role->name;
        $this->home_teacher = Users::find($id_student_classroom);
        $this->all_classroom = Classrooms::select('name')->get();
        // $this->testing;
    }

    public function closeModalDetail()
    {
        return $this->is_detail = false;
    }

    public function openModalEdit()
    {
        return $this->is_edit = true;
    }

    public function updated($key, $value)
    {
        $explode = Str::of($key)->explode('.');
       if($explode[0] === 'selectGroup' && is_numeric($value)){

       }elseif ($explode[0] === 'selectGrop' && empty($value)) {
        # code...
       }

    }

    public function editUser($id_user)
    {
        $user = Users::find($id_user);
        $this->user = $user;
        $this->openModalEdit();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';
        $this->address = $user->address;
        $this->classroom = $user->classroom ?? ''; // classroom student
        $this->home_teacher = $user->homeTeacher ?? '';
        $this->subject_student = $user->subjectUser ?: 0;
        $this->nisn = $user->nisn ?? '';
        $this->role = $user->role;
        $id_role = $this->role->id;
        $this->roles = Roles::where('id', $id_role)->get();
        $this->classroom_subject = Subjects::with('classroomSubject')->get();
        $get_classroom = $user->classroom_id;
        // dd($get_classroom);

        $this->all_classroom = Classrooms::all();
        $this->id_user = $user->id;
        // $this->setClassroom($get_classroom);
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
            'role_id'               => 'required',
            'address'               => 'nullable',
            'nisn'                  => 'nullable|unique',
            'classroom_id'          => 'nullable'
        ],[
            'name'                  => 'Nama Wajib di isi..',
            'email'                 => 'Email Wajib di isi..',
            'email.required'        => 'nama email sudah dipakai',
            'password'              => 'Password Wajib disi',
            'address.nullable'      => 'Alamat siswa wajib diisi..',
            'nisn.unique'           => 'NISN siswa wajib diisi..',
            'classroom_id.required' => 'Kelas wajib dipilih..',
            'role_id.required'      => 'Jabatan wajib dipilih..',
        ]);

            $user = new Users();
            $id_classroom = $user->classroom_id;

            Users::create([
                'name'          => $this->name,
                'email'         => $this->email,
                'password'      => Hash::make($this->password),
                'role_id'       => $this->role_id,
                'classroom_id'  => $this->classroom_id ?: $id_classroom,
                'address'       => $user->address ?: $this->address,
                'nisn'          => $user->nisn ?: $this->nisn,
            ]);

        $this->closeModalCreate();

        $this->resetField();

        $this->dispatchBrowserEvent('toastr:info', [
            'message'   => 'Data Berhasil ditambahkan...'
        ]);
    }

    public function updateUser($id_user)
    {
        $user = Users::find($id_user);

        $this->validate([
            'password'      => 'required',
            'role_id'       => 'required'
        ],[
            'password.required'     => 'Password wajib diisi..',
            'role_id.required'      => 'Jabatan Wajib diisi..'
        ]);

        $user->update([
            'name'              => $this->name,
            'address'           => $this->address,
            'password'          => bcrypt($this->password),
            'email'             => $this->email,
            'nisn'              => $this->nisn ?? '',
            'role_id'           => $this->role_id,
            'classroom_id'      => $this->classroom_id ?:  null,
        ]);

        $this->closeModalEdit();

        $this->resetField();

        $this->dispatchBrowserEvent('toastr:info', [
            'message'   => 'Data Berhasil diupdate...'
        ]);
    }

    public function deleteConfirmation($id)
    {
        $this->id_user = $id;

        $this->dispatchBrowserEvent('swal:confirm', [
            'type'  => 'warning',
            'title' => 'Are You sure to delete?',
            'text'  => '',
            'id'    => $id
        ]);
    }

    public function deleteClassroom(Users $user)
    {
        $user->delete();

        $this->dispatchBrowserEvent('subjectDeleted');
    }
}
