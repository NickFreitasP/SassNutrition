@extends('layouts.admin.main')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header" style="display:flex;flex-direction:column;align-items:start;">
                <h1 style=""> Vizualização de consulta</h1>
                <div class="mt-3">
                    <p style="font-size:12px;">
                        <a style="text-decoration:none;"  class="text-muted" href="{{ route('patients.index') }}">Pacientes >
                        </a>

                        <a style="text-decoration:none;" class="text-muted"
                            href="{{ route('consultations.index', ['patient' => $patient->id]) }}"> Hitórico de consultas >
                        </a>

                       <span style="color: #df4d46">Vizualização de consulta</span>
                    </p>

                </div>
            </div>


            <div class="row mt-3">

                <div class=" col-md-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                            <div class="card" style="padding-top: 30px">
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <img class="mr-3 rounded-circle" width="90" height="90"
                                                src="{{ asset($patient->image) }}" alt="avatar">
                                            <div class="media-body">
                                                <div class=" mb-1 float-right"> <a
                                                        href="{{ route('consultations.create', ['patient' => $patient->id]) }}"
                                                        class="btn  rounded-pill px-4 py-2"
                                                        style="background-color:#14b8a6;color:white;font-weight:bold;">
                                                        <i class="fas fa-plus me-2" style="color:white;"></i> Nova
                                                        Consulta</a>
                                                </div>
                                                <h6 class="media-title"><a href="#">{{ $patient->name }}</a></h6>
                                                <div class="text-small text-muted"> Cadatradado em
                                                    {{ $patient->created_at->format('d/m/Y') }} <span>
                                                        {{-- class="text-primary">Now</span> --}}
                                                </div>
                                                <div class="mt-4"><strong>Última Consulta:</strong>
                                                    {{ isset($lastConsultation->appointment_date) ? $lastConsultation->appointment_date->format('d/m/Y') : 'Nenhuma consulta cadastrada' }}
                                                </div>


                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>



                    @session('success')
                        <div class="alert alert-success col-4">
                            {{ session('success') }}
                        </div>
                    @endsession

                    <!-- Lista de Dietas em Cards -->
                    <div class="row g-4" id="dietasList">

                        <!-- Dieta 1 -->
                        <div class="  col-xl-12" style="margin:0px auto;">

                            <div class=" ">
                                {{-- Cabeçalho da Consulta --}}
                                <div class="card mb-0 py-3">
                                    <div
                                        class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">

                                        <div>
                                            <h3 class="fw-bold mb-0" style="font-size: 1.35rem;">
                                                {{ $consultation->title }}
                                            </h3>
                                            @if (isset($consultation->date))
                                                <small class="text-muted">
                                                    {{ $consultation->date->format('d/m/Y \à\s H:i') }}
                                                </small>
                                            @endif
                                        </div>

                                        <div class="">
                                            <a href=""
                                                class="btn text-dark"
                                                style="background-color: #e9e9ed;"
                                                >
                                                <i class="fas fa-edit me-2"></i> Editar
                                            </a>

                                            <form action=""
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn "
                                                    onclick="return confirm('Deseja realmente excluir esta consulta?')">
                                                    <i class="fas fa-trash me-2"></i> Excluir
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                                {{-- Informações da consulta --}}
                                <div class="card border-0 shadow-sm mb-0">

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-4">

                                                <div class="border rounded p-3 h-100">

                                                    <small class="text-muted d-block mb-2">
                                                        Data da Consulta
                                                    </small>

                                                    <h5 class="fw-bold mb-0" style="font-size: 15px">
                                                        <i class="fas fa-calendar-alt me-2 text-success"></i>

                                                        {{ $consultation->appointment_date->format('d/m/Y') }}
                                                    </h5>

                                                </div>

                                            </div>

                                            <div class="col-md-4">

                                                <div class="border rounded p-3 h-100">

                                                    <small class="text-muted d-block mb-2">
                                                        Horário
                                                    </small>

                                                    <h5 class="fw-bold mb-0" style="font-size: 15px">
                                                        <i class="fas fa-clock me-2 text-primary"></i>

                                                        {{ $consultation->appointment_date->format('H:i') }}
                                                    </h5>

                                                </div>

                                            </div>

                                            <div class="col-md-4">

                                                <div class="border rounded p-3 h-100">

                                                    <small class="text-muted d-block mb-2">
                                                        Paciente
                                                    </small>

                                                    <h5 class="fw-bold mb-0" style="font-size: 15px">
                                                        <i class="fas fa-user me-2 text-secondary"></i>

                                                        {{ $patient->name }}
                                                    </h5>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                {{-- Observações --}}
                                <div class="card border-0 shadow-sm mt-0">

                                    <div class="card-header bg-white">

                                        <h5 class="fw-bold mb-0" style="font-size: 15px">
                                            <i class="fas fa-notes-medical me-2"></i>
                                            Observações da Consulta
                                        </h5>

                                    </div>

                                    <div class="card-body ">

                                        @if ($consultation->notes)
                                            <div
                                                style="
                                                white-space: pre-line;
                                                line-height: 1.8;
                                                font-size: 1rem;
                                                padding-bottom:15px;
                                            ">
                                                {{ $consultation->notes }}
                                            </div>
                                        @else
                                            <p class="text-muted mb-0">
                                                Nenhuma observação registrada.
                                            </p>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

        </section>
    </div>

@endsection
