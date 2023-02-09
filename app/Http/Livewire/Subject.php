<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject as Subjects;

class Subject extends Component
{
    public $id_subject, $subjects, $name, $code_subject;

    // public Subjects $subjects;

    public $isModal = false;
    public $isUpdate = false;

    public function render()
    {
        $this->subjects = Subjects::all();

        return view('livewire.subject');
    }

    // cretate emit listener
    protected $listener = [
        'deleteSubjectListener' => 'deleteSubject'
    ];

    // create properties rules
    protected $rules = [
        'code_subject'     =>  'required|unique:subjects|string|max:25|min:3',
        'name'             =>  'required|string|max:25|min:6'
    ];


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
        $this->id_subject = '';
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
        $this->validate();
        try{
            Subjects::create([
                'code_subject'  => $this->code_subject,
                'name'          => $this->name
            ]);
            // give message
            session()->flash('success', 'Data Berhasil ditambahkan..');
        }catch(\Exception $e){
            session()->flash('error', 'Sistem bermasalah..');
        }


        // create notification message
        session()->flash('message', $this->id_subject ? 'Data Mata Pelajaran Berhasil ditambahkan..' :
        'Data Mata Pelajaran Berhasil diupdate..');

        // recall function closeModal
        $this->closeModal();

        // recall function reset field
        $this->resetField();
    }

    // create function for edit data
    public function edit($id)
    {
        // create object and get id from Subject class
        $subject = Subjects::findOrFail($id);

        // recall properties
        $this->id_subject = $id;
        $this->code_subject = $subject->code_subject;
        $this->name = $subject->name;

        // recall function open Modal
        $this->openModal();
    }

    // create function delete for item of subject data
    public function deleteSubject($id)
    {
        try{
            Subjects::where('id', $id)->delete();
            session()->flash('success', 'Data berhasil dihapus..');
        }catch(\Exception $e){
            sesion()->flash('error', 'Sistem sedang bermasalah..');
        }
    }
}
