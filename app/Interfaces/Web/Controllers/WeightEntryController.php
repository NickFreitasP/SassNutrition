<?php

namespace App\Interfaces\Web\Controllers;

use App\Infrastructure\Persistence\Eloquent\Patient;
use App\Http\Requests\StoreWeightEntryRequest;
use App\Application\Patient\DTOs\CreateWeightEntryDTO as dto;
use App\Application\Patient\UseCases\CreateWeightEntryUseCase;
use App\Infrastructure\Persistence\Eloquent\WeightEntry;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class WeightEntryController
{


    // ROUTE LIST ALL WEIGHT ENTRY
    public function index(Patient $patient): View
    {
        $entryWeight = $patient->weightEntries()->latest('recorded_at')->paginate(10);

        if (count($entryWeight) > 0) {
            $lastRecord = $patient->weightEntries()->latest('recorded_at')->first();
            $firstRecord =  $patient->weightEntries()->orderBy('recorded_at', "asc")->first();
            $weightDifference = ($lastRecord->weight) - ($firstRecord->weight);

            return view('patients.weight_entry.index', compact('entryWeight', 'patient', 'lastRecord', 'firstRecord', 'weightDifference'));
        }

        return view('patients.weight_entry.index', compact('patient'));
    }

    public function create(Patient $patient): View
    {

        return view("patients.weight_entry.create", compact("patient"));
    }

    public function store(StoreWeightEntryRequest $request, CreateWeightEntryUseCase $useCase, Patient $patient): RedirectResponse
    {



        $dto = new dto(
            patientId: $patient->id,
            recordedAt: $request->recorded_at,
            weight: $request->weight
        );

        $useCase->execute($dto);


        return   redirect()
            ->route('weightentry.index', $patient)
            ->with('success', 'Peso cadastrado com sucesso.');
    }


   public function destroy(WeightEntry $weightEntry,Patient $patient) : RedirectResponse
   {

      $weightEntry->delete();
      return redirect()->route("weightentry.index",["patient"=>$patient])->with("success","Peso deletado com sucesso");

   }

}
