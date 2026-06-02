<?php

namespace App\Interfaces\Web\Controllers;

use App\Application\Patient\UseCases\DashboardStatsUseCase;
use Illuminate\View\View;

class DashboardController
{

  public function index(DashboardStatsUseCase $useCase ) : View
  {

    $stats = $useCase->execute(auth()->id());

    return view('dashboard.teste
    ',["stats" => $stats]);

  }


}



