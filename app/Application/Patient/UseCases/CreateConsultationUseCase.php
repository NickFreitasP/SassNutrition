<?php

namespace App\Application\Patient\UseCases;

use App\Application\Patient\DTOs\CreateConsultationDTO;
use App\Infrastructure\Persistence\Eloquent\Consultation;

class CreateConsultationUseCase
{

  public function execute(CreateConsultationDTO $dto) :Consultation
  {

      return Consultation::create([

       "patient_id" => $dto->patientId,
       "notes" => $dto->notes,
       "appointment_date" => $dto->appointmentDate,
       "title" => $dto->title
      ]);

  }

}
