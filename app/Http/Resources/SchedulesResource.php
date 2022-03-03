<?php

namespace App\Http\Resources;

use App\Traits\Utils;
use Illuminate\Http\Resources\Json\JsonResource;

class SchedulesResource extends JsonResource
{
    use Utils;

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cpf' => $this->mask_cpf($this->cpf),
            'birthdate' => $this->formatDate($this->birthdate),
            'created_at' => $this->dateTimeFormat($this->created_at)
        ];
    }
}
