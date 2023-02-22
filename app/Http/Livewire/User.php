<?php

namespace App\Http\Livewire;

use App\Models\User as Users;
use Livewire\Component;

class User extends Component
{
    // create all properthies we need
    public  $name,
            $email,
            $role_id,
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
            $this->is_teacher = Users::where('role_id', 2)->get(),
        ]);
    }
}
