<?php

namespace App\Http\Livewire;

use App\Models\{
    User as Users,
    Role as Roles,
    Classroom as Classrooms,
    };
use Livewire\Component;

class User extends Component
{
    // create all properthies we need
    public  $name,
            $email,
            $roles,
            $role_id,
            $classrooms,
            $classroom_id,
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
            $this->is_student = Users::where('role_id', 3)->get(),
            $this->roles = Roles::all(),
            $this->classrooms = Classrooms::all(),
            $this->is_teacher = Users::where('role_id', 2)->get(),

        ]);
    }

    public function closeModalCreate()
    {
        return $this->is_create = false;
    }

    public function openModalCreate()
    {
        return $this->is_create = true;
    }

    public function createUser()
    {
        $this->openModalCreate();
    }
}
