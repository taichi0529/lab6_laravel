<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\User as UserResource;

class Entry extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "user" => new UserResource($this->user),
        ];
    }
}
