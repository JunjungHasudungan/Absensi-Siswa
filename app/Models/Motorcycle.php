<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function brandmotor()
    {
        return $this->belongsTo(BrandMotor::class, 'brand_motor_id');
    }
}
