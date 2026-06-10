<?php

namespace App\Interfaces\Web\Controllers;

use App\Application\Patient\UseCases\CreatePatientUseCase;
use App\Application\Patient\DTOs\CreatePatientDTO;
use App\Application\Patient\DTOs\PatientsFiltersDTO;
use App\Infrastructure\Persistence\Eloquent\Patient;
use App\Application\Patient\UseCases\SearchPatientsUseCase;
use App\Interfaces\Web\Requests\StorePatientRequest;
use App\Application\Patient\DTOs\UpdatePatientDTO;
use App\Application\Patient\UseCases\UpdatePatientUseCase;
use App\Http\Requests\UpdatePatientRequest as RequestsUpdatePatientRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PatientController
{

    public function index(Request $request,SearchPatientsUseCase $useCase): View
    {

        $dto = new PatientsFiltersDTO(
            nutritionistId:auth()->id(),
            search: $request->search
        );

        $patients = $useCase->execute($dto);

        return view('patients.index', compact('patients'));
    }

    public function create(): View
    {

        return view("patients.create");
    }

    public function store(StorePatientRequest $request, CreatePatientUseCase $useCase): RedirectResponse
    {


        $dto = new CreatePatientDTO(
            nutritionistId: auth()->id(),
            name: $request->name,
            email: $request->email,
            birthDate: $request->birth_date,
            height: $request->height,
            notes: $request->notes,
            phone: $request->phone,
            // weight: $request->weight,
            image: "image.png",
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



    public function show(Patient $patient): View
    {

        $entryWeight = $patient
        ->weightEntries()
        ->latest('recorded_at')
        ->paginate(10);

        $lastDiet = $patient
            ->diets()
            ->latest('uploaded_at')
            ->first();

        $lastWeight = $patient
            ->weightEntries()
            ->latest('recorded_at')
            ->first();

        $recentWeights = $patient
            ->weightEntries()
            ->latest('recorded_at')
            ->take(5)
            ->get();

        $recentDiets = $patient
            ->diets()
            ->latest('uploaded_at')
            ->take(5)
            ->get();

        return view('patients.show', compact(
            'patient',
            'lastDiet',
            'lastWeight',
            'recentWeights',
            'recentDiets',
            'entryWeight'
        ));
    }

    // ROUTE RETORNA VIEW PARA EDIÇÃO DE PACIENTE
    public function edit(Patient $patient) : View
    {

      return view("patients.edit",compact("patient"));


    }

     // ROUTE ATULIZAÇÃO DE DADOS DO PACIENTE

  public function update(RequestsUpdatePatientRequest $request,Patient $patient,UpdatePatientUseCase $useCase): RedirectResponse {


    $dto = new UpdatePatientDTO(
        patientId: $patient->id,
        name: $request->name,
        email: $request->email,
        birthDate: $request->birth_date,
        height: $request->height,
        notes: "",
        phone: $request->phone,
        image: $request->image,
        age: $request->age,
        objective: $request->objective,
        dietaryRestrictions: $request->dietary_restrictions,
        gender: $request->gender,
        foodPreferences: $request->food_preferences,
        observations: $request->observations,
        occupation: $request->occupation,
    );

    $useCase->execute($dto);

    return redirect()
        ->route('patients.show', $patient)
        ->with('success', 'Paciente atualizado com sucesso.');
}

public function destroy(Patient $patient) : RedirectResponse
{

   $patient->delete();

   return redirect()->route("patients.index")->with("success","Paciente deletado com sucesso!");


}


}
