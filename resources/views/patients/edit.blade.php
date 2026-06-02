@extends("layouts.admin.main")

@section("content")
<div class="container">

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-success">
      <i class="fas fa-user-edit me-2"></i> Editar Dados do Paciente
    </h4>
    <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-outline-secondary rounded-pill">
      <i class="fas fa-arrow-left me-2"></i> Voltar ao Perfil
    </a>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-4">
      <h5 class="fw-semibold text-success mb-0">{{ $patient->name }}</h5>
    </div>

    <div class="card-body p-5">
      <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
           <!-- Foto -->
          <div class="text-center mb-5">
            @if(isset($patient->image))
            <div class="avatar-upload mx-auto" id="avatarPreview">
              <img src="{{asset($patient->image)}}" style="width:100%; height:100%; object-fit:cover; border-radius:50%;">
            </div>

            @else
            <div class="avatar-upload mx-auto" id="avatarPreview">
              <i class="fas fa-camera fa-3x text-muted"></i>
            </div>
            @endif


            <input type="file" id="photoInput" name="image" accept="image/*" hidden>
            <button type="button" class="btn btn-sm btn-outline-success mt-3" onclick="document.getElementById('photoInput').click()">
              <i class="fas fa-upload"></i> Escolher Foto
            </button>
          </div>
        <div class="row g-4">

          <!-- Dados Pessoais -->
          <div class="col-lg-6">
            <h6 class="section-title text-success mb-3">Dados Pessoais</h6>


            <div class="mb-3">
              <label class="form-label fw-medium">Nome Completo *</label>
              <input type="text" name="name" class="form-control" value="{{ old('name', $patient->name) }}" required>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label fw-medium">Email *</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $patient->email) }}" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-medium">Telefone *</label>
                <input type="tel" name="phone" class="form-control" value="{{ old('phone', $patient->phone) }}" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label fw-medium">Data de Nascimento</label>
                <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date', $patient->birth_date?->format('Y-m-d')) }}">
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-medium">Gênero</label>
                <select name="gender" class="form-select">
                  <option value="">Selecione</option>
                  <option value="F" {{ old('gender', $patient->gender) == 'F' ? 'selected' : '' }}>Feminino</option>
                  <option value="M" {{ old('gender', $patient->gender) == 'M' ? 'selected' : '' }}>Masculino</option>
                  <option value="O" {{ old('gender', $patient->gender) == 'O' ? 'selected' : '' }}>Outro</option>
                </select>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label fw-medium">Profissão</label>
              <input type="text" name="occupation" class="form-control" value="{{ old('occupartion', $patient->occupation) }}">
            </div>
          </div>

          <!-- Dados Nutricionais -->
          <div class="col-lg-6">
            <h6 class="section-title text-success mb-3">Dados Nutricionais</h6>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label fw-medium">Altura (cm)</label>
                <input type="number" name="height" class="form-control" value="{{ old('height', $patient->height) }}" placeholder="168">
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-medium">Objetivo Principal</label>
                <select name="objective" class="form-select">
                  <option value="Emagrecimento" {{ old('objective', $patient->objective) == 'Emagrecimento' ? 'selected' : '' }}>Emagrecimento</option>
                  <option value="Hipertrofia" {{ old('objective', $patient->objective) == 'Hipertrofia' ? 'selected' : '' }}>Hipertrofia / Ganho Muscular</option>
                  <option value="Definição" {{ old('objective', $patient->objective) == 'Definição' ? 'selected' : '' }}>Definição</option>
                  <option value="Manutenção" {{ old('objective', $patient->objective) == 'Manutenção' ? 'selected' : '' }}>Manutenção</option>
                  <option value="Recomposta Corporal" {{ old('objective', $patient->objective) == 'Recomposta Corporal' ? 'selected' : '' }}>Recomposta Corporal</option>
                </select>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label fw-medium">Restrições Alimentares / Alergias</label>
              <textarea name="dietary_restrictions" class="form-control" rows="3">{{ old('dietary_restrictions', $patient->dietary_restrictions) }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label fw-medium">Preferências Alimentares</label>
              <textarea name="food_preferences" class="form-control" rows="2">{{ old('food_preferences', $patient->food_preferences) }}</textarea>
            </div>
          </div>

          <!-- Observações -->
          <div class="col-12">
            <label class="form-label fw-medium">Observações Gerais</label>
            <textarea name="observations" class="form-control" rows="5">{{ old('observations', $patient->observations) }}</textarea>
          </div>

        </div>

        <!-- Botões -->
        <div class="d-flex justify-content-end gap-3 mt-5">
          <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-secondary px-5 rounded-pill">
            Cancelar
          </a>
          <button type="submit" class="btn btn-success px-5 rounded-pill">
            <i class="fas fa-save me-2"></i> Salvar Alterações
          </button>
        </div>
      </form>
    </div>
  </div>

</div>
@endsection

@push('styles')
<style>
  .section-title {
    font-size: 1.1rem;
    border-bottom: 2px solid #10b981;
    padding-bottom: 8px;
  }
  .form-control, .form-select {
    border-radius: 12px;
    padding: 12px 16px;
  }
  .form-control:focus, .form-select:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
  }
</style>
@endpush
@push("script")

  <script>
    // Preview da foto
    document.getElementById('photoInput').addEventListener('change', function(e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(ev) {
          document.getElementById('avatarPreview').innerHTML = `
            <img src="${ev.target.result}" style="width:100%; height:100%; object-fit:cover; border-radius:50%;">
          `;
        }
        reader.readAsDataURL(file);
      }
    });

    // Simulação de envio
    // document.getElementById('newClientForm').addEventListener('submit', function(e) {
    //   e.preventDefault();
    //   alert('✅ Cliente cadastrado com sucesso!');
      // Aqui você pode redirecionar ou limpar o formulário
    // });
</script>
@endpush
