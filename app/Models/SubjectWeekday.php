<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectWeekday extends Model
{
    use HasFactory;

    protected $table = 'subject_weekday';

    protected $fillable = [
        'subject_id', 'weekday_id', 'start_time', 'end_time'
    ];
}
