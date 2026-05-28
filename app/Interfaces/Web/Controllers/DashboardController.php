<?php

namespace App\Interfaces\Web\Controllers;

use Illuminate\View\View;

class DashboardController
{

  public function index() : View
  {


    return view('dashboard.index');

  }


}



