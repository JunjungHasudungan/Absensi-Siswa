<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Administration as Administrations,
    User as Users,
};

class TeacherAdministration extends Component
{
    // public User $user;
    public  $is_review = false,
            $is_search = false,
            $name,
            $title,
            $method_learning,
            $status,
            $comment,
            $completeness,
            $administration,
            $classroom,
            $subject,
            $teacher,
            $teachers,
            $teacher_id,
            $created_at,
            $administrations;



            public function render()
            {
                return view('livewire.teacher-administration',[

                    $this->administrations = Administrations::with('teacher')->get(),
        ]);
    }

    public function isModalReviewOpen()
    {
        return $this->is_review = true;
    }

    public function closeModalReview()
    {
        $administration  = Administrations::all();
        $status = 1;

        $ad = Administrations::find($administration);
        $ad->status = 1;

        return $this->is_review = false;

    }

    public function reviewAdministration($id_administration)
    {
        $this->isModalReviewOpen();

        $this->administration = Administrations::find($id_administration);
        $this->teacher = $this->administration->teacher ?: null;
        $this->classroom = $this->administration->classroom;
        $this->subject = $this->administration->subject;
        $this->title = $this->administration->title;
        $this->created_at = $this->administration->created_at;
        $this->method_learning = $this->administration->method_learning;
        $this->completeness = $this->administration->completeness;
        $this->status = $this->administration->status;
        $this->comment = $this->administration->comment;
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
