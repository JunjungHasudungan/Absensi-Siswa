<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject as Subjects;

class Subject extends Component
{
    public $id_subject, $name, $subjects, $code_subject;

    public $isModal = false;

    // function for open modal
    public function openModal()
    {
        return $this->isModal = true;
    }

    // function for clode modal
    public function closeModal()
    {
        return $this->isModal = false;
    }

    // function for clear all field
    public function resetField()
    {
        // recall all properties and give empty value
        $this->code_subject = '';
        $this->name = '';
    }

    // function for create new data subject
    public function create()
    {
        // recall function resetFieldModal first
        $this->resetField();

        // recall function openModal
        $this->openModal();
    }

    // function for store new data classroom
    public function store()
    {
        // recall function validate and fill it with array with key and required
        $this->validate([
            'code_subject'  => 'required|string|max:25',
            'name'          => 'required|string|max:25'
        ]);
    }

    public function render()
    {
        $this->subjects = Subjects::all();

        return view('livewire.subject');
    }
}
