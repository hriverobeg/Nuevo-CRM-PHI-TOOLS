<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CotizacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $array = parent::toArray($request);

        $extra = [
            'from_user' => new ClienteResource($this->from_user),
            'to_user' => new ClienteResource($this->to_user)
        ];

        return  array_merge($array, $extra);
    }
}
