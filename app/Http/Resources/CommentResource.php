<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class CommentResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'comment' => $this->comment,
            'avatar' => $this->avatar,
            'replies' => CommentResource::collection($this->whenLoaded('replies')),
            'comment_date' => Carbon::parse($this->created_at)->format('d-M-Y H:i:s')
        ];
    }
}
