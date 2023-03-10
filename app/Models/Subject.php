<?php

namespace App\Models;

use Carbon\Carbon;
use App\Helpers\Weekday as Weekdays;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subjectWeekday()
    {
        return $this->belongsToMany(Weekday::class);
    }

    public function classroomSubject()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_subject')
                            ->withPivot('day', 'start_time', 'end_time');
    }

}
