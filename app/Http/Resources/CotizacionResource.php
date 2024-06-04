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
            'to_user' => new ClienteResource($this->to_user),
            'fecha' => $this->created_at->format('d/m/Y'),
            'tipoActivoNombre' => $this->nombreActivo($this->tipoActivo),
        ];

        return  array_merge($array, $extra);
    }

    public function nombreActivo($str) {
        if ($str === 'V-std')
            return 'Vehículo';
        if ($str === 'B-std')
            return 'Vehículo blindado';
        if ($str === 'C-std')
            return 'Equipo de computo';
        return "otro";
    }
}
