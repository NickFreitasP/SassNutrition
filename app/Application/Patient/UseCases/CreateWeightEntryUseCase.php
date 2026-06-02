<?php

namespace App\Application\Patient\UseCases;

use App\Application\Patient\DTOs\CreateWeightEntryDTO;
use App\Infrastructure\Persistence\Eloquent\WeightEntry;


class CreateWeightEntryUseCase
{

   public function execute(CreateWeightEntryDTO $dto) : WeightEntry
   {

      return WeightEntry::create([

            'patient_id' => $dto->patientId,
            'weight' => $dto->weight,
            'recorded_at' => $dto->recordedAt,
      ]

      );


   }


}
