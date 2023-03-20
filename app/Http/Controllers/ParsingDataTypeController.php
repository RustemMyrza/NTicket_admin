<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParsingDataIndexFormRequest;
use App\Http\Requests\ParsingDataTypeFormRequest;
use App\Services\ParsingDataTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ParsingDataTypeController extends Controller
{
    private ParsingDataTypeService $service;

    public function __construct(ParsingDataTypeService $service)
    {
        $this->service = $service;
    }

    /**
     * @param ParsingDataIndexFormRequest $request
     * @param $type
     * @return JsonResponse
     */
    public function index(ParsingDataIndexFormRequest $request, $type): JsonResponse
    {
        try {
            return $this->response(200, $this->service->getParsingData($request->all(), $type));
        } catch (\Exception $e) {
            return $this->response(500, [], $e->getMessage());
        }
    }

    /**
     * @param ParsingDataTypeFormRequest $request
     * @param $type
     * @return JsonResponse
     */
    public function store(ParsingDataTypeFormRequest $request, $type): JsonResponse
    {
        $requestData = $request->validated();

        try {
            return $this->response(200, $this->service->addParsingData($requestData, $type));
        } catch (\Exception $e) {
            return $this->response(500, [], $e->getMessage());
        }
    }
}
