<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeadUpdateControllerTest extends TestCase
{
    /** @test */
    public function it_updates_a_lead_successfully()
    {
        // Suponiendo tener un lead creado
        $lead = Lead::factory()->create();

        // Datos para actualizar el lead
        $updateData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'phone' => '1234567890',
        ];

        $response = $this->putJson("/leads/{$lead->id}", $updateData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('leads', $updateData);
    }

    /** @test */
    public function it_returns_not_found_for_non_existent_lead()
    {
        $response = $this->putJson('/leads/999', ['name' => 'Test Name']);

        $response->assertStatus(404);
    }

    /** @test */
    public function it_validates_input_data_during_update()
    {
        $lead = Lead::factory()->create();

        $response = $this->putJson("/leads/{$lead->id}", []);

        $response->assertStatus(422); // HTTP 422 Unprocessable Entity
        $response->assertJsonValidationErrors(['name', 'email']);
    }

}
