<?php
// app/Http/Controllers/LeadController.php
namespace App\Http\Controllers;

use App\Models\Lead;
use App\Services\LeadScoringService;

class LeadController extends Controller
{
    private LeadScoringService $leadScoringService;

    public function __construct(LeadScoringService $leadScoringService)
    {
        $this->leadScoringService = $leadScoringService;
    }

    public function create()
    {
        return view('leads.create');
    }

    public function show($id)
    {
        $lead = Lead::find($id);
        if (!$lead) {
            return 'Lead not found';
        }
        return view('leads.show', ['lead' => $lead]);
    }

    public function edit($id)
    {
        $lead = Lead::find($id);
        if (!$lead) {
            return 'Lead not found';
        }
        return view('leads.edit', ['lead' => $lead]);
    }

    public function destroy($id)
    {
        $lead = Lead::find($id);
        if (!$lead) {
            return 'Lead not found';
        }
        $lead->delete();
        return 'Lead deleted successfully';
    }
}
