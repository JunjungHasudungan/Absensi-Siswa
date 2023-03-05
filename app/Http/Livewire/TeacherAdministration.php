<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Administration as Administrations,
    User as User,
};

class TeacherAdministration extends Component
{
    public User $user;
    public  $is_review = false,
            $is_search = false,
            $name,
            $title,
            $method_learning,
            $status,
            $comment,
            $completeness,
            $classroom,
            $subject,
            $teacher,
            $teachers,
            $teacher_id,
            $created_at,
            $administrations;



            public function render()
            {
                $this->administrations = Administrations::with('teacher')->get();

                foreach ($this->administrations as $key => $value) {
                   $this->teacher = $value;
                }
                dd($this->teacher);
        return view('livewire.teacher-administration');
    }

    public function getNameTeacher()
    {
        foreach ($this->administratiions as $key => $value) {
            dd($value->name);
        }
    }

    public function isModalReviewOpen()
    {
        return $this->is_review = true;
    }

    public function closeModalReview()
    {
        return $this->is_review = false;
    }

    public function reviewAdministration($id_administration)
    {
        $this->isModalReviewOpen();

        $administration = Administrations::find($id_administration);
        // dd($administration);
        $this->teacher = $administration->teacher ?: null;
        $this->classroom = $administration->classroom;
        $this->subject = $administration->subject;
        $this->title = $administration->title;
        $this->created_at = $administration->created_at;
        $this->method_learning = $administration->method_learning;
        $this->completeness = $administration->completeness;
        $this->status = $administration->status;
        $this->comment = $administration->comment;

        // dd($this->method_learning);
    }

    public function sendComment($comment)
    {
        dd($comment);
    }
    public function updateAdministration($id_administration)
    {
        dd($id_administration);
    }
}
