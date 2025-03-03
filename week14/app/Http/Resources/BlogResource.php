<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
	    return [
		"id" => $this->id,
		"user_id" => $this->user_id,
		"title" => $this->title,
		"slug" => $this->slug,
		"description" => $this->description,
		"image" => env('ASSET_URL') .'/'. $this->image,
	    ]; 
    }
}
