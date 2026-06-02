<?php

namespace App\Application\Patient\DTOs;

class UpdatePatientDTO
{
    public function __construct(
        public readonly int $patientId,
        public readonly string $name,
        public readonly ?string $email,
        public readonly ?string $birthDate,
        public readonly ?float $height,
        public readonly ?string $notes,
        public readonly ?string $phone,
        public readonly ?float $weight,
        public readonly ?string $image,
        public readonly ?string $age,
        public readonly ?string $objective,
        public readonly ?string $dietaryRestrictions,
        public readonly ?string $gender,
        public readonly ?string $foodPreferences,
        public readonly ?string $observations,
        public readonly ?string $occupation,
    ) {}
}
