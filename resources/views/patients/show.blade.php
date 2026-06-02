@extends("layouts.admin.main")

@section("content")
<div class="container">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-success">
      <i class="fas fa-user-circle me-2"></i> Perfil do Paciente
    </h4>
    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-outline-success rounded-pill">
      <i class="fas fa-edit me-2"></i> Editar Paciente
    </a>
  </div>

  <div class="row g-4">

    <!-- CARD PERFIL -->
    <div class="col-lg-12">
      <div class="card border-0 shadow-sm">
        <div class="card-body p-5">
          <div class="d-flex flex-column flex-md-row gap-4 align-items-center align-items-md-start">
            <img src="{{asset($patient->image)}}"
                 class="rounded-circle border border-3 border-success"
                 width="120" height="120" alt="{{ $patient->name }}">

            <div class="flex-grow-1 text-center text-md-start">
              <h3 class="fw-bold mb-1">{{ $patient->name }}</h3>
              <p class="text-muted fs-5 mb-3">
                {{ number_format($patient->age,0) ?? '—' }} anos • {{ $patient->gender ?? '—' }}
              </p>

              <div class="row g-4">
                <div class="col-sm-6 col-md-4">
                  <small class="text-muted">Telefone</small><br>
                 {{ $patient->phone ?? 'Não informado' }}
                </div>
                <div class="col-sm-6 col-md-4">
                  <small class="text-muted">Email</small><br>
                 {{ $patient->email ?? 'Não informado' }}
                </div>
                <div class="col-sm-6 col-md-4">
                  <small class="text-muted">Objetivo Principal</small><br>
                  <span class="badge bg-success fs-6">{{ $patient->objective ?? 'Emagrecimento' }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CARD PESO -->
    <div class="col-lg-6">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body p-4">
          <h5 class="fw-semibold text-success mb-3">
            <i class="fas fa-weight-scale me-2"></i> Peso Atual
          </h5>

          @if($lastWeight)
            <h2 class="fw-bold mb-1">{{ number_format($lastWeight->weight, 1) }} <small class="fs-4">kg</small></h2>
            <p class="mb-0">
              {{-- <span class="{{ $weightDifference >= 0 ? 'text-danger' : 'text-success' }}">
                {{ $weightDifference >= 0 ? '↑' : '↓' }}
                {{ number_format(abs($weightDifference), 1) }} kg
              </span> --}}
              <small class="text-muted">desde a última medição</small>
            </p>
          @else
            <p class="text-muted">Nenhuma medição registrada ainda.</p>
          @endif
        </div>
        <div class="card-footer bg-white border-0">
          <a href="{{ route('weightentry.create', $patient->id) }}" class="btn btn-success w-100 rounded-pill">
            <i class="fas fa-plus me-2"></i> Nova Medição de Peso
          </a>
        </div>
      </div>
    </div>

    <!-- CARD ÚLTIMA DIETA -->
    <div class="col-6">
      <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
          <h5 class="fw-semibold text-success mb-3">
            <i class="fas fa-file-pdf me-2"></i> Última Dieta Enviada
          </h5>

          @if($lastDiet)
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="fw-bold mb-1">{{ $lastDiet->title }}</h6>
                <small class="text-muted">
                  Enviada em:{{ $lastDiet->created_at->format('d/m/Y \à\s H:i') }}
                </small>
              </div>
              <a href="{{route("diets.show",["patient"=>$patient->id,"diet"=>$lastDiet->id])}}" class="btn btn-outline-success">
                <i class="fas fa-eye"></i> Ver Dieta
              </a>
            </div>
          @else
            <p class="text-muted py-3">Nenhuma dieta cadastrada ainda.</p>
          @endif
        </div>
        <div class="card-footer bg-white border-0">
          <a href="{{route("diets.create",["patient"=>$patient->id])}}" class="btn btn-success rounded-pill">
            <i class="fas fa-plus me-2"></i> Nova Dieta
          </a>
        </div>
      </div>
    </div>

  </div>

  <!-- AÇÕES RÁPIDAS -->
  <div class="mt-5 mb-4">
    <h5 class="fw-semibold mb-3">Ações Rápidas</h5>
    <div class="d-flex flex-wrap gap-3">
      <a  href="{{route("diets.create",["patient"=>$patient->id])}}" class="btn btn-success px-4 py-3 rounded-3 shadow-sm flex-grow-1 flex-md-grow-0">
        <i class="fas fa-file-pdf me-2"></i> Nova Dieta
      </a>
      <a href="{{ route('weightentry.create', $patient->id) }}" class="btn btn-outline-success px-4 py-3 rounded-3 shadow-sm flex-grow-1 flex-md-grow-0">
        <i class="fas fa-weight-scale me-2"></i> Novo Peso
      </a>
      <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-outline-primary px-4 py-3 rounded-3 shadow-sm flex-grow-1 flex-md-grow-0">
        <i class="fas fa-user-edit me-2"></i> Editar Dados
      </a>
    </div>
  </div>

  <!-- HISTÓRICO RECENTE -->
  <div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-4">
      <h5 class="fw-semibold mb-0">Histórico Recente</h5>
    </div>
    <div class="card-body p-4">
      <div class="row g-4">

        <!-- Últimos Pesos -->
        <div class="col-md-6">
          <h6 class="fw-medium text-muted mb-3">Últimos Pesos</h6>
          <div class="list-group">
            @foreach($recentWeights as $weight)
              <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                 {{ $weight->recorded_at->format('d/m/Y') }}
                </div>
                <div class="text-end">
                 {{ number_format($weight->weight, 1) }} kg
                </div>
              </div>
            @endforeach
          </div>
        </div>

        <!-- Últimas Dietas -->
        <div class="col-md-6">
          <h6 class="fw-medium text-muted mb-3">Últimas Dietas</h6>
          <div class="list-group">
            @foreach($recentDiets as $diet)
              <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                 {{ $diet->title }}
                </div>
                <div class="text-end">
                  <small class="text-muted">{{ $diet->created_at->format('d/m/Y') }}</small>
                </div>
              </div>
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </div>

</div>
@endsection
