<?php

namespace App\Http\Api\Modules\Users\Resources;

use App\Domain\Users\Models\User;
use App\Http\Api\Support\Resources\BaseJsonResource;

/** @mixin User */
class UserResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
