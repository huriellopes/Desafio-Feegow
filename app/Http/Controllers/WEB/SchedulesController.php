<?php

namespace App\Http\Controllers\WEB;

use App\Architecture\Patient\Interfaces\IPatientService;
use App\Architecture\Schedule\Interfaces\IScheduleService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    /**
     * @var IPatientService
     */
    protected $IPatientService;
    protected $viewPath = 'feegow.';

    /**
     * @param IScheduleService $IScheduleService
     * @param IPatientService $IPatientService
     */
    public function __construct(IScheduleService $IScheduleService, IPatientService $IPatientService)
    {
        parent::__construct($IScheduleService);
        $this->IPatientService = $IPatientService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view($this->viewPath.'schedules');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        $specialty_id = $request->input($this->clear_tags('specialty_id'));
        $profissional_id = $request->input($this->clear_tags('professional_id'));
        $sources = $this->IPatientService->getListSources();

        return view($this->viewPath.'schedule', compact('specialty_id','profissional_id','sources'));
    }
}
