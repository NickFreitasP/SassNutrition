@extends("layouts.admin.main")

@section("content")
  <div class="container">

    <!-- Header do Cliente -->
    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body">
        <div class="d-flex flex-column flex-md-row align-items-center gap-4">
          <img src="{{asset($patient->image)}}" class="rounded-circle" width="85" height="85" alt="Ana Clara">

          <div class="flex-grow-1 text-center text-md-start">
            <h4 class="fw-bold mb-1">{{$patient->name}}</h4>
            <p class="text-muted mb-0">Cadastrando nova dieta </p>
          </div>
        </div>
      </div>
    </div>

    <div class="card border-0 shadow-sm">
      <div class="card-header bg-white border-0 py-4">
        <h5 class="fw-bold text-success mb-0">
          <i class="fas fa-file-pdf me-2"></i> Nova Dieta via PDF
        </h5>
      </div>

      <div class="card-body p-5">
        <form id="dietForm" method="post" action="{{route("diets.store",["patient" =>$patient->id])}}" enctype="multipart/form-data" >
         @csrf
          <!-- Título da Dieta -->
          <div class="mb-4">
            <label class="form-label fw-medium">Título da Dieta *</label>
            <input type="text" class="form-control form-control-lg"
                   placeholder="Ex: Dieta de Emagrecimento - Fase 3" required name="title">
          </div>
          @error("title")
             <span class="alert alert-danger">
                {{$message}}
            </span>

          @enderror
          <!-- Upload PDF -->
          <div class="mb-5">
            <label class="form-label fw-medium">Arquivo PDF da Dieta *</label>

            <div class="upload-area p-5 text-center" id="uploadArea">
              <i class="fas fa-cloud-upload-alt fa-4x text-success mb-3"></i>
              <h6 class="mb-2">Arraste o arquivo PDF aqui</h6>
              <p class="text-muted mb-3">ou clique para selecionar</p>
              <small class="text-muted">Apenas arquivos .pdf • Máximo 10MB</small>
              <input type="file" name="file" id="pdfInput" accept="application/pdf" hidden>
            </div>
              @error("file")
             <span class="alert alert-danger">

                {{$message}}
            </span>

          @enderror
            <!-- Preview do arquivo selecionado -->
            <div id="filePreview" class="mt-3 d-none">
              <div class="d-flex align-items-center gap-3 p-3 bg-white border rounded-3">
                <i class="fas fa-file-pdf fa-2x text-danger"></i>
                <div class="flex-grow-1 text-start" id="fileName"></div>
                <button type="button" class="btn btn-sm btn-outline-danger" id="removeFile">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Botões -->
          <div class="d-flex justify-content-end gap-3">
            <button type="button" class="btn btn-secondary px-5 rounded-pill" onclick="window.history.back()">
              Cancelar
            </button>
            <button type="submit"  class="btn btn-success px-5 rounded-pill">
              <i class="fas fa-save me-2"></i> Salvar Dieta
            </button>
         </div>
        </form>
      </div>
    </div>
  </div>

@endsection

  @push("script")
  <script>
    const uploadArea = document.getElementById('uploadArea');
    const pdfInput = document.getElementById('pdfInput');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const removeFile = document.getElementById('removeFile');

    // Clique para upload
    uploadArea.addEventListener('click', () => pdfInput.click());

    // Drag and Drop
    uploadArea.addEventListener('dragover', (e) => {
      e.preventDefault();
      uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', () => {
      uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', (e) => {
      e.preventDefault();
      uploadArea.classList.remove('dragover');
      handleFile(e.dataTransfer.files[0]);
    });

    pdfInput.addEventListener('change', (e) => {
      if (e.target.files.length > 0) {
        handleFile(e.target.files[0]);
      }
    });

    function handleFile(file) {
      if (file && file.type === "application/pdf") {
        fileName.textContent = file.name;
        filePreview.classList.remove('d-none');
        uploadArea.classList.add('d-none');
      } else {
        alert("Por favor, selecione um arquivo PDF válido.");
      }
    }

    // Remover arquivo
    removeFile.addEventListener('click', () => {
      filePreview.classList.add('d-none');
      uploadArea.classList.remove('d-none');
      pdfInput.value = '';
    });

    // Submit
    // document.getElementById('dietForm').addEventListener('submit', function(e) {
    //   e.preventDefault();
    //   alert('✅ Dieta cadastrada com sucesso!');
    //   // Aqui você pode fazer o redirecionamento ou resetar o formulário
    // });
  </script>

  @endpush
