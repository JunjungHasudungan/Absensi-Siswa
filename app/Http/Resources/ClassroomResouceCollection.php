<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ClassroomResouceCollection extends ResourceCollection
{
    public $preserveKeys = true;

    public $collects = ClassroomResource::class;

    public static $wrap = 'classrooms';

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
