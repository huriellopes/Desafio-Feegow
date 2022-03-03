<?php

namespace App\Http\Controllers\API;

use App\Architecture\Professional\Interfaces\IProfessionalService;
use App\Architecture\Schedule\Interfaces\IScheduleService;
use App\Enum\StatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class ProfessionalController extends Controller
{
    /**
     * @var IProfessionalService
     */
    protected $IProfessionalService;

    /**
     * @param IScheduleService $IScheduleService
     * @param IProfessionalService $IProfessionalService
     */
    public function __construct(IScheduleService $IScheduleService, IProfessionalService $IProfessionalService)
    {
        parent::__construct($IScheduleService);
        $this->IProfessionalService = $IProfessionalService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request) : JsonResponse
    {
        try {
            $specialty_id = (int) $request->input($this->clear_tags('specialty_id'));

            $professionals = $this->IProfessionalService->getList($specialty_id);

            return response()->json($professionals, 200);
        } catch (Exception $err) {
            return response()->json(StatusEnum::MESSAGE_BAD_REQUEST, StatusEnum::BAD_REQUEST);
        }
    }

}
