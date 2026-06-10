@extends('layouts.admin.main')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header" style="display:flex;flex-direction:column;align-items:start;">
                <h1 style=""> Histórico de consultas</h1>
                <div>
                    <p >
                        <a style="text-decoration:none;"
                            href="{{ route('patients.index') }}"
                            class="text-muted"
                            >
                            Pacientes  >
                        </a>
                        <span style="color:#62cdc0">  Hitórico de consultas</span>

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
                                                <div class=" mb-1 float-right"> <a
                                                        href="{{ route('consultations.create', ['patient' => $patient->id]) }}"
                                                        class="btn  rounded-pill px-4 py-2"
                                                        style="background-color:#62cdc0;color:white;font-weight:bold;">
                                                        <i class="fas fa-plus me-2" style="color:white;"></i> Nova
                                                        Consulta</a>
                                                </div>
                                                <h6 class="media-title"><a href="#">{{ $patient->name }}</a></h6>
                                                <div class="text-small text-muted"> Cadatradado em
                                                    {{ $patient->created_at->format('d/m/Y') }} <span>
                                                        {{-- class="text-primary">Now</span> --}}
                                                </div>
                                                <div class="mt-4" style="color: rgb(46, 42, 42)"><strong>Última Consulta:</strong>
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

                    <!-- Lista de Dietas em Cards -->
                    <div class="row g-4" id="dietasList">

                        @if (count($consultations) > 0)
                            <!-- Dieta 1 -->
                            <div class="col-md-12 ">

                                <div class="card">
                                    <div class="card-header">
                                        <div
                                            class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-1">
                                            <h4 class="fw-bold  mb-0" style="font-size:22px;color:#62cdc0">
                                                <i class="fas fa-calendar-check me-2"></i> Consultas
                                            </h4>

                                        </div>
                                    </div>

                                    <div class="card-body p-4">
                                        <!-- Filtros -->
                                        <div class="row g-3 mb-4 h-100" style="display:flex;justify-content:space-between;">
                                            {{-- <div class="col-md-5">
                                                    <input type="text" class="form-control rounded-pill"
                                                        placeholder="Buscar por paciente...">
                                                </div> --}}
                                            {{-- <div class="col-md-3">
                                                    <select class="form-select rounded-pill">
                                                        <option value="">Todos os Status</option>
                                                        <option value="agendada">Agendada</option>
                                                        <option value="realizada">Realizada</option>
                                                        <option value="cancelada">Cancelada</option>
                                                    </select>
                                                </div> --}}

                                        </div>

                                        <!-- Tabela de Consultas -->
                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle">
                                                <thead>
                                                    <tr>
                                                        <th>Titulo</th>
                                                         <th>Data / Hora</th>
                                                        {{-- <th>Tipo</th>
                                                            <th>Status</th>
                                                            <th>Nutricionista</th> --}}
                                                        <th>Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @foreach ($consultations as $consultation)
                                                            <td>{{$consultation->title}}</td>

                                                            <td>
                                                                <strong>{{ $consultation->appointment_date->format('d/m/Y') }}</strong><br>
                                                                <small
                                                                    class="text-muted">{{ $consultation->appointment_date->format('H:m:s') }}</small>
                                                            </td>

                                                            {{-- <td><span class="badge bg-success">Retorno</span></td>
                                                            <td>
                                                                <span
                                                                    class="status-badge bg-success text-white">Confirmada</span>
                                                            </td>
                                                            <td>Dr. Lucas Mendes</td> --}}
                                                            <td class="td-consultations">

                                                                <a href="{{ route('consultations.show', ['patient' => $patient->id,"consultation"=>$consultation->id]) }}"
                                                                    title="Dados do paciente"
                                                                    class="btn btn-sm a-link  me-1"
                                                                    style=";background-color:#e9e9ed;"><i class="fas fa-eye"></i>
                                                                </a>

                                                                <button class="btn btn-sm" style="color:white;">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                                <form class="" style="display: inline-block"
                                                                    action="{{ route('patients.destroy', ['patient' => $patient->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button
                                                                        onclick="return confirm('Tem certeza que deseja remover este paciente?')"
                                                                        style="" title="Excluir paciente"
                                                                        class="btn btn-sm me-1">
                                                                        <i class="fas fa-trash text-danger"
                                                                            style="color:#cc3333;"></i>
                                                                    </button>
                                                                </form>

                                                            </td>
                                                    </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>

                <!-- Paginação -->
                <div class="card-footer bg-white border-0 py-3">
                    <nav>
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item"><a class="page-link rounded-pill" href="#">Anterior</a></li>
                            <li class="page-item active"><a class="page-link rounded-pill" href="#">1</a></li>
                            <li class="page-item"><a class="page-link rounded-pill" href="#">2</a></li>
                            <li class="page-item"><a class="page-link rounded-pill" href="#">3</a></li>
                            <li class="page-item"><a class="page-link rounded-pill" href="#">Próximo</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
    </div>
@else
    <div class="ml-3"> Não foram encontradas consultas para este paciente</div>
    @endif


    </div>
    </div>
    </section>
    </div>


@endsection
