@extends('layouts.admin.main')
@section('content')
    <div class="main-content">
        <section class="section ">
            <div class="section-header ">
                <p> <a style="color: #410353;text-decoration:none;" href="{{ route('patients.index') }}">Pacientes</a> >
                    Editar dados > {{$patient->name}}</p>
            </div>
            <div class="card col-md-10" style="margin:0px auto;">
                <div class="card-header bg-white border-0 py-4">
                    <div class="">
                        <div style="display: flex">
                            <i class="fas fa-user fa-2x text-success mr-3" style="font-size:20px;"></i>
                            <h4 class="fw-bold mb-0" style="margin:0px;font-size:20px;">{{$patient->name}}</h4>

                        </div>

                        <div>
                            <small class="text-muted">Preencha os dados para cadastrar um novo cliente</small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body p-5">
                        <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Foto -->
                            <div class="text-center mb-5">
                                @if (isset($patient->image))
                                    <div class="avatar-upload mx-auto" id="avatarPreview">
                                        <img src="{{ asset($patient->image) }}"
                                            style="width:100%; height:100%; object-fit:cover; border-radius:50%;">
                                    </div>
                                @else
                                    <div class="avatar-upload mx-auto" id="avatarPreview">
                                        <i class="fas fa-camera fa-3x text-muted"></i>
                                    </div>
                                @endif


                                <input type="file" id="photoInput" name="image" accept="image/*" hidden>
                                <button type="button" class="btn btn-sm  mt-3 text-white" style="background-color: #62cdc0"
                                    onclick="document.getElementById('photoInput').click()">
                                    <i class="fas fa-upload"></i> Escolher Foto
                                </button>
                            </div>
                            <div class="row g-4">

                                <!-- Dados Pessoais -->
                                <div class="col-lg-6">
                                    <h5 class="section-title">Dados Pessoais</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Nome Completo *</label>
                                        <input type="text" class="form-control" placeholder="Ex: Ana Clara Mendes"
                                            required name="name" value="{{ old('name', $patient->name) }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Email *</label>
                                            <input type="email" class="form-control" placeholder="cliente@email.com"
                                                required name="email" value="{{ old('email', $patient->email) }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Telefone *</label>
                                            <input type="tel" class="form-control" placeholder="(51) 99999-9999"
                                                required name="phone" value="{{ old('phone', $patient->phone) }}">
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Data de Nascimento</label>
                                            <input type="date" class="form-control" name="birth_date"
                                                value="{{ old('birth_date', $patient->birth_date->format('Y-m-d')) }}">


                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Profissão</label>
                                            <input type="text" class="form-control" placeholder="Ex: Professora"
                                                name="occupation" value="{{ old('occupation', $patient->occupation) }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 mb-3">
                                            <label>Gênero</label>
                                            <select class="form-control"name="gender">
                                                <option value="">Selecione</option>
                                                <option value="F"
                                                    {{ old('gender', $patient->gender) == 'F' ? 'selected' : '' }}>Feminino
                                                </option>
                                                <option value="M"
                                                    {{ old('gender', $patient->gender) == 'M' ? 'selected' : '' }}>Masculino
                                                </option>
                                                <option value="O"
                                                    {{ old('gender', $patient->gender) == 'O' ? 'selected' : '' }}>Outro
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                </div>


                                <!-- Dados Nutricionais -->
                                <div class="col-lg-6">
                                    <h5 class="section-title">Dados Nutricionais</h5>

                                    <div class="row">
                                        {{-- <div class="col-md-4 mb-3">
                                            <label class="form-label">Peso (kg)</label>
                                            <input type="number" step="0.1" class="form-control" placeholder="78.5"
                                                name="weight" value="{{ old('weight', $patient->weight) }}">
                                        </div> --}}
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Altura (cm)</label>
                                            <input type="number" class="form-control" placeholder="168" name="height"
                                                value="{{ old('height', $patient->height) }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Idade</label>
                                            <input type="number" class="form-control" placeholder="32" name="age"
                                                value="{{ old('age', $patient->age) }}">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-md-6 mb-3">
                                            <label>Objetivo Principal</label>
                                            <select class="form-control"name="objective">
                                                <option value="Emagrecimento"
                                                    {{ old('objective', $patient->objective) == 'Emagrecimento' ? 'selected' : '' }}>
                                                    Emagrecimento</option>
                                                <option value="Hipertrofia"
                                                    {{ old('objective', $patient->objective) == 'Hipertrofia' ? 'selected' : '' }}>
                                                    Hipertrofia / Ganho Muscular</option>
                                                <option value="Definição"
                                                    {{ old('objective', $patient->objective) == 'Definição' ? 'selected' : '' }}>
                                                    Definição</option>
                                                <option value="Manutenção"
                                                    {{ old('objective', $patient->objective) == 'Manutenção' ? 'selected' : '' }}>
                                                    Manutenção</option>
                                                <option value="Recomposta Corporal"
                                                    {{ old('objective', $patient->objective) == 'Recomposta Corporal' ? 'selected' : '' }}>
                                                    Recomposta Corporal</option>
                                            </select>
                                        </div>

                                    </div>



                                    <div class="mb-3">
                                        <label class="form-label">Restrições Alimentares / Alergias</label>
                                        <textarea class="form-control" rows="3" placeholder="Ex: Intolerância à lactose, alergia a frutos do mar..."
                                            name="dietary_restrictions"> {{ old('dietary_restrictions', $patient->dietary_restrictions) }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Preferências Alimentares</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="veg"
                                                value="Vegetariano" name="foodPreferences">
                                            <label class="form-check-label" for="veg">Vegetariano</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="Low Carb"
                                                name="foodPreferences">
                                            <label class="form-check-label">Low Carb</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="Sem Glúten"
                                                name="foodPreferences">
                                            <label class="form-check-label">Sem Glúten</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Observações -->
                            <div class="mt-4">
                                <label class="form-label">Observações / Histórico</label>
                                <textarea class="form-control"style="height:150px !important;" rows="6"
                                    placeholder="Informações adicionais relevantes..." name="observations">{{ old('observations',$patient->observations) }}</textarea>
                            </div>

                            <!-- Botões -->
                            <div class="d-flex justify-content-end mt-3">
                                <div style="margin-left: 15px">
                                    <button type="button" class="btn btn-secondary px-5 ml-3 rounded-pill"
                                        onclick="window.history.back()">
                                        Cancelar
                                    </button>
                                    <button type="submit" style="background-color:#62cdc0;color:white;"
                                        class="btn  px-5 rounded-pill">
                                        <i class="fas fa-save me-2"></i> Salvar Cliente
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
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
