<?php

namespace App\Architecture\Schedule\Interfaces;

use App\Architecture\Schedule\Models\Schedule;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface IScheduleService
{
    /**
     * @return Collection
     */
    public function listSchedules() : Collection;

    /**
     * @param stdClass $params
     * @return Schedule
     */
    public function sendSchedule(stdClass $params) : Schedule;
}
