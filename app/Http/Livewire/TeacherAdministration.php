<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Administration as Administrations,
    User as Users,
    Comment as Comments,
};

class TeacherAdministration extends Component
{
    public  $is_review = false,
            $is_comment = false,
            $name,
            $title,
            $method_learning,
            $status,
            $comment,
            $description,
            $completeness,
            $administration,
            $classroom,
            $subject,
            $teacher,
            $teacher_id,
            $created_at,
            $id_administration,
            $administrations;


            public function render()
            {
                return view('livewire.teacher-administration',[

                    $this->administrations = Administrations::with('teacher')->latest()->get(),
        ]);
    }

    public function isModalReviewOpen()
    {
        return $this->is_review = true;
    }

    public function closeModalReview()
    {
        $this->resetField();

        return $this->is_review = false;


    }

    public function openCreateComment()
    {
        return $this->is_comment = true;
    }

    public function reviewAdministration($id_administration)
    {
        $this->isModalReviewOpen();

        $this->id_administration = $id_administration;

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
        $this->created_at = $this->administration->created_at->diffForHumans();
    }

    public function resetField()
    {
        $this->description = '';
    }

    public function comment($id_administration)
    {
        $this->id_administration = $id_administration;

         $administration = Administrations::with('comment')->where('id', $id_administration)->get();

         foreach ($administration as $administrasi) {
                Comments::create([
                    'administration_id' => $administrasi->id,
                    'description'       => $this->description,
                ]);
         }

         $this->resetField();

         $this->closeModalReview();

    }

}
