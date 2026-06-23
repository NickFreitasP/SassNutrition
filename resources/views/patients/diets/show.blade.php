@extends('layouts.admin.main')

@section('content')
    <div class="main-content">
        <section class="section">
             <div class="section-header">
               <div class="" style="display:flex;flex-direction:column;align-items:start;">
                <h1 > Dietas</h1>
                <div>
                  <p> <a style="color: text-decoration:none;"class="text-muted"  href="{{ route('patients.index') }}">Pacientes</a> >
                  <a style="text-decoration:none;" class="text-muted" href="{{ route('diets.index',['patient' => $patient->id]) }}">Hitórico de dietas </a> > <span style="color:#62cdc0 "> Dieta</span></p>

                </div>
             </div>
            </div>

            <div class="row">

                <div class=" col-md-12">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>
                            <h1 class="h3">
                                {{ $diet->title }}
                            </h1>

                            <small class="text-muted">
                                Enviado em
                                {{ $diet->uploaded_at->format('d/m/Y H:i') }}
                            </small>
                        </div>

                        {{-- <a href="{{ route('patients.diets.download', [$patient, $diet]) }}"
               class="btn btn-primary">

                Download PDF

            </a> --}}

                    </div>

                    <div class="card shadow-sm w-75" style="margin: 0px auto" >

                        <div class="card-body p-0" style="display: flex;justify-content:center;">

                            <iframe src="{{ asset('storage/' . $diet->file_path) }}" width="100%" height="800px">
                            </iframe>

                        </div>

                    </div>

                </div>

        </section>
    </div>
@endsection
