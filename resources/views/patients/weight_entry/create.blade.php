@extends('layouts.admin.main')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="" style="display:flex;flex-direction:column;align-items:start;">
                  <h1 style=""> Medição de peso</h1>
                    <div>
                    <p> <a style="text-decoration:none;" class="text-muted" href="{{ route('patients.index') }}">Pacientes</a> >
                        <a style="text-decoration:none;" href="{{route("weightentry.index",["patient"=>$patient])}}" class="text-muted">Hitórico de pesos </a> > <span style="color: #62cdc0">Medição de peso</span> </p>

                    </div>
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

                                                <h6 class="media-title"><a href="#">{{ $patient->name }}</a></h6>
                                                <div class="text-small text-muted"> Cadatradado em
                                                    {{ $patient->created_at->format('d/m/Y') }} <span>
                                                        {{-- class="text-primary">Now</span> --}}
                                                </div>

                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm col-12">
                    <div class="card-header bg-white border-0 py-4">
                        <h5 class="fw-bold  mb-0">
                            <i class="fas fa-weight-scale me-2"></i> Nova Medição de Peso
                        </h5>
                    </div>

                    <div class="card-body p-5">
                        <form id="weightForm" action="{{ route('weightentry.store', ['patient' => $patient->id]) }}"
                            method="post">
                            @csrf
                            <div class="row g-4">

                                <!-- Data -->
                                <div class="col-md-6">
                                    <label class="form-label fw-medium">Data da Medição *</label>
                                    <input name="recorded_at" type="date" class="form-control" id="weightDate" required>
                                </div>
                                 @error('recorded_at')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <!-- Peso -->
                                <div class="col-md-6">
                                    <label class="form-label fw-medium">Peso (kg) *</label>
                                    <div class="input-group">
                                        <input type="number" step="0.1" class="form-control fs-4 fw-semibold"
                                            placeholder="68.5" id="weightValue" required name="weight">
                                        <span class="input-group-text">kg</span>
                                           @error("weight")
                                              <div class="alert alert-danger">{{ $message }}</div>
                                          @enderror
                                    </div>
                                </div>

                            </div>

                            <!-- Observação -->
                            {{-- <div class="mt-4">
            <label class="form-label fw-medium">Observação / Notas</label>
            <textarea class="form-control" rows="4"
                      placeholder="Ex: Medição realizada em jejum, após treino, etc..."></textarea>
          </div> --}}

                            <!-- Botões -->
                             <!-- Botões -->
                        <div class="d-flex justify-content-end mt-5"style="display:flex;">
                            <div style="margin-left: 15px">
                                <button  type="button" class="btn btn-secondary px-5 ml-3 rounded-pill"
                                    onclick="window.history.back()">
                                    Cancelar
                                </button>
                                 <button type="submit" style="background-color:#62cdc0;color:white;" class="btn  px-5 rounded-pill">
                                    <i class="fas fa-save me-2"></i> Salvar peso
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
    @push('script')
        <script>
            // Define data atual por padrão
            document.addEventListener('DOMContentLoaded', function() {
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('weightDate').value = today;
            });

            // // Formulário
            // document.getElementById('weightForm').addEventListener('submit', function(e) {
            //   e.preventDefault();

            //   const peso = document.getElementById('weightValue').value;

            //   if (peso) {
            //     alert(`✅ Medição de ${peso} kg salva com sucesso!`);
            //     // Aqui você pode redirecionar para a página de histórico
            //     // window.location.href = "historico-peso.html";
            //   }
            // });
        </script>
    @endpush
@endsection
