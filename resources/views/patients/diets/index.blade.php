@extends('layouts.admin.main')

@section('content')


    <div class="container">

        <!-- Header do Cliente -->
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-center gap-4">
                    <img src="{{ asset($patient->image) }}" class="rounded-circle" width="90" height="90" alt="Ana Clara">

                    <div class="flex-grow-1 text-center text-md-start">
                        <h4 class="fw-bold mb-1">{{ $patient->name }}</h4>
                        <p class="text-muted mb-2">{{ number_format($patient->age, 0) }} anos • {{ $patient->objective }}
                        </p>
                        <div class="d-flex justify-content-center justify-content-md-start gap-4 text-sm">
                            <div><strong>Última Dieta:</strong>
                                {{ isset($lastDiet->uploaded_at) ? $lastDiet->uploaded_at->format('d/m/Y') : 'Nenhuma dieta cadastrada' }}
                            </div>
                            {{-- <div><strong>Calorias Médias:</strong> 1.850 kcal</div> --}}
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('diets.create', ['patient' => $patient->id]) }}"
                            class="btn btn-success rounded-pill px-4 py-2">
                            <i class="fas fa-plus me-2"></i> Nova Dieta
                        </a>
                    </div>
                </div>
            </div>
            {{-- // END CARD DE DIETAS --}}



        </div>

        <h5 class="fw-semibold mb-4 text-success">
            <i class="fas fa-list-ul me-2"></i> Dietas Cadastradas
        </h5>

        @session('success')
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endsession

        <!-- Lista de Dietas em Cards -->
        <div class="row g-4" id="dietasList">

            @if (count($diets) > 0)
                @foreach ($diets as $diet)
                    <!-- Dieta 1 -->
                    <div class="col-lg-6 col-xl-4">
                        <div class="card diet-card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <span class="badge bg-success mb-2">Atual</span>
                                        <h5 class="fw-bold">{{ $diet->title }}</h5>
                                    </div>
                                    <small class="text-muted text-end">
                                        {{ $diet->uploaded_at->format('d/m/Y') }}<br>
                                        <span class="text-success"><i class="fas fa-check-circle"></i> Ativa</span>
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

                                <div class="d-flex gap-2">
                                    <a href="{{ route('diets.show', ['patient' => $patient, 'diet' => $diet]) }}"
                                        class="btn btn-outline-success flex-grow-1 btn-sm">
                                        <i class="fas fa-eye"></i> Ver Dieta
                                    </a>
                                    <button class="btn btn-outline-primary flex-grow-1 btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </button>

                                    <form class="" style="display: inline-block"
                                        action="{{ route('diets.destroy', ['diet'=>$diet,'patient' => $patient->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Tem certeza que deseja remover esta dieta?')"
                                            style="color:#cc3333;border-color:#cc3333;display:inline;"
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
                <div> Não foram encontradas dietas para este paciente</div>
            @endif


        </div>

        <!-- Mensagem caso não tenha dietas -->
        <!-- <div class="text-center py-5 text-muted">
          <i class="fas fa-receipt fa-4x mb-3 opacity-25"></i>
          <p class="fs-5">Nenhuma dieta cadastrada ainda.</p>
          <button class="btn btn-success rounded-pill px-4">Criar Primeira Dieta</button>
        </div> -->

    </div>

@endsection
