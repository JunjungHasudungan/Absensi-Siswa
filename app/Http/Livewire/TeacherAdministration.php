<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Administration as Administrations;

class TeacherAdministration extends Component
{
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
            $created_at,
            $administrations;
    public function render()
    {
        return view('livewire.teacher-administration',[
            $this->administrations = Administrations::all()
        ]);
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
        $this->teacher = $administration->teacher;
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
