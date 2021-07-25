<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'comment' => $this->comment,
            'created_at' => $this->created_at,
            'time' => $this->created_at->diffForhumans(),
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'avatar' => asset($this->user->avatar),
                'created_at' => $this->user->created_at,
                'updated_at' => $this->user->updated_at
            ]
        ];
    }
}
