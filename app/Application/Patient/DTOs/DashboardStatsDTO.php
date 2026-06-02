<?php

namespace App\Application\Patient\DTOs;

use Illuminate\Support\Collection;

class DashboardStatsDTO
{

    public function __construct(
        public readonly int $totalPatients,
        public readonly int $totalDiets,
        public readonly int $totalWeights,
        public readonly int $newPatientsThisMonth,
        public readonly Collection $recentPatients,
    ) {}


}
