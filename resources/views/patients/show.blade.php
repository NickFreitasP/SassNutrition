@extends('layouts.admin.main')

@section('content')
    <div class="main-content">
        <section class="section ">
            <div class="section-header ">
                <p> <a style="text-decoration:none; " class="text-muted" href="{{ route('patients.index') }}">Pacientes</a> >
                 <span style="color: #62cdc0">  {{$patient->name}} </span>  </p>
            </div>
            <div class="card col-md-12" style="margin:10px auto;">

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">

                        <div class="row align-items-center">

                            <div class="col-lg-2 text-center">

                                <img src="{{ asset($patient->image) }}" class="rounded-circle border border-3"
                                    style="
                        width:120px;
                        height:120px;
                        object-fit:cover;
                    ">

                            </div>

                            <div class="col-lg-7">

                                <h2 class="fw-bold mb-2">
                                    {{ $patient->name }}
                                </h2>

                                <div class="text-muted mb-3">

                                    <span class="me-3">
                                        <i class="fas fa-phone"></i>
                                        {{ $patient->phone }}
                                    </span>

                                    <span>
                                        <i class="fas fa-envelope"></i>
                                        {{ $patient->email }}
                                    </span>

                                </div>

                                <div class="d-flex flex-wrap justify-content-between gap-4 w-50">

                                    <span class="badge text-white "style="background-color:#62cdc0">
                                        {{ $patient->age }} anos
                                    </span>

                                    <span class="badge  text-white" style="background-color:#62cdc0">
                                        {{ $patient->objective }}
                                    </span>

                                    @if ($lastWeight)
                                        <span class="badge text-white" style="background-color:#62cdc0">
                                            {{ $lastWeight->weight }} kg
                                        </span>
                                    @endif

                                    <span class="badge  text-white" style="background-color:#62cdc0">
                                        {{ $recentDiets->count() }} Dietas
                                    </span>

                                    <span class="badge text-white" style="background-color:#62cdc0">
                                        {{ $recentWeights->count() }} Pesagens
                                    </span>

                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="d-grid gap-2 buttons-show-user">

                                    <a href="{{ route('diets.create', $patient->id) }}" class="btn "style="background-color:#62cdc0;color:white;">
                                        <i class="fas fa-file-pdf"></i>
                                        Nova Dieta
                                    </a>

                                    <a href="{{ route('weightentry.create', $patient->id) }}"
                                        class="btn "style="background-color: #62cdc0;color:white;">
                                        <i class="fas fa-weight"></i>
                                        Novo Peso
                                    </a>

                                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn "style="background-color: #62cdc0;color:white;">
                                        <i class="fas fa-user-edit"></i>
                                        Editar
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                {{-- <div class="card border-0 shadow-sm mb-4 mt-4">
                    <div class="card-body p-4">

                        <div class="row align-items-center">

                            <!-- Foto -->
                            <div class="col-lg-2 col-md-3 text-center mb-3 mb-md-0">

                                <img src="{{ asset($patient->image) }}" alt="{{ $patient->name }}" class="rounded-circle  "
                                    style="
                        border:1px solid #410353;
                        width:120px;
                        height:120px;
                        object-fit:cover;
                    ">

                            </div>

                            <!-- Dados -->
                            <div class="col-lg-7 col-md-6">

                                <h2 class="fw-bold mb-2" style="color:#410353;">
                                    {{ $patient->name }}
                                </h2>

                                <div class="d-flex flex-wrap gap-3 text-muted">

                                    <span class="mr-2" style="color:#410353;">
                                        <i class="fas fa-phone me-1"></i>
                                        {{ $patient->phone }}
                                    </span>

                                    <span style="color:#410353;">
                                        <i class="fas fa-envelope me-1"></i>
                                        {{ $patient->email }}
                                    </span>

                                </div>

                                <div class="mt-3">

                                    <span class="badge bg-light">
                                        {{ $patient->age }} anos
                                    </span>

                                    <span class="badge bg-light">
                                        {{ $patient->objective }}
                                    </span>



                                </div>

                            </div>

                            <!-- Botões -->
                            <div class="card-footer bg-white border-0">
                                <a href="{{ route('patients.edit', ['patient' => $patient->id]) }}"
                                    class="btn  rounded-pill" style="background-color: #410353;color:white;">
                                    <i class="fas fa-edit me-2"></i> Nova Dieta
                                </a>
                            </div>

                        </div>

                    </div>
                </div> --}}

                <div class="row g-4">


                    <!-- CARD PESO -->
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm "style="height:210px;">
                            <div class="card-body p-4">
                                <h5 class="fw-semibold  mb-3" style=";">
                                    Peso Atual
                                </h5>

                                @if ($lastWeight)
                                    <h2 class="fw-bold mb-1" style="color:;">
                                        {{ number_format($lastWeight->weight, 1) }} <small class="fs-4"
                                            style="">kg</small></h2>
                                    {{-- <p class="mb-0">
                                        <small class="text-muted">desde a última medição</small>
                                    </p> --}}
                                    <p class="mb-0">
                                        <small class="text-muted">Data da medição :
                                            {{ $lastWeight->recorded_at->format('d/m/Y') }}</small>
                                    </p>
                                @else
                                    <p class="text-muted">Nenhuma medição registrada ainda.</p>
                                @endif
                                <div class="card-footer bg-white border-0 pl-0">
                                    <a href="{{ route('weightentry.create', $patient->id) }}"
                                        class="btn   rounded-pill"style="background-color: #62cdc0;color:white;">
                                        <i class="fas fa-plus me-2"></i> Nova Medição de Peso
                                    </a>
                                     <a href="{{ route('weightentry.index', $patient->id) }}"
                                        class="btn   rounded-pill"style="background-color: #62cdc0;color:white;">
                                     <i class="fas fa-chart-line"></i> Histórico de pesos
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CARD ÚLTIMA DIETA -->
                    <div class="col-lg-6 ">
                        <div class="card border-0 shadow-sm "style="height:210px;">
                            <div class="card-body p-4">
                                <h5 class="fw-semibold mb-3" style="color:;">
                                    <i class="fas fa-file-pdf me-2"></i> Última Dieta Enviada
                                </h5>

                                @if ($lastDiet)
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="fw-bold mb-1" style="color:;">{{ $lastDiet->title }}</h6>
                                            <small class="text-muted">
                                                Enviada em:{{ $lastDiet->created_at->format('d/m/Y \à\s H:i') }}
                                            </small>
                                        </div>
                                        <a href="{{ route('diets.show', ['patient' => $patient->id, 'diet' => $lastDiet->id]) }}"
                                            class="btn btn-light">
                                            <i class="fas fa-eye "></i> Ver Dieta
                                        </a>
                                    </div>
                                @else
                                    <p class="text-muted py-3">Nenhuma dieta cadastrada ainda.</p>
                                @endif
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="{{ route('diets.create', ['patient' => $patient->id]) }}"
                                    class="btn  rounded-pill"style="background-color:#62cdc0;color:white;">
                                    <i class="fas fa-plus me-2"></i> Nova Dieta
                                </a>
                                 <a href="{{ route('diets.create', ['patient' => $patient->id]) }}"
                                    class="btn  rounded-pill"style="background-color: #62cdc0;color:white;">
                                     <i class="fas fa-utensils me-3"
                                       ></i> Histórico de dietas
                                </a>

                            </div>
                        </div>
                    </div>

                </div>



                  <div class="card-body p-4">
                            <div style="height: 300px;">
                                <canvas id="weightChart"></canvas>
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
                                    @foreach ($recentWeights as $weight)
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
                                    @foreach ($recentDiets as $diet)
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

        </section>
    </div>
