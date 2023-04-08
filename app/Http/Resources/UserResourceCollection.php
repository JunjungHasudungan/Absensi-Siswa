<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserResourceCollection extends ResourceCollection
{

    public $preserveKeys = true;
    public static $wrap = 'user';
    public $collects = UserNewResource::class;

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
