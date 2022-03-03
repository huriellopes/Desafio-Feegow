<?php

namespace App\Architecture\Patient\Services;

use App\Architecture\Patient\Interfaces\IPatientService;
use App\Traits\Utils;

class PatientService implements IPatientService
{
    use Utils;

    /**
     * @return array|mixed
     */
    public function getListSources()
    {
        $sources = $this->get_api()->get(env('FEEGOW_APIURL').'/patient/list-sources');

        return $sources->json();
    }
}
