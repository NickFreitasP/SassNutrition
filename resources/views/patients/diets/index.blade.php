@extends('layouts.admin.main')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header" style="display:flex;flex-direction:column;align-items:start;">
                <h1 >Dietas</h1>
                <div>
                  <p> <a style="text-decoration:none;" class="text-muted"  href="{{ route('patients.index') }}">Pacientes</a> >
                  <a style="color: #62cdc0;text-decoration:none;" href="{{ route('diets.index',['patient' => $patient->id]) }}">Dietas </a> </p>

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
                                                        href="{{ route('diets.create', ['patient' => $patient->id]) }}"
                                                        class="btn  rounded-pill px-4 py-2"
                                                        style="background-color:#62cdc0;color:white;font-weight:bold;">
                                                        <i class="fas fa-plus me-2" style="color:white;"></i> Nova Dieta</a>
                                                </div>
                                                <h6 class="media-title"><a href="#">{{ $patient->name }}</a></h6>
                                                <div class="text-small text-muted"> Cadatradado em
                                                    {{ $patient->created_at->format('d/m/Y') }} <span>
                                                        {{-- class="text-primary">Now</span> --}}
                                                </div>
                                                <div class="mt-4"><strong>Última Dieta:</strong>
                                                    {{ isset($lastDiet->uploaded_at) ? $lastDiet->uploaded_at->format('d/m/Y') : 'Nenhuma dieta cadastrada' }}
                                                </div>
                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <h5 class="fw-semibold mb-4 ">
                        <i class="fas fa-list-ul me-2"></i> Dietas Cadastradas
                    </h5>

                    @session('success')
                        <div class="alert alert-success col-4">
                            {{ session('success') }}
                        </div>
                    @endsession

                    <!-- Lista de Dietas em Cards -->
                    <div class="row g-4" id="dietasList">

                        @if (count($diets) > 0)
                            @foreach ($diets as $diet)
                                <!-- Dieta 1 -->
                                <div class="col-lg-6 col-xl-4">
                                    <div class="card diet-card h-100 border-0 shadow-sm pt-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="">

                                                    <h5 class="fw-bold" style="display: inline-block">{{ $diet->title }}</h5>
                                                    @if ($lastDiet->id == $diet->id)
                                                        <span class="badge bg-success mb-2">Atual</span>
                                                    @endif
                                                </div>
                                                <small class="text-muted text-end" style="display: inline-block;margin-left:10px;">
                                                    {{ $diet->uploaded_at->format('d/m/Y') }}<br>
                                                    {{-- <span class="text-success"><i class="fas fa-check-circle"></i>
                                                        Ativa</span> --}}
                                                </small>
                                            </div>

                                            <hr>

                                                                            {{-- <div class="row text-center mb-3">
                                            <div class="col-4">
                                                <small class="text-muted">Calorias</small><br>
                                                <strong>1.780 kcal</strong>
                                            </div>
                                            <div class="col-4">
                                                <small class="text-muted">Proteínas</small><br>
                                                <strong>112g</strong>
                                            </div>
                                            <div class="col-4">
                                                <small class="text-muted">Carboidratos</strong><br>
                                                <strong>145g</strong>
                                            </div>
                                            </div> --}}

                                            <div class=" gap-2 buttons-diet">
                                                <a href="{{ route('diets.show', ['patient' => $patient, 'diet' => $diet]) }}"
                                                    class="btn flex-grow-1 btn-sm"style="color:white;background-color:#62cdc0;display:inline-block;">
                                                    <i class="fas fa-eye"></i> Ver Dieta
                                                </a>
                                                <button class="btn  flex-grow-1 btn-sm"style="color:white;background-color:#62cdc0;display:inline-block;">
                                                    <i class="fas fa-edit"></i> Editar
                                                </button>

                                                <form class="" style="display: inline-block"
                                                    action="{{ route('diets.destroy', ['diet' => $diet, 'patient' => $patient->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        onclick="return confirm('Tem certeza que deseja remover esta dieta?')"
                                                        style="color:#cc3333;display:inline; background-color:white;"
                                                        title="Excluir dieta" class="btn btn-sm me-1">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                        {{-- <div class="card-footer bg-white border-0 text-muted small d-flex justify-content-between">
            <span><i class="fas fa-clock"></i> 7 dias</span>
            <span><i class="fas fa-utensils"></i> 5 refeições/dia</span>
          </div> --}}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="ml-3"> Não foram encontradas dietas para este paciente</div>
                        @endif


                    </div>

                    <!-- Mensagem caso não tenha dietas -->
                    <!-- <div class="text-center py-5 text-muted">
                      <i class="fas fa-receipt fa-4x mb-3 opacity-25"></i>
                      <p class="fs-5">Nenhuma dieta cadastrada ainda.</p>
                      <button class="btn btn-success rounded-pill px-4">Criar Primeira Dieta</button>
                    </div> -->

                </div>

        </section>
    </div>

@endsection
