<?php

namespace App\Services;

class LeadScoringService
{

    public function getScore(\App\Models\Lead $lead) : int
    {
        // Ejemplo de lógica de puntuación
        $score = 0;

        // Aumentar puntuación segun criterios específicos
        if (!empty($lead->email)) {
            $score += 10;
        }

        // @TODO: Agregar más lógica de puntuación aquí...

        return $score;
    }
}
