<?php

//declare(strict_types=1);

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeadRequest;
use App\Models\Client;
use App\Models\Lead;
use App\Services\LeadScoringService;
use Illuminate\Support\Facades\DB;

class LeadStoreController extends Controller
{
    private LeadScoringService $leadScoringService;

    public function __construct(LeadScoringService $leadScoringService)
    {
        $this->leadScoringService = $leadScoringService;
    }

    public function store(LeadRequest $request)
    {
        DB::beginTransaction();
        try {
            $lead = new Lead($request->only(['name', 'email', 'phone']));
            $lead->save();

            $client = new Client(['lead_id' => $lead->id]);
            $client->save();

            $score = $this->leadScoringService->getScore($lead);
            $lead->score = $score;
            $lead->save();

            DB::commit();
            return response()->json(['message' => 'Lead created successfully', 'lead_id' => $lead->id], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            // Log the exception or handle it as per your requirement
            return response()->json(['error' => 'Failed to create lead'], 500);
        }
    }
}
