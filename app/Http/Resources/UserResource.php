<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    // public $preserveKeys = true;

    // public static $wrap = 'user';

    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->when($this->role_id == 2, $this->email),
            'role'          => $this->role,
            'classroom'     => $this->whenLoaded('classroom', $this->classroom),
            // 'role'  => RoleResource::collection($this->role),
        ];
    }
}
