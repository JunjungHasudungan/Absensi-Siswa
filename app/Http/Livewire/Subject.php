<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Http\Request;
use App\Helpers\{Weekday as WEEK_DAY,
    TimeProvide as TimeProvides,
    EndTimeProvide as EndTimeProvides,
    };
use App\Models\{
            Subject as Subjects,
            User,
            Classroom as Classrooms,
            ClassroomSubject as ClassroomSubjects,
        };
use Illuminate\Support\Facades\DB;
// use App\Helpers\Weekday;
use App\Enums\Weekday as EnumWeekday;

class Subject extends Component
{
    use WithPagination;

    // public Classrooms $classroom;

    public $id_subject,
            $subjects,
            $subject,
            $name,
            $code_subject,
            $teachers,
            $subject_teacher,
            $user_id,
            $teacher_name,
            $teacher_email,
            $start_time,
            $end_times,
            $search = '',
            $classroom,
            $classrooms,
            $enum_weekdays,
            $classroom_id,
            $classroom_subject,
            $classroom_amount,
            $weekday,
            $weekdays,
            $start,
            $subject_weekday,
            $table_pivot;

    public  $is_create = false,
            $is_edit = false,
            $is_search = false,
            $page = 1,
            $is_detail = false;

    public $allClassroom = []; // all classroom data
    public $subject_classrooms = []; // data array

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search'    => ['except'    => ''],
        'page'      => ['except'    => 1],
    ];

    public function updatedSearch()
    {
        $this->page = empty($this->search) ? 1 : $this->page;
    }

    public function mount()
    {
        $this->allClassroom = Classrooms::all();
        $this->subject_classrooms = [
            [
                'classroom_id'  => '',
                'day'           => '',
                'start_time'    => '',
                'end_time'      => ''
            ]
        ];
        $this->user_id = User::where('role_id', 2)->get();
        $this->subject_weekday = Subjects::with('subjectWeekday')->get();
    }

    public function render()
    {
        $searchParam = '%' . $this->search . '%';
        return view('livewire.subject', [
            $this->subjects = Subjects::with(['teacher', 'subjectWeekday', 'classroomSubject'])
                            ->where('name', 'like', $searchParam)
                            ->orwhere('code_subject', 'like', $searchParam)->get(),
            $this->teachers = User::where('role_id', 2)->get(),
            'subject_paginate'=> Subjects::paginate(5),
            $this->classrooms = Classrooms::all(),
            $this->weekdays = WEEK_DAY::WEEK_DAYS,
            $this->start = TimeProvides::TIME_PROVIDE,
            $this->end_times = EndTimeProvides::END_TIME_PROVIDE,
        ]);
    }

    // cretate emit listener
    protected $listeners = [
        'deleteClassroom',
    ];

    // create properties rules
    protected $rules = [
        'code_subject'     =>  'required|string|max:30|min:3',
        'name'             =>  'required|string|max:25|min:3',
        'user_id'          =>  'required|integer',
        'classroom_id'     =>   'required',
    ];


    // function reset Page pagination
    public function updatingSearch()
    {
        return $this->resetPage();
    }

    // function for open modal
    public function openCreateModal()
    {
        return $this->is_create = true;
    }

    // function for clode modal
    public function closeCreateModal()
    {
        return $this->is_create = false;
    }

    public function openDetailModal($id = null)
    {
        return $this->is_detail = true;
    }

    public function closeDetailModal()
    {
        return $this->is_detail = false;
    }

    public function openEditModal()
    {
        return $this->is_edit = true;
    }

    public function closeEditModal()
    {
        return $this->is_edit = false;
    }


    // function for clear all field
    public function resetField()
    {
        // recall all properties and give empty value
        $this->code_subject = '';
        $this->name = '';
        $this->id_subject = '';
        $this->user_id = '';
        $this->subject_classrooms = [];

    }

    // function for create new data subject
    public function createSubject()
    {
        $this->resetField();

        $this->openCreateModal();
    }

    public function addClassroom()
    {
        $this->subject_classrooms[] =
        [
            'classroom_id'  => '',
            'day'           => '',
            'start_time'    => '',
            'end_time'      => ''
        ];
    }

    public function removeClassroom($index)
    {
        unset($this->subject_classrooms[$index]);

        $this->subject_classrooms = array_values($this->subject_classrooms);
    }

    public function storeSubject()
    {
        // dd($this->start);
        $this->validate([
            'code_subject'      => 'required|unique:subjects|string|max:25|min:3',
            'name'              => 'required|string|max:25|min:3',
            'user_id'           => 'required',
            // 'classroom_id'      => 'required'
        ],[
            'code_subject.required' => 'Kode Mata Pelajaran Wajib di isi...',
            'code_subject.min'      => 'Kode Mata Pelajaran minimal 3 karakter',
            'code_subject.unique'   => 'Kode Mata Pelajaran Sudah Digunakan',
            'name.required'         => 'Nama Mata Pelajaran Wajib terisi..',
            'user_id.required'      => 'Guru Mata Pelajaran Wajib dipilih..',
            // 'classroom_id.required' => 'Kelas Wajib dipilih..',
        ]);
        $subject = new Subjects();

        $subject = Subjects::create([
            'code_subject'      => $this->code_subject,
            'name'              => $this->name,
            'user_id'           => $this->user_id,
            'classroom_id'      => $this->classroom_id ?? null,
        ]);

        foreach ($this->subject_classrooms as $classroom) {
                $subject->classroomSubject()->attach($classroom['classroom_id'],
                [   'day'           => $classroom['day'],
                    'start_time'    => $classroom['start_time'],
                    'end_time'      => $classroom['end_time']
                ],
            );
            // dd($classroom['end_time']);
            $this->classroom_id = $classroom['classroom_id'];
        }
            $subject->update([
                $subject->classroom_id = $this->classroom_id
            ]
        );



        $this->resetField();

        $this->closeCreateModal();


        $this->dispatchBrowserEvent('toastr:info', [
            'message'   => 'Data Berhasil ditambahkan...'
        ]);
    }

    public function editSubject($id_subject)
    {
        $this->openEditModal();

        $subject = Subjects::find($id_subject);
        $this->code_subject = $subject->code_subject;
        $this->name = $subject->name;
        $this->user_id = $subject->user_id;
        $this->id_subject = $subject->id;
        $this->classroom_id = $subject->classroom_id;
    }

    public function updateSubject($id_subject)
    {
        $subject = Subjects::find($id_subject);
        // dd('Testing update');
        $this->validate();

        $subject->update([
            'code_subject'      => $this->code_subject,
            'name'              => $this->name,
            'user_id'           => $this->user_id,
            'classroom_id'      => $this->classroom_id ?? null,
        ]);

        foreach ($this->subject_classrooms as  $classroom) {
            $subject->classroomSubject()->detach($classroom['classroom_id'],
                [
                    'day'           => $classroom['day'],
                    'start_time'    => $classroom['start_time'],
                    'end_time'      => $classroom['end_time']
                ]
            );
        }

        foreach ($this->subject_classrooms as $classroom) {
            $subject->classroomSubject()->attach($classroom['classroom_id'],
            [
                'day'           => $classroom['day'],
                'start_time'    => $classroom['start_time'],
                'end_time'      => $classroom['end_time']
            ]
        );
        $this->classroom_id = $classroom['classroom_id'];

        $subject->update([
            $subject->classroom_id = $this->classroom_id
        ]
    );

    }



        $this->closeEditModal();

        $this->resetField();

        $this->dispatchBrowserEvent('toastr:info', [
            'message'   => 'Data Berhasil diupdate...'
        ]);
    }

    public function deleteConfirmation($id){
        $this->id_subject = $id;

        $this->dispatchBrowserEvent('swal:confirm', [
            'type'  => 'warning',
            'title' => 'Are You sure to delete?',
            'text'  => '',
            'id'    => $id
        ]);
    }

    public function detailSubject($id_subject)
    {
        $this->openDetailModal();
        $subject = Subjects::find($id_subject);
        $this->subject = $subject;
        $this->name = $subject->name;
        $this->teacher_name = $subject->teacher->name ?: 0;
        $this->subject_weekday = $subject->classroomSubject;
    }

    public function deleteClassroom(Subjects $subject)
    {
        $subject->delete();

        $this->dispatchBrowserEvent('subjectDeleted');
    }
}
