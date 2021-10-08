<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'tags' => $this->tags,
            'description' => $this->description,
            'read_minute' => $this->read_minute,
            'created_at' => Carbon::parse($this->created_at)->toFormattedDateString(),
            'updated_at' => Carbon::parse($this->updated_at)->toFormattedDateString(),
        ];
    }
}
