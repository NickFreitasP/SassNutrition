@extends('layouts.admin.main')

@section('content')
    <div class="container">

        <!-- Header do Cliente -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-center gap-4">
                    <img src="{{ asset($patient->image) }}" class="rounded-circle" width="85" height="85"
                        alt="{{ $patient->name }}">

                    <div class="flex-grow-1 text-center text-md-start">
                        <h4 class="fw-bold mb-1">{{ $patient->name }}</h4>
                        <p class="text-muted mb-0">
                            {{ number_format($patient->age, 0) ?? '—' }} anos • {{ $patient->objective ?? 'Emagrecimento' }}
                            • Altura: {{ $patient->height ? $patient->height / 100 . 'm' : '—' }}
                        </p>
                    </div>

                    <a href="{{ route('weightentry.create', ['patient' => $patient->id]) }}"
                        class="btn btn-success rounded-pill px-4 py-2">
                        <i class="fas fa-plus me-2"></i> Cadastrar novo peso
                    </a>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (isset($entryWeight))
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-4">
                    <h5 class="fw-bold text-success mb-0">
                        <i class="fas fa-chart-line me-2"></i> Evolução de Peso
                    </h5>
                </div>
                <div class="card-footer bg-white border-0 py-3">
                    <div class="row g-3 justify-content-center justify-content-md-start">
                        <div class="col-auto">
                            <small class="text-muted">Peso Inicial</small><br>
                            <strong>{{ number_format($firstRecord->weight, 1) }} kg</strong>
                        </div>
                        <div class="col-auto">
                            <small class="text-muted">Peso Atual</small><br>
                            <strong class="text-success">{{ number_format($lastRecord->weight, 1) }} kg</strong>
                        </div>
                        <div class="col-auto">
                            <small class="text-muted">Diferença Total</small><br>
                            <strong class="{{ $weightDifference >= 0 ? 'text-success' : 'text-danger' }}">
                                {{ $weightDifference >= 0 ? '+' : '' }}{{ number_format($weightDifference, 1) }} kg
                            </strong>
                        </div>
                    </div>
                </div>
                <!-- Tabela -->
                <div class="card-body p-4 pt-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Peso (kg)</th>
                                    <th>IMC</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($entryWeight as $weight)
                                    <tr>
                                        <td>{{ $weight->recorded_at->format('d/m/Y') }}</td>
                                        <td> {{ number_format($weight->weight, 1) }} kg</td>
                                        <td>{{ number_format($weight->weight / (($patient->height / 100) * ($patient->height / 100)), 2) }}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                          <form class="" style="display: inline-block" action="{{ route('weightentry.destroy', ['weightEntry' => $weight->id,"patient"=>$patient->id]) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button
                                            onclick="return confirm('Tem certeza que deseja remover este paciente?')"
                                            style="color:#cc3333;border-color:#cc3333;display:inline;"
                                            title="Excluir paciente" class="btn btn-sm me-1" >
                                            <i class="fas fa-trash"></i>
                                            </button>
                                          </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Resumo -->
                <div class="card-body p-4">
                    <div style="height: 300px;">
                        <canvas id="weightChart"></canvas>
                    </div>
                </div>
            </div>

        @else
            <div class="row text-center">
                <div class="col-md-12" >

                    <div mb-5 alert alert-danger> Nenhum peso cadastrado</div>
                    <a href="{{ route('weightentry.create', ['patient' => $patient->id]) }}"
                        class="btn  mt-3 px-4 py-2" style="background-color: #8b6bc6;color:white;">
                        <i class="fas fa-plus me-2"></i> Cadastrar novo peso
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection


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
