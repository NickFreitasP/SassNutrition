@extends('layouts.admin.main')

@section('content')
   <div class="main-content">
        <section class="section">
                <div class="section-header" style="display:flex;flex-direction:column;align-items:start;">
                <h1 style=""> Histórico de pesos</h1>
                <div>
                  <p> <a style="text-decoration:none;" class="text-muted" href="{{ route('patients.index') }}">Pacientes</a> >
                    <a style="text-decoration:none;color:#62cdc0;" class="">Hitórico de pesos </a> </p>

                </div>
            </div>



            <div class="row">

                <div class=" col-md-12">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                            <div class="card" style="padding-top: 20px">
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <img class="mr-3 rounded-circle" width="90" height="90"
                                                src="{{ asset($patient->image) }}" alt="avatar">
                                            <div class="media-body">
                                                <div class=" mb-1 float-right"> <a
                                                        href="{{ route('weightentry.create', ['patient' => $patient->id]) }}"
                                                        class="btn  rounded-pill px-4 py-2" style="color:white;background-color:#62cdc0;font-weight:bold;">
                                                        <i class="fas fa-plus me-2" style="color:white;"></i> Novo registro de peso</a> </div>
                                                <h6 class="media-title"><a href="#">{{ $patient->name }}</a></h6>
                                                <div class="text-small text-muted"> Cadatradado em
                                                    {{ $patient->created_at->format('d/m/Y') }} <span>
                                                        {{-- class="text-primary">Now</span> --}}
                                                </div>
                                                 <div class="mt-4"><strong>Último registro:</strong>
                                                   {{ isset($lastRecord->recorded_at) ? $lastRecord->recorded_at->format('d/m/Y') : 'Nenhuma registro de peso cadastrado' }}
                                                 </div>
                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
               @if (session('success'))
                     <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> --}}
                    </div>
                @endif
                @if (isset($entryWeight))
                    <div class="card border-0 shadow-sm col-md-12">
                        <div class="card-header bg-white border-0 py-4">
                            <h5 class="fw-bold  mb-0">
                                 Evolução de Peso
                            </h5>
                        </div>
                        <div class="card-footer bg-white border-0 py-3">
                            <div class="row g-3 justify-content-center justify-content-md-start">
                                <div class="col-auto">
                                    <small class="text-muted">Peso Inicial</small><br>
                                    <strong >{{ number_format($firstRecord->weight, 1) }} kg</strong>
                                </div>
                                <div class="col-auto">
                                    <small class="text-muted">Peso Atual</small><br>
                                    <strong class="" style="color: #10b981">{{ number_format($lastRecord->weight, 1) }} kg</strong>
                                </div>
                                <div class="col-auto">
                                    <small class="text-muted">Diferença Total</small><br>
                                    <strong class="{{ $weightDifference >= 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $weightDifference >= 0 ? '+' : '' }}{{ number_format($weightDifference, 1) }}
                                        kg
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
                                                    <a href="#" class="btn btn-sm" style="background-color: #e9e9ed">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form class="" style="display: inline-block"
                                                        action="{{ route('weightentry.destroy', ['weightEntry' => $weight->id, 'patient' => $patient->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="return confirm('Tem certeza que deseja remover este paciente?')"
                                                            style="color:#cc3333;display:inline;"
                                                            title="Excluir paciente" class="btn btn-sm me-1">
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
                        <div class="col-md-12">

                            <div mb-5 alert alert-danger> Nenhum peso cadastrado</div>
                            <a href="{{ route('weightentry.create', ['patient' => $patient->id]) }}"
                                class="btn  mt-3 px-4 py-2" style="background-color: #8b6bc6;color:white;">
                                <i class="fas fa-plus me-2"></i> Cadastrar novo peso
                            </a>
                        </div>
                    </div>
                @endif
            </div>

        </section>
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
