<?php

namespace App\Application\Pacient\UseCases;

use App\Application\Patient\DTOs\CreatePatientDTO;
use App\Infrastructure\Persistence\Eloquent\Pacient;

class CreatePatientUseCase
{

  public function execute(CreatePatientDTO $dto) : Pacient
  {

      return Pacient::create([
            'nutritionist_id' => $dto->nutritionistId,
            'name' => $dto->name,
            'email' => $dto->email,
            'birth_date' => $dto->birthDate,
            'height' => $dto->height,
            'notes' => $dto->notes,
            'phone' => $dto->phone,
            'weight' => $dto->weight
      ]);

  }



}
