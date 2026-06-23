<?php

namespace App\Application\Patient\UseCases;

use App\Application\Patient\DTOs\DashboardStatsDTO;
use App\Domain\Services\ImcCalculator;
use App\Infrastructure\Persistence\Eloquent\Consultation;
use App\Infrastructure\Persistence\Eloquent\Diet;
use App\Infrastructure\Persistence\Eloquent\Patient;
use App\Infrastructure\Persistence\Eloquent\WeightEntry;
use PhpParser\Node\Expr\New_;

class DashboardStatsUseCase
{

    public function execute(int $nutritionistId): DashboardStatsDTO
    {

        // TOTAL DE PACIENTES
        $totalPatients = Patient::where("nutritionist_id", $nutritionistId)->count();

        // TOTAL DE DIETAS CADASTRADAS
        $totalDiets = Diet::whereHas("patient", fn($query) => $query->where("nutritionist_id", $nutritionistId))->count();

        // TOTAL DE PESOS CADASTRADOS
        $totalWeights = WeightEntry::whereHas("patient", fn($query) => $query->where("nutritionist_id", $nutritionistId))->count();

        // TOTAL DE PESOS CADASTARADOS NO MES ATUAL
        $newPatientsThisMonth = Patient::where("nutritionist_id", $nutritionistId)->whereMonth("created_at", now()->month)->count();

        // ULTIMOS 5 PACIENTES CADASTRADOS
        $recentPatients = Patient::where("nutritionist_id", $nutritionistId)->latest()->take(5)->get();

        // TOTAL DE CONSULTAS NO MES
        $consultationsInThisMonth =  Consultation::whereHas("patient", fn($query) => $query->where("nutritionist_id", $nutritionistId))->count();


        // ============================================= LÓGICA PARA CALCULO DO IMC ==============================================================
        $imc = [];

        $patients = Patient::where(
            'nutritionist_id',
            $nutritionistId
        )
            ->with('weightEntries')
            ->get();

        foreach ($patients as $patient) {

            $lastWeight = $patient
                ->weightEntries()
                ->latest('recorded_at')
                ->first();

            if (!$lastWeight) {
                continue;
            }

            $weight = (float) $lastWeight->weight;
            $new_imc = new ImcCalculator;
            $height = (float) $patient->height / 100;
            $imc_value = $new_imc->calculate($height, $weight);
            $imc[] = $new_imc->classify($imc_value);
        }

        $imcStats = [
            'Abaixo do peso' => 0,
            'Peso normal' => 0,
            'Sobrepeso' => 0,
            'Obesidade grau I' => 0,
            'Obesidade grau II' => 0,
            'Obesidade grau III' => 0,
        ];

        foreach ($imc as $classification) {
            $imcStats[$classification]++;
        }

        return new DashboardStatsDTO($totalPatients, $totalDiets, $totalWeights, $newPatientsThisMonth, $recentPatients, $consultationsInThisMonth,$imcStats);
    }
}
