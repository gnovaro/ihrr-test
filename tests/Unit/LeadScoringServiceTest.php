<?php
// tests/Unit/LeadScoringServiceTest.php

namespace Tests\Unit;

use App\Models\Lead;
use App\Services\LeadScoringService;
use Tests\TestCase;

class LeadScoringServiceTest extends TestCase
{
    /** @test */
    public function it_calculates_the_correct_score_for_a_lead()
    {
        $scoringService = new LeadScoringService();
        $lead = new Lead(['email' => 'test@example.com']);

        $score = $scoringService->getScore($lead);

        $this->assertEquals(10, $score);
    }
}
