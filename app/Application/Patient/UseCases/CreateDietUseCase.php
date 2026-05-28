<?php

namespace App\Application\Patient\UseCases;

use App\Application\Patient\DTOs\CreateDietDTO;
use App\Infrastructure\Persistence\Eloquent\Diet;

class CreateDietUseCase
{

  public function execute(CreateDietDTO $dto) :Diet
  {

      return Diet::create([

       "patient_id" => $dto->patientId,
       "title" => $dto->title,
       "file_path" => $dto->filePath,
       "uploaded_at" => now(),

      ]);

  }

}
