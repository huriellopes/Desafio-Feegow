<?php

namespace App\Architecture\Specialties\Services;

use App\Architecture\Specialties\Interfaces\ISpecialityService;
use App\Traits\Utils;

class SpecialityService implements ISpecialityService
{
    use Utils;

    /**
     * @return array|mixed
     */
    public function getListSpeciality()
    {
        $listSpeciality = $this->get_api()
                               ->get(env('FEEGOW_APIURL').'/specialties/list');

        return $listSpeciality->json();
    }
}
