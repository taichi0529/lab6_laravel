<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Entry as EntryResource;

class MyWork extends Resource
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
            "title" => $this->title,
            "reward" => $this->reward,
            "description" => $this->description,
            "entry_end_at" => $this->entry_end_at,
            "owner" => [
                "id" => $this->owner->id,
                "name" => $this->owner->name,
            ],
            "entries" => EntryResource::collection($this->entries)
        ];
    }
}
