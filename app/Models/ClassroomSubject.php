<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Weekday as WeekdayEnum;

class ClassroomSubject extends Model
{
    use HasFactory;

    protected $table = 'classroom_subject';

    // protected $guarded = [];

    protected $fillable = [
        'classroom_id', 'subject_id', 'weekday'
    ];

    // protected $casts  = [
    //     'weekday'   => WeekdayEnum::class
    // ];
}
