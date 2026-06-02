<?php

namespace App\Application\Patient\DTOs;

class PatientsFiltersDTO
{
    public function __construct(

        public readonly int $nutritionistId,
        public readonly ?string $search,
    ) {}
}


