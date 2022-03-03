<?php

namespace App\Http\Controllers\API;

use App\Architecture\Schedule\Interfaces\IScheduleService;
use App\Architecture\Specialties\Interfaces\ISpecialityService;
use App\Enum\StatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class SpecialtiesController extends Controller
{
    /**
     * @var ISpecialityService
     */
    protected $ISpecialityService;

    /**
     * @param IScheduleService $IScheduleService
     * @param ISpecialityService $ISpecialityService
     */
    public function __construct(IScheduleService $IScheduleService, ISpecialityService $ISpecialityService)
    {
        parent::__construct($IScheduleService);
        $this->ISpecialityService = $ISpecialityService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $specialties = $this->ISpecialityService->getListSpeciality();

            return response()->json($specialties, StatusEnum::OK);
        } catch (\Exception $err) {
            return response()->json(StatusEnum::MESSAGE_BAD_REQUEST, StatusEnum::BAD_REQUEST);
        }
    }
}
