@extends("layouts.admin.main")
@section("content")



  {{-- <style>
    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    }

    .form-control {
      border-radius: 12px;
      padding: 14px 16px;
    }

    .form-control:focus {
      border-color: #10b981;
      box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.15);
    }
  </style> --}}

  <div class="container">

    <!-- Header do Cliente -->
    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body">
        <div class="d-flex flex-column flex-md-row align-items-center gap-4">
          <img src="{{asset($patient->image)}}" class="rounded-circle" width="85" height="85" alt="Ana Clara">

          <div class="flex-grow-1 text-center text-md-start">
            <h4 class="fw-bold mb-1">{{$patient->name}}</h4>
            <p class="text-muted mb-0">Inserindo nova medição de peso</p>
          </div>
        </div>
      </div>
    </div>

    <div class="card border-0 shadow-sm">
      <div class="card-header bg-white border-0 py-4">
        <h5 class="fw-bold text-success mb-0">
          <i class="fas fa-weight-scale me-2"></i> Nova Medição de Peso
        </h5>
      </div>

      <div class="card-body p-5">
        <form id="weightForm" action="{{route("weightentry.store",["patient"=>$patient->id])}}" method="post">
           @csrf
          <div class="row g-4">

            <!-- Data -->
            <div class="col-md-6">
              <label class="form-label fw-medium">Data da Medição *</label>
              <input  name="recorded_at" type="date" class="form-control" id="weightDate" required>
            </div>

            <!-- Peso -->
            <div class="col-md-6">
              <label class="form-label fw-medium">Peso (kg) *</label>
              <div class="input-group">
                <input type="number" step="0.1" class="form-control fs-4 fw-semibold"
                       placeholder="68.5" id="weightValue" required name="weight">
                <span class="input-group-text">kg</span>
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
          <div class="d-flex justify-content-end gap-3 mt-5">
            <button type="button" class="btn btn-secondary px-5 rounded-pill" onclick="window.history.back()">
              Cancelar
            </button>
            <button type="submit" class="btn btn-success px-5 rounded-pill">
              <i class="fas fa-save me-2"></i> Salvar Medição
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@push("script")

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
