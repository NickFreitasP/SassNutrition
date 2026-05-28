 <nav class="navbar navbar-expand-lg bg-white shadow-sm rounded-4 mb-4 px-4 py-3">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="d-flex align-items-center gap-3 w-100 justify-content-between">
            <h5 class="fw-semibold mb-0 text-success">Bem-vindo de volta, Nicholas! 👋</h5>

            <div class="d-flex align-items-center gap-3">
              <input type="text" class="form-control rounded-pill ps-4" placeholder="Buscar clientes ou planos..." style="width: 320px;">

              <button class="btn btn-light rounded-circle"><i class="fas fa-bell"></i></button>
              <button class="btn btn-light rounded-circle"><i class="fas fa-envelope"></i></button>

              <div class="d-flex align-items-center gap-2">
                <img src="https://i.pravatar.cc/40" class="rounded-circle" width="40" alt="Admin">
                <div>
                  {{-- <small class="text-muted">Administrador</small> --}}
                  <p class="mb-0 fw-medium small">{{Auth::user()->name}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
