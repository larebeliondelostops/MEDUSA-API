<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Precedence\PrecedenceDTO;
use App\Interfaces\Viper\PrecedenceInterface;
use App\Models\Viper\Precedence;

class PrecedenceService implements PrecedenceInterface
{
    public function getAllPrecedences()
    {
        // Obtener todas las precedencias
        $precedences = Precedence::all();

        // Mapear las precedencias a tus DTO según sea necesario
        $precedenceDTOs = $precedences->map(function ($precedence) {
            return new PrecedenceDTO($precedence->toArray());
        });

        return $precedenceDTOs;
    }

    public function storePrecedence(PrecedenceDTO $precedenceDTO)
    {
        // Crear una nueva instancia del modelo Precedence y guardar los datos
        $precedence = new Precedence();
        $precedence->fill($precedenceDTO->toArray());
        $precedence->save();

        return new PrecedenceDTO($precedence->toArray());
    }

    public function updatePrecedence($precedenceId, PrecedenceDTO $precedenceDTO)
    {
        // Encontrar la precedencia por su ID
        $precedence = Precedence::findOrFail($precedenceId);

        // Actualizar los datos de la precedencia
        $precedence->fill($precedenceDTO->toArray());
        $precedence->save();

        return new PrecedenceDTO($precedence->toArray());
    }

    public function deletePrecedence($precedenceId)
    {
        // Encontrar la precedencia por su ID
        $precedence = Precedence::findOrFail($precedenceId);

        // Eliminar la precedencia
        $precedence->delete();
    }

    public function getPrecedence($precedenceId)
    {
        // Encontrar la precedencia por su ID
        $precedence = Precedence::findOrFail($precedenceId);

        return new PrecedenceDTO($precedence->toArray());
    }
}
