<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public $guarded = [];

    public function administration()
    {
        return $this->belongsTo(Administration::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class)->where('role_id', 3)->get();
    }

}
