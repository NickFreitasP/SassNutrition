<?php

namespace App\Application\Patient\DTOs;

class CreateWeightEntryDTO
{
    public function __construct(

        public readonly int $patientId,
        public readonly string $recordedAt,
        public readonly float $weight,
    ) {}
}
