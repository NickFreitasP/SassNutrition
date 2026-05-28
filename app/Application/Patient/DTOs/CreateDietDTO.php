<?php

namespace App\Application\Patient\DTOs;

class CreateDietDTO
{
    public function __construct(

        public readonly int $patientId,
        public readonly string $title,
        public readonly string $filePath,
    ) {}
}


