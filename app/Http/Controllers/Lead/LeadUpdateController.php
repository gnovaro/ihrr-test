<?php

namespace App\Http\Controllers\Lead;

use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use App\Services\LeadScoringService;
use Illuminate\Http\Response;

class LeadUpdateController
{
    private LeadScoringService $leadScoringService;

    public function __construct(LeadScoringService $leadScoringService)
    {
        $this->leadScoringService = $leadScoringService;
    }
    public function update(LeadRequest $request, Lead $lead): \Illuminate\Http\JsonResponse
    {

        $lead->fill($request->validated());
        $lead->save();


        // Send lead to scoring system
        $score = $this->leadScoringService->getScore($lead);

        return response()->json(['message' => 'Lead updated successfully'], Response::HTTP_OK);
    }
}
