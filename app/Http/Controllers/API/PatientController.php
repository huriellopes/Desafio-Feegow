<?php

namespace App\Http\Controllers\API;

use App\Architecture\Patient\Interfaces\IPatientService;
use App\Architecture\Schedule\Interfaces\IScheduleService;
use App\Enum\PatientEnum;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;

class PatientController extends Controller
{
    /**
     * @var IPatientService
     */
    protected $IPatientService;

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
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        try {
            $sources = $this->IPatientService->getListSources();

            return response()->json($sources, PatientEnum::OK);
        } catch (Exception $err) {
            return response()->json(PatientEnum::MESSAGE_BAD_REQUEST, PatientEnum::BAD_REQUEST);
        }
    }
}
