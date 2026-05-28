<?php

use App\Http\Controllers\ProfileController;
use App\Interfaces\Web\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Interfaces\Web\Controllers\PatientController;
use App\Interfaces\Web\Controllers\DietController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware("auth")->group(function (){

   Route::controller(DashboardController::class)->group(function(){

    Route::get("/dashboard","index")->name("dashboard.index");

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

   });


});


require __DIR__.'/auth.php';
