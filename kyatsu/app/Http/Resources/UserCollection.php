<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        die(dd($this->collection));
        die($this->collection);
        die(print_r(get_object_vars($this)));
        return parent::toArray($request);
        /*return [
            "uuid" => $this->uuid,
            "name" => $this->name,
            "created_at" => $this->created_at
        ];*/
    }
}
