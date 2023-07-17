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
            'usuario' => new UsuarioResource($this->usuario),
            'cliente' => new ClienteResource($this->cliente)
        ];

        return  array_merge($array, $extra);
    }
}
