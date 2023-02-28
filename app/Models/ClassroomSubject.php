<?php

namespace App\Models;

use App\Helpers\Weekday;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomSubject extends Model
{
    use HasFactory;

    protected $table = 'classroom_subject';

    protected $guarded = [];

    public function getIsSeninAttribute()
    {
        return $this->weekday === Weekday::WEEK_DAYS['senin'];
    }

    public function getIsSelasaAttribute()
    {
        return $this->weekday === Weekday::WEEK_DAYS['selasa'];
    }

    public function getIsRabuAttribute()
    {
        return $this->weekday === Weekday::WEEK_DAYS['rabu'];
    }

    public function getIsKamisAttribute()
    {
        return $this->weekday === Weekday::WEEK_DAYS['kamis'];
    }

    public function getIsJumatAttribute()
    {
        return $this->weekday === Weekday::WEEK_DAYS['jumat'];
    }
}
