<?php

namespace App\Application\Patient\DTOs;

use App\Infrastructure\Persistence\Eloquent\WeightEntry;
use Illuminate\Support\Collection;

class DashboardStatsDTO
{

    public function __construct(
        public readonly int $totalPatients,
        public readonly int $totalDiets,
        public readonly int $totalWeights,
        public readonly int $newPatientsThisMonth,
        public readonly Collection $recentPatients,
        public readonly int $consultationsInThisMonth,
        public readonly Array  $imcStats

    ) {}


}
