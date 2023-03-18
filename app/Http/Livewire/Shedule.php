<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject as Subjects;

class Shedule extends Component
{
    public  $subjects,
            $id_subject,
            $is_detail;
    public function render()
    {
        return view('livewire.shedule', [
            $this->subjects = Subjects::with(['teacher', 'classroomSubject'])->where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function isOpenDetail()
    {
        return $this->is_detail = true;
    }

    public function isCloseDetail()
    {
        return $this->is_detail = false;
    }

    public function detailSheduleSubject($id_subject)
    {
        $this->isOpenDetail();

        dd($id_subject);
    }
}
