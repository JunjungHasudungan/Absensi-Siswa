<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Weekday as WeekdayEnum;
use App\Helpers\Weekday as Week_day;

class ClassroomSubject extends Model
{
    use HasFactory;

    protected $table = 'classroom_subject';

    protected $guarded = [];

    // protected $fillable = [
    //     'classroom_id', 'subject_id', 'weekday'
    // ];

    // protected $casts  = [
    //     'weekday'   => WeekdayEnum::class
    // ];

    public function getIsSeninAttribute()
    {
        return (int) $this->weekday === Week_day::WEEK_DAYS['Senin'];
    }

    public function getIsSelasasAttribute()
    {
        return (int) $this->weekday === Week_day::WEEK_DAYS['Selasa'];
    }

    public function getIsRabusAttribute()
    {
        return (int) $this->weekday === Week_day::WEEK_DAYS['Rabu'];
    }

    public function getIsKamissAttribute()
    {
        return (int) $this->weekday === Week_day::WEEK_DAYS['Kamis'];
    }

    public function getIsJumatAttribute()
    {
        return (int) $this->weekday === Week_day::WEEK_DAYS['Jumat'];
    }
}
