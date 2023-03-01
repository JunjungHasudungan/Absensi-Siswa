<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Administration as Administrations;

class Administration extends Component
{
    public  $administrations,
            $is_create = false,
            $is_review = false,
            $is_edit = false,
            $is_detail = false,
            $teacher,
            $title,
            $method,
            $status,
            $comment,
            $description,
            $completeness,
            $classroom_id,
            $subject_id,
            $teacher_id;

    public function render()
    {
        return view('livewire.administration', [

            $this->administrations = Administration::with(['teachers', 'clasroom', 'subject'])->get(),
        ]);
    }

    public function isOpenModalCreate()
    {
        return $this->is_create = false;
    }

    public function isCloseModalCreate()
    {
        return $this->is_create = false;
    }

    public function isOpenModalEdit()
    {
        return $this->is_edit = true;
    }

    public function isCloseModalEdit()
    {
        return $this->is_edit = false;
    }

    public function isOpenModalReview()
    {
        return $this->is_review = true;
    }

    public function isClonseModalReview()
    {
        return $this->is_review = false;
    }

    public function resetField()
    {
        $this->title = '';
        $this->method = '';
        $this->description = '';
    }
}
