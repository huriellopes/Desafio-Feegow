<?php

namespace App\Architecture\Schedule\Services;

use App\Architecture\Schedule\Interfaces\IScheduleRepository;
use App\Architecture\Schedule\Interfaces\IScheduleService;
use App\Architecture\Schedule\Models\Schedule;
use App\Architecture\Schedule\Validates\ScheduleValidate;
use Illuminate\Database\Eloquent\Collection;
use stdClass;
use Throwable;

class ScheduleService implements IScheduleService
{
    /**
     * @var IScheduleRepository
     * @var ScheduleValidate
     */
    protected $IScheduleRepository;
    protected $ScheduleValidate;

    /**
     * @param IScheduleRepository $IScheduleRepository
     * @param ScheduleValidate $ScheduleValidate
     */
    public function __construct(IScheduleRepository $IScheduleRepository, ScheduleValidate $ScheduleValidate)
    {
        $this->IScheduleRepository = $IScheduleRepository;
        $this->ScheduleValidate = $ScheduleValidate;
    }

    /**
     * @return Collection
     */
    public function listSchedules() : Collection
    {
        return $this->IScheduleRepository->listSchedules();
    }

    /**
     * @param stdClass $params
     * @return Schedule
     * @throws Throwable
     */
    public function sendSchedule(stdClass $params) : Schedule
    {
        $this->getValidate()->validaParametros($params);
        return $this->IScheduleRepository->sendSchedule($params);
    }

    /**
     * @return ScheduleValidate
     */
    private function getValidate() : ScheduleValidate
    {
        return $this->ScheduleValidate;
    }
}
