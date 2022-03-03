<?php

namespace App\Enum;

class ScheduleEnum
{
    //Messages
    const MESSAGE_BAD_LIST = 'Error listing appointments.';
    const MESSAGE_BAD_REQUEST = 'Error when scheduling.';
    const SUCCESS = 'Appointment successfully scheduled.';

    //Status
    const OK = 200;
    const CREATED = 201;
    const BAD_REQUEST = 400;
}
