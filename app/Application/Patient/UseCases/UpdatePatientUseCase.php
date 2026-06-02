<?php

namespace App\Application\Patient\UseCases;

use App\Application\Patient\DTOs\UpdatePatientDTO;
use App\Infrastructure\Persistence\Eloquent\Patient;

class UpdatePatientUseCase
{
    public function execute(UpdatePatientDTO $dto): Patient {

        $patient = Patient::findOrFail(
            $dto->patientId
        );

        $patient->update([
            'name' => $dto->name,
            'email' => $dto->email,
            'birth_date' => $dto->birthDate,
            'height' => $dto->height,
            'notes' => $dto->notes,
            'phone' => $dto->phone,
            'weight' => $dto->weight,
            'image' => $dto->image,
            'age' => $dto->age,
            'objective' => $dto->objective,
            'dietary_restrictions' => $dto->dietaryRestrictions,
            'gender' => $dto->gender,
            'food_preferences' => $dto->foodPreferences,
            'observations' => $dto->observations,
            'occupation' => $dto->occupation,
        ]);

        return $patient;
    }
}
