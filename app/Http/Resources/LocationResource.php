<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'coordinates' => $this->coordinates,
            'title' => $this->title,
            'body' => $this->body,
            'locationType' => $this->location_type,
            'address' => $this->address,
            'services' => $this->services,
            'price' => $this->price,
            'openingHours' => $this->opening_hours,
            'score' => $this->score,
            'comments' => $this->comments,
            'images' => $this->images
        ];
    }
}
