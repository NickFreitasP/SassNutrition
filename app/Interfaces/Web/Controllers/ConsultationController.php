<?php

namespace App\Interfaces\Web\Controllers;

use App\Application\Patient\UseCases\CreateConsultationUseCase;
use App\Infrastructure\Persistence\Eloquent\Patient;
use App\Http\Requests\StoreConsultationRequest;
use App\Application\Patient\DTOs\CreateConsultationDTO;
use App\Infrastructure\Persistence\Eloquent\Consultation;
use Illuminate\Http\RedirectResponse;

use Illuminate\View\View;

class ConsultationController
{

  public function index(Patient $patient ) : View
  {

     $consultations = $patient->consultations()->latest()->paginate(10);
     $lastConsultation = $patient->consultations()->latest()->first();

    //  dd($consultations);
     return view("patients.consultations.index",compact('consultations','patient','lastConsultation'));

  }

  public function create(Patient $patient) : View
  {

     return view("patients.consultations.create",compact("patient"));

  }

   public function store(StoreConsultationRequest $request , CreateConsultationUseCase $useCase , Patient $patient): redirectResponse
   {

      $appointmentDateTime = $request->appointment_date .' ' .$request->appointment_time;

    //   dd($appointmentDateTime);

       $dto = new CreateConsultationDTO(

          patientId : $patient->id,
          notes : $request->notes,
          appointmentDate : $appointmentDateTime,
          title : $request->title

       );
       $useCase->execute($dto);

         return  redirect()
               ->route('consultations.index', $patient)
               ->with('success', 'Consulta salva com sucesso.');

   }

   public function show(Patient $patient , Consultation $consultation) :View
   {

       return view("patients.consultations.show",compact("consultation","patient"));


   }


}



