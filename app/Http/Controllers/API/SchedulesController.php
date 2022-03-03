<?php

namespace App\Http\Controllers\API;

use App\Enum\ScheduleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleFormRequest;
use App\Http\Resources\SchedulesResourceCollection;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Exception;
use stdClass;

class SchedulesController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        try {
            $schedules = $this->IScheduleService->listSchedules();

            return response()->json(new SchedulesResourceCollection($schedules), ScheduleEnum::OK);
        } catch (Exception $err) {
            return response()->json(ScheduleEnum::MESSAGE_BAD_LIST, ScheduleEnum::BAD_REQUEST);
        }
    }

    /**
     * @param ScheduleFormRequest $request
     * @return JsonResponse
     */
    public function store(ScheduleFormRequest $request) : JsonResponse
    {
        try {
            $params = new stdClass();
            $params->specialty_id = $this->clear_tags($request->input('specialty_id'));
            $params->professional_id = $this->clear_tags($request->input('professional_id'));
            $params->name = $this->clear_tags($request->input('name'));
            $params->cpf = $this->clear_tags($this->clear_mask($request->input('cpf')));
            $params->source_id = $this->clear_tags($request->input('source_id'));
            $params->birthdate = $this->clear_tags(Carbon::createFromFormat('d/m/Y', $request->input('birthdate'))->format('Y-m-d'));

            $this->IScheduleService->sendSchedule($params);

            return response()->json([
                'status' => 201,
                'message' => ScheduleEnum::SUCCESS
            ], ScheduleEnum::CREATED);
        } catch (Exception $err) {
            return response()->json(ScheduleEnum::MESSAGE_BAD_REQUEST, ScheduleEnum::BAD_REQUEST);
        }
    }
}
