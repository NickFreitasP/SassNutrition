@extends("layouts.admin.main")
@section("content")
  <div class="container">
    <div class="card">
      <div class="card-header bg-white border-0 py-4">
        <div class="d-flex align-items-center gap-3">
          <i class="fas fa-user-plus fa-2x text-success"></i>
          <div>
            <h4 class="fw-bold mb-0">Novo Cliente</h4>
            <small class="text-muted">Preencha os dados para cadastrar um novo cliente</small>
          </div>
        </div>
      </div>

      <div class="card-body p-5">
        <form id="newClientForm" action="{{route("patients.store")}}" method="post" enctype="multipart/form-data">
          @csrf
          <!-- Foto -->
          <div class="text-center mb-5">
            <div class="avatar-upload mx-auto" id="avatarPreview">
              <i class="fas fa-camera fa-3x text-muted"></i>
            </div>
            <input type="file" id="photoInput" name="image" accept="image/*" hidden>
            <button type="button" class="btn btn-sm btn-outline-success mt-3" onclick="document.getElementById('photoInput').click()">
              <i class="fas fa-upload"></i> Escolher Foto
            </button>
          </div>

          <div class="row g-4">

            <!-- Dados Pessoais -->
            <div class="col-lg-6">
              <h5 class="section-title">Dados Pessoais</h5>

              <div class="mb-3">
                <label class="form-label">Nome Completo *</label>
                <input type="text" class="form-control" placeholder="Ex: Ana Clara Mendes" required name="name" value="{{old("name")}}">
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Email *</label>
                  <input type="email" class="form-control" placeholder="cliente@email.com" required name="email" value="{{old("email")}}">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Telefone *</label>
                  <input type="tel" class="form-control" placeholder="(51) 99999-9999" required name="phone" value="{{old("phone")}}">
                </div>
              </div>

              <div class="row">
                {{-- <div class="col-md-6 mb-3">
                  <label class="form-label">CPF</label>
                  <input type="text" class="form-control" placeholder="000.000.000-00" name="name" value="{{old("name")}}">
                </div> --}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">Data de Nascimento</label>
                  <input type="date" class="form-control" name="birth_date" value="{{old("birth_date")}}">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Gênero</label>
                  <select class="form-select" name="gender">
                    <option value="">Selecione</option>
                    <option value="F" >Feminino</option>
                    <option  value="M">Masculino</option>
                    <option value="O">Outro</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Profissão</label>
                  <input type="text" class="form-control" placeholder="Ex: Professora" name="occupation" value="{{old("occupation")}}">
                </div>
              </div>
            </div>


            <!-- Dados Nutricionais -->
            <div class="col-lg-6">
              <h5 class="section-title">Dados Nutricionais</h5>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="form-label">Peso (kg)</label>
                  <input type="number" step="0.1" class="form-control" placeholder="78.5" name="weight" value="{{old("weight")}}">
                </div>
                <div class="col-md-4 mb-3">
                  <label class="form-label">Altura (cm)</label>
                  <input type="number" class="form-control" placeholder="168" name="height" value="{{old("height")}}">
                </div>
                <div class="col-md-4 mb-3">
                  <label class="form-label">Idade</label>
                  <input type="number" class="form-control" placeholder="32" name="age" value="{{old("age")}}">
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Objetivo Principal</label>
                <select class="form-select" name="objective">
                  <option value="1">Emagrecimento</option>
                  <option value="2">Hipertrofia / Ganho Muscular</option>
                  <option value="3">Definição</option>
                  <option value="4">Manutenção</option>
                  <option value="5">Gestante</option>
                  <option value="6">Vegetariano / Vegano</option>
                  <option value="7">Recomposta Corporal</option>
                </select>
              </div>


              <div class="mb-3">
                <label class="form-label">Restrições Alimentares / Alergias</label>
                <textarea class="form-control" rows="3" placeholder="Ex: Intolerância à lactose, alergia a frutos do mar..." name="dietaryRestrictions"> {{old("dietaryRestrictions")}}</textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">Preferências Alimentares</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="veg" value="Vegetariano" name="foodPreferences" >
                  <label class="form-check-label" for="veg">Vegetariano</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox"  value="Low Carb" name="foodPreferences">
                  <label class="form-check-label">Low Carb</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" value="Sem Glúten" name="foodPreferences">
                  <label class="form-check-label">Sem Glúten</label>
                </div>
              </div>
            </div>
          </div>

          <!-- Observações -->
          <div class="mt-4">
            <label class="form-label">Observações / Histórico</label>
            <textarea class="form-control" rows="4" placeholder="Informações adicionais relevantes..." name="observations">{{old("observations")}}</textarea>
          </div>

          <!-- Botões -->
          <div class="d-flex justify-content-end gap-3 mt-5">
            <button type="button" class="btn btn-secondary px-5 rounded-pill">Cancelar</button>
            <button type="submit" class="btn btn-success px-5 rounded-pill">
              <i class="fas fa-save me-2"></i> Cadastrar Cliente
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
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
