<?php

namespace App\Architecture\Schedule\Validates;

use App\Architecture\Validate;

class ScheduleValidate extends Validate
{
    protected $rules = [
        'specialty_id' => 'required|integer',
        'professional_id' => 'required|integer',
        'name' => 'required|string',
        'cpf' => 'required|string|cpf',
        'source_id' => 'required|integer',
        'birthdate' => 'required|date'
    ];
}
