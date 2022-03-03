<?php

namespace App\Architecture\Professional\Services;

use App\Architecture\Professional\Interfaces\IProfessionalService;
use App\Architecture\Validate;
use App\Traits\Utils;
use App\Exceptions\SystemException;

class ProfessionalService implements IProfessionalService
{
    use Utils;

    /**
     * @var Validate
     */
    protected $Validate;

    /**
     * @param int|null $specialty_id
     * @return array|mixed
     * @throws SystemException
     */
    public function getList(int $specialty_id = null)
    {
        $list = $this->get_api()->get(env('FEEGOW_APIURL').'/professional/list?especialidade_id='.$specialty_id);

        return $list->json();
    }

//    /**
//     * @return Validate
//     */
//    private function getValidate() : Validate
//    {
//        return $this->Validate;
//    }
}
