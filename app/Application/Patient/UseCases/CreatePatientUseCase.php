<?php

namespace App\Application\Patient\UseCases;

use App\Application\Patient\DTOs\CreatePatientDTO;
use App\Infrastructure\Persistence\Eloquent\Patient;

class CreatePatientUseCase
{

  public function execute(CreatePatientDTO $dto) : Patient
  {

      return Patient::create([
            'nutritionist_id' => $dto->nutritionistId,
            'name' => $dto->name,
            'email' => $dto->email,
            'birth_date' => $dto->birthDate,
            'height' => $dto->height,
            'notes' => $dto->notes,
            'phone' => $dto->phone,
            // 'weight' => $dto->weight,
            'age' => $dto->age,
            'objective' => $dto->objective,
            'dietary_restrictions' => $dto->dietaryRestrictions,
            'gender' => $dto->gender,
            'food_preferences' => $dto->foodPreferences,
            'observations' => $dto->observations,
            'occupation' => $dto->occupation,


      ]);

  }

}
