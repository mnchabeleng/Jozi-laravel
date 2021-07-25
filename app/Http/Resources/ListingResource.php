<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Str;

class ListingResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'excerpt' => Str::words($this->description, 15, '...'),
            'venue' => $this->venue,
            'address' => $this->address,
            'phone' => $this->phone,
            'website' => $this->website,
            'rating' => round(array_sum($this->listingRatings->map(function($item){ return $item->rating; })->all()) / count($this->listingRatings), 1),
            'time' => [
                'status' => (strtotime(now()->format('H:i')) > strtotime($this->start) && strtotime('now') < strtotime($this->start)) ? 'OPEN' : 'CLOSED',
                'open' => $this->start,
                'close' => $this->end
            ],
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name,
                'slug' => $this->category->slug,
                'image' => asset($this->category->image),
                'created_at' => $this->category->created_at
            ],
            'location' => [
                'id' => $this->location->id,
                'name' => $this->location->name,
                'slug' => $this->location->slug,
                'created_at' => $this->location->created_at
            ],
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'avatar' => asset($this->user->avatar),
                'created_at' => $this->user->created_at,
                'updated_at' => $this->user->updated_at
            ],
            'comments' => [
                'count' => count($this->comments),
                'data' => CommentResource::collection($this->comments) 
            ],
            'images' => ImageResource::collection($this->images),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
