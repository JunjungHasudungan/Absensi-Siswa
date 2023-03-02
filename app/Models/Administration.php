<?php

namespace App\Models;

use App\Helpers\MethodLearning;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function clasroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function getIsPraktekAttribute()
    {
        return $this->method = MethodLearning::METHOD_LEARING['Praktek'];
    }
}
