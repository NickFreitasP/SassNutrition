@extends('layouts.admin.main')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header" style="display:flex;flex-direction:column;align-items:start;">
                <h1 style=""> Nova consulta </h1>
                <div>
                    <p style="font-size:12px;"> <a class="text-muted" style="text-decoration:none;"
                            href="{{ route('patients.index') }}">Pacientes</a> >
                        <a style="text-decoration:none" class="text-muted"
                            href="{{ route('consultations.index', ['patient' => $patient->id]) }}">Histórico de consultas >
                        </a>
                            <span style="color: #62cdc0">  Nova consulta</span>
                    </p>

                </div>
            </div>

            <div class="row">

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
                                                {{-- <div class=" mb-1 float-right"> <a
                                                        href="{{ route('diets.create', ['patient' => $patient->id]) }}"
                                                        class="btn  rounded-pill px-4 py-2"
                                                        style="background-color:#410353;color:white;font-weight:bold;">
                                                        <i class="fas fa-plus me-2" style="color:white;"></i> Nova Dieta</a>
                                                </div> --}}
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

                    {{-- <h5 class="fw-semibold mb-4 ">
                        <i class="fas fa-list-ul me-2"></i> Consultas
                    </h5> --}}

                    @session('success')
                        <div class="alert alert-success col-4">
                            {{ session('success') }}
                        </div>
                    @endsession

                    <div class="card border-0 shadow-sm col-12">
                        <div class="card-header bg-white border-0 py-4">
                            <h5 class="fw-bold  mb-0">
                                <i class="fas fa-weight-scale me-2"></i> Nova Medição de Peso
                            </h5>
                        </div>

                        <div class="card-body p-5">
                            <form action="{{ route('consultations.store', ['patient' => $patient->id]) }}" method="post">
                                @csrf
                                <div class="row g-4">

                                    <!-- Data -->
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label fw-semibold">
                                                    Nome da consulta
                                                </label>

                                                <input type="text" name="title" class="form-control"
                                                    value="{{ old('title') }}">


                                            </div>


                                            <div class="col-md-4 mb-3">
                                                <label class="form-label fw-semibold">
                                                    Data da Consulta
                                                </label>

                                                <input type="date" name="appointment_date" class="form-control"
                                                    value="{{ old('appointment_date') }}">


                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label class="form-label fw-semibold">
                                                    Horário
                                                </label>

                                                <input type="time" name="appointment_time" class="form-control"
                                                    value="{{ old('appointment_time') }}">
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Peso -->
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Notas da consulta</label>
                                        <div class="input-group  input-group-textarea-consultation">
                                            <textarea class="form-control" rows="20" name="notes" style="height:600px;">
                                        </textarea>
                                        </div>
                                    </div>

                                </div>

                                <!-- Botões -->
                                <!-- Botões -->
                                <div class="d-flex justify-content-end mt-5"style="display:flex;">
                                    <div style="margin-left: 15px">
                                        <button type="button" class="btn btn-secondary px-5 ml-3 rounded-pill"
                                            onclick="window.history.back()">
                                            Cancelar
                                        </button>
                                        <button type="submit" style="background-color:#62cdc0;color:white;"
                                            class="btn  px-5 rounded-pill">
                                            <i class="fas fa-save me-2"></i> Salvar consulta
                                        </button>
                                    </div>
                                    <div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>


@endsection
