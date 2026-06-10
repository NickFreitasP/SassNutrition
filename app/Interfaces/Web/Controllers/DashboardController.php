<?php

namespace App\Interfaces\Web\Controllers;

use App\Application\Patient\UseCases\DashboardStatsUseCase;
use Illuminate\View\View;

class DashboardController
{

  public function index(DashboardStatsUseCase $useCase ) : View
  {

    $stats = $useCase->execute(auth()->id());

    // dd($stats);
    return view('dashboard.index
    ',["stats" => $stats]);

  }


    public function suporte(DashboardStatsUseCase $useCase ) : View
   {

    return view('dashboard.suporte');

  }
}



