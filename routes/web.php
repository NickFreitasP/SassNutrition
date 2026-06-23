<?php

use App\Http\Controllers\ProfileController;
use App\Infrastructure\Persistence\Eloquent\Consultation;
use App\Interfaces\Web\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Interfaces\Web\Controllers\PatientController;
use App\Interfaces\Web\Controllers\DietController;
use App\Interfaces\Web\Controllers\WeightEntryController;
use App\Interfaces\Web\Controllers\ConsultationController;

Route::get("/cards",function(){
    return view("cards");


});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::middleware("auth")->group(function (){

   Route::controller(DashboardController::class)->group(function(){

    Route::get("/dashboard","index")->name("dashboard.index");
    Route::get("/suporte","suporte")->name("dashboard.suporte");

   });

});

// ROTAS GERENCIADAS PELO PATIENT CONTROLLLER

Route::middleware('auth')->group(function () {

   Route::resource('patients', PatientController::class);

});

// ROTAS GERENCIADAS PELO DIET CONTROLLLER

Route::middleware('auth')->group(function () {

   Route::controller(DietController::class)->group(function(){

    // ROUTE VIEW PARA LISTAR TODAS AS DIETAS POR PACIENTE
     Route::get("/diets/{patient}","index")->name("diets.index");

     // ROUTE VIEW PARA UPLOAD DE NOVA DIETA
     Route::get("/diets/create/{patient}","create")->name("diets.create");

     // ROUTE VIEW PARA UPLOAD DE NOVA DIETA
     Route::post("/diets/store/{patient}","store")->name("diets.store");

     // ROUTE VIEW PARA VIZUALIZAÇÃO DE DIETA
     Route::get("/diets/show/{patient}/{diet}","show")->name("diets.show");

     // ROUTE PARA DELETAR DIETA
     Route::delete("/patients/diets/destroy/{diet}/{patient}","destroy")->name("diets.destroy");

    });


});


// ROTAS GERENCIADAS PELO WEIGHTENTRY  CONTROLLLER

Route::middleware('auth')->group(function () {

   Route::controller(WeightEntryController::class)->group(function(){


    // ROUTE VIEW PARA LISTAR TODAS O HISTÓRICO DE PESOS POR PACIENTE
     Route::get("/patients/weight_entry/{patient}","index")->name("weightentry.index");

    //  ROUTE VIEW PARA UPLOAD DE NOVO PESO
     Route::get("/patients/weight_entry/create/{patient}","create")->name("weightentry.create");

    // ROUTE VIEW PARA CADASTRO DE PESO
     Route::post("/patients/weight_entry/store/{patient}","store")->name("weightentry.store");

     // ROUTE VIEW PARA CADASTRO DE PESO
     Route::delete("/patients/weight_entry/destroy/{weightEntry}/{patient}","destroy")->name("weightentry.destroy");

     // ROUTE VIEW PARA VIZUALIZAÇÃO DE DIETA
    //  Route::get("/diets/show/{patient}/{diet}","show")->name("diets.show");

   });

   Route::middleware('auth')->group(function () {

    Route::controller(ConsultationController::class)->group(function(){

    // ROUTE VIEW PARA LISTAR TODAS AS CONSULTAS POR PACIENTE
     Route::get("/patients/consultas/{patient}","index")->name("consultations.index");

     // ROUTE VIEW PARA UPLOAD DE NOVA CONSULTA
     Route::get("/patients/consultas/create/{patient}","create")->name("consultations.create");

     // ROUTE HANDLER UPLOAD DE NOVA CONSULTA
     Route::post("/patients/consultas/store/{patient}","store")->name("consultations.store");

     // ROUTE VIEW PARA VIZUALIZAÇÃO DE CONSULTA
     Route::get("/patients/consultas/show/{patient}/{consultation}","show")->name("consultations.show");

     // ROUTE PARA DELETAR DIETA
    //  Route::delete("/patients/diets/destroy/{diet}/{patient}","destroy")->name("diets.destroy");

    });


});




});

require __DIR__.'/auth.php';
