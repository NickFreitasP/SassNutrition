<?php

namespace App\Interfaces\Web\Controllers;

use App\Application\Pacient\UseCases\CreatePatientUseCase as UseCasesCreatePatientUseCase;
use App\Application\Patient\DTOs\CreatePatientDTO;
use App\Application\Patient\UseCases\CreatePatientUseCase;
use App\Infrastructure\Persistence\Eloquent\Pacient;
use App\Interfaces\Web\Requests\StorePatientRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PatientController
{

  public function index() : View
  {

    $pacients = Pacient::latest()->paginate(10);

    return view('patients.index', compact('patients'));

  }

  public function create() : View
  {

    return view("patients.create");

  }

  public function store( StorePatientRequest $request , UseCasesCreatePatientUseCase $useCase  ): RedirectResponse {

    $dto = new CreatePatientDTO(
            nutritionistId: auth()->id(),
            name: $request->name,
            email: $request->email,
            birthDate: $request->birth_date,
            height: $request->height,
            notes: $request->notes,
            phone : $request->phone,
            weight: $request->weight
    );
    $useCase->execute($dto);
    return redirect()
            ->route('patients.index')
            ->with('success', 'Paciente criado com sucesso.');
    }

}



