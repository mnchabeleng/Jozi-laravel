<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
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
            'image' => $this->image,
            'listing' => [
                'id' => $this->listing->id,
                'title' => $this->listing->title,
                'slug' => $this->listing->slug,
                'description' => $this->listing->description,
                'venue' => $this->listing->venue,
                'address' => $this->listing->address,
                'phone' => $this->listing->phone,
                'data' => $this->listing->data,
                'time' => [
                    'start' => $this->listing->start,
                    'end' => $this->listing->end
                ],
                'category' => [
                    'id' => $this->listing->category->id,
                    'name' => $this->listing->category->name,
                    'created_at' => $this->listing->category->created_at
                ],
                'location' => [
                    'id' => $this->listing->location->id,
                    'name' => $this->listing->location->name,
                    'created_at' => $this->listing->location->created_at
                ],
                'user' => [
                    'id' => $this->listing->user->id,
                    'name' => $this->listing->user->name,
                    'created_at' => $this->listing->user->created_at,
                    'updated_at' => $this->listing->user->updated_at
                ],
                'created_at' => $this->listing->created_at,
                'updated_at' => $this->listing->updated_at,
            ],
            'created_at' => $this->created_at,
        ];
    }
}
