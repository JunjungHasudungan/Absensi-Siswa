<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandMotor extends Model
{
    use HasFactory;

    protected $table = 'brand_motor';

    protected $fillable = ['name'];
}
