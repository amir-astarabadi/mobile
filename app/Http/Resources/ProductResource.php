<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" =>  $this->resource->id,
            "price" =>  $this->resource->price,
            "discount" =>  $this->resource->discount,
            "title" =>  $this->resource->title,
            "barnd" =>  $this->resource->barnd,
            "model" =>  $this->resource->model,
            "ram" =>  $this->resource->ram,
            "storage" =>  $this->resource->storage,
            "cpu" =>  $this->resource->cpu,
            "width" =>  $this->resource->width,
            "hight" =>  $this->resource->hight,
            "weight" =>  $this->resource->weight,

            "images" => ImageResource::collection($this->resource->images->sortBy('order'))
        ];
    }
}
