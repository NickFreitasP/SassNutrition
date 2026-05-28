<?php

namespace App\Interfaces\Web\Controllers;

use App\Application\Patient\DTOs\CreateDietDTO;
use App\Http\Requests\StoreDietRequest;
use App\Infrastructure\Persistence\Eloquent\Patient;
use App\Application\Patient\UseCases\CreateDietUseCase;
use App\Infrastructure\Persistence\Eloquent\Diet;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DietController
{

    // View que lista todas as dietas dos pacientes

    public function index(Patient $patient): View
    {

        $diets = $patient
            ->diets()
            ->latest()
            ->paginate(10);


        $lastDiet = $patient
            ->diets()
            ->latest('uploaded_at')
            ->first();

        return view("diets.index", compact("diets", "patient", "lastDiet"));
    }

    // View para cadastro de nova dieta para paciente especifico

    public function create(Patient $patient): View
    {

        return view("diets.create", compact("patient"));
    }
    // GRAVA NOVA DIETA(PDF) DENTRO DO SISTEMA
    public function store(StoreDietRequest $request, CreateDietUseCase $useCase, Patient $patient): RedirectResponse
    {

        // VERIFICAÇÃO DO TIPO DE ARQUIVO ( PDF )



        // GRAVAÇÃO DO ARAQUIVO DENTRO DO SISTEMA
        $filePath = $request
            ->file('file')
            ->store('diets', 'public');


        // CRIAÇÃO DO OBJETO DTO
        $dto = new CreateDietDTO(

            patientId: $patient->id,
            title: $request->title,
            filePath: $filePath

        );
        // GRAVAÇÃO DOS DADOS DENTRO DO DB
        $useCase->execute($dto);

        return   redirect()
            ->route('diets.index', $patient)
            ->with('success', 'Dieta enviada com sucesso.');
    }

    public function show( Patient $patient, Diet $diet): View

    {
        return view('diets.show', compact(
            'patient',
            'diet'
        ));
    }
}
