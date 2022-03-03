<?php

namespace App\Http\Controllers;

use App\Architecture\Schedule\Interfaces\IScheduleService;
use App\Traits\Utils;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Utils;

    /**
     * @var IScheduleService
     */
    protected $IScheduleService;

    /**
     * @param IScheduleService $IScheduleService
     */
    public function __construct(IScheduleService $IScheduleService)
    {
        $this->IScheduleService = $IScheduleService;
    }
}