@endsection
@push('style')
    <style>
        .profile-header {
            background: ;
            border-radius: 20px;
            color: white;
            padding: 40px 30px;
            position: relative;
            overflow: hidden;
        }

        .avatar {
            width: 140px;
            height: 140px;
            border: 6px solid white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
        }

        .info-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }
    </style>
@endpush
@if (isset($entryWeight))
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
        <script>
            // Dados preparados de forma mais segura
            const chartData = @json(
                $entryWeight->map(function ($item) {
                        return [
                            'date' => $item->recorded_at->format('d/m/Y'),
                            'weight' => (float) $item->weight,
                        ];
                    })->reverse()->values());

            const labels = chartData.map(item => item.date);
            const weights = chartData.map(item => item.weight);


            new Chart(document.getElementById('weightChart'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Peso (kg)',
                        data: weights,
                        borderColor: '#10b981',
                        borderWidth: 5,
                        tension: 0.4,
                        pointRadius: 6,
                        pointHoverRadius: 9,
                        pointBackgroundColor: '#ffffff',
                        pointBorderWidth: 3,
                        pointBorderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.08)',
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(15, 23, 42, 0.95)',
                            padding: 14,
                            bodyFont: {
                                size: 15,
                                weight: '600'
                            },
                            callbacks: {
                                label: (context) => context.raw + " kg"
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            grid: {
                                color: '#f1f5f9'
                            },
                            ticks: {
                                color: '#64748b',
                                font: {
                                    size: 13
                                }
                            }
                        },
                        x: {
                            grid: {
                                color: '#f1f5f9'
                            },
                            ticks: {
                                color: '#64748b',
                                font: {
                                    size: 13
                                }
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
@endif
