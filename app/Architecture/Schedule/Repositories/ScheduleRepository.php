<?php

namespace App\Architecture\Schedule\Repositories;

use App\Architecture\Schedule\Interfaces\IScheduleRepository;
use App\Architecture\Schedule\Models\Schedule;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class ScheduleRepository implements IScheduleRepository
{
    /**
     * @return Collection
     */
    public function listSchedules() : Collection
    {
        return Schedule::all();
    }

    /**
     * @param stdClass $params
     * @return Schedule
     */
    public function sendSchedule(stdClass $params) : Schedule
    {
        $schedule = new Schedule();
        $schedule->specialty_id = $params->specialty_id;
        $schedule->professional_id = $params->professional_id;
        $schedule->name = $params->name;
        $schedule->cpf = $params->cpf;
        $schedule->source_id = $params->source_id;
        $schedule->birthdate = $params->birthdate;

        $schedule->save();

        return $schedule;
    }
}
