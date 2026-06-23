<?php

namespace App\Application\Patient\DTOs;

class CreateConsultationDTO
{
    public function __construct(
        public readonly int $patientId,
        public readonly string $appointmentDate,
        public readonly string $notes,
        public readonly string $title
    ) {}
}
