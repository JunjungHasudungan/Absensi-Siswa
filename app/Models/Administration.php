<?php

namespace App\Models;

use App\Helpers\{
    MethodLearning,
    Completeness,
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'id');
    }

    public function getIsPraktekAttribute()
    {
        return $this->method = MethodLearning::METHOD_LEARING['Praktek'];
    }

    public function getIsTuntasAttribute()
    {
        return $this->completeness = Completeness::COMPLETENESS['Tuntas'];
    }

    public function getIsBersambungAttribute()
    {
        return $this->completeness = Completeness::COMPLETENESS['Bersambung'];
    }
}
