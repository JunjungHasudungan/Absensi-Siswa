<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function homeTeacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students()
    {
        return $this->hasMany(User::class, 'classroom_id')->where('role_id', 3);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'id');
    }

    public function subjectClassroom()
    {
        return $this->belongsToMany(Subject::class)->withPivot(['subject_id', 'classroom_id']);
    }

    public function presences()
    {
        return $this->hasMany(Presence::class);
    }
}
