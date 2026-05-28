<?php

namespace App\Interfaces\Web\Controllers;

use App\Application\Patient\UseCases\CreatePatientUseCase;
use App\Application\Patient\DTOs\CreatePatientDTO;
use App\Infrastructure\Persistence\Eloquent\Patient;
use App\Interfaces\Web\Requests\StorePatientRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PatientController
{

  public function index() : View
  {

    $patients = Patient::latest()->paginate(10);

    return view('patients.index', compact('patients'));

  }

  public function create() : View
  {

    return view("patients.create");

  }

  public function store( StorePatientRequest $request , CreatePatientUseCase $useCase  ): RedirectResponse {


     $dto = new CreatePatientDTO(
            nutritionistId: auth()->id(),
            name: $request->name,
            email: $request->email,
            birthDate: $request->birth_date,
            height: $request->height,
            notes: $request->notes,
            phone: $request->phone,
            weight: $request->weight,
            image:"image.png",
            age: $request->age,
            objective: $request->objective,
            dietaryRestrictions: $request->dietaryRestrictions,
            gender: $request->gender,
            foodPreferences: $request->foodPreferences,
            observations: $request->observations,
            occupation: $request->occupation,
    );

    $useCase->execute($dto);

    return redirect()
            ->route('patients.index')
            ->with('success', 'Paciente criado com sucesso.');
    }

}



