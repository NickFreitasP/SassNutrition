<?php

namespace App\Application\Patient\UseCases;

use App\Application\Patient\DTOs\DashboardStatsDTO;
use App\Infrastructure\Persistence\Eloquent\Diet;
use App\Infrastructure\Persistence\Eloquent\Patient;
use App\Infrastructure\Persistence\Eloquent\WeightEntry;

class DashboardStatsUseCase
{

 public function execute( int $nutritionistId) : DashboardStatsDTO
 {

   // TOTAL DE PACIENTES
   $totalPatients = Patient::where("nutritionist_id",$nutritionistId)->count();

   // TOTAL DE DIETAS CADASTRADAS
    $totalDiets = Diet::whereHas("patient",fn ($query) => $query->where("nutritionist_id",$nutritionistId))->count();

   // TOTAL DE PESOS CADASTRADOS
    $totalWeights = WeightEntry::whereHas("patient",fn ($query) => $query->where("nutritionist_id",$nutritionistId))->count();

    // TOTAL DE PESOS CADASTARADOS NO MES ATUAL
    $newPatientsThisMonth = Patient::where("nutritionist_id",$nutritionistId)->whereMonth("created_at",now()->month)->count();

    // ULTIMOS 5 PACIENTES CADASTRADOS
    $recentPatients = Patient::where("nutritionist_id",$nutritionistId)->latest()->take(5)->get();


   return new DashboardStatsDTO($totalPatients,$totalDiets,$totalWeights,$newPatientsThisMonth,$recentPatients);

 }


}



