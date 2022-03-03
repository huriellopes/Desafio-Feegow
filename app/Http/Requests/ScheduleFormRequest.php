<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleFormRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules() : array
    {
        return [
            'specialty_id' => 'required|integer',
            'professional_id' => 'required|integer',
            'name' => 'required|string',
            'cpf' => 'required|string',
            'source_id' => 'required|integer',
            'birthdate' => 'required'
        ];
    }
}
