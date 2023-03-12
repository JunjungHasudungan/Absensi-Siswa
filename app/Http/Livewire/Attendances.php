<?php

namespace App\Http\Livewire\Teacher;

// use App\Models\Attendance;
use Livewire\Component;

class Attendances extends Component
{
    public  $is_create = false,
            $is_detail = false,
            $is_update = false;

    public function render()
    {
        return view('livewire.attendances');
    }

    public function addAttendance($id)
    {
        dd($id);
    }
}
