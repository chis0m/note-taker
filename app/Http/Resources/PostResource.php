<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'tags' => $this->tags,
            'description' => $this->description,
            'read_time' => $this->read_time,
            'created_at' => Carbon::parse($this->created_at)->toFormattedDateString(),
            'updated_at' => Carbon::parse($this->updated_at)->toFormattedDateString(),
        ];
    }
}
