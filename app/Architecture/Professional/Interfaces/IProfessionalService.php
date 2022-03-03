<?php

namespace App\Architecture\Professional\Interfaces;

interface IProfessionalService
{
    /**
     * @param int|null $specialty_id
     * @return mixed
     */
    public function getList(int $specialty_id = null);
}
