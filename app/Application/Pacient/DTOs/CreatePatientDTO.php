<?php

namespace App\Application\Patient\DTOs;

class CreatePatientDTO
{
    public function __construct(
        public readonly int $nutritionistId,
        public readonly string $name,
        public readonly ?string $email,
        public readonly ?string $birthDate,
        public readonly ?float $height,
        public readonly ?string $notes,
        public readonly ?string $phone,
        public readonly ?string $weight,
    ) {}
}
