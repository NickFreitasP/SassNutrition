
@extends("layouts.admin.main")
@section("content")
<div class="container-fluid">
    <div class="card">
      <!-- Cabeçalho da Tabela -->
      <div class="card-header bg-white border-0 py-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
          <h4 class="fw-bold mb-0 text-success">
            <i class="fas fa-users me-2"></i> Clientes
          </h4>

          <div class="d-flex gap-3 w-100 w-md-auto">
            <input type="text" id="searchInput" class="form-control rounded-pill ps-4" placeholder="Buscar por nome ou email...">

            <button class="btn btn-success rounded-pill px-4">
              <a href="{{Route("patients.create")}}" style="color: white;text-decoration:none;">  <i class="fas fa-plus me-2"></i> Novo Cliente  </a>
            </button>
          </div>
        </div>
      </div>

      <!-- Tabela -->
      <div class="table-responsive">
        <table class="table table-hover mb-0" id="clientsTable">
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Email</th>
              <th>Plano</th>
              <th>Objetivo</th>
              <th>Progresso</th>
              <th>Status</th>
              <th>Última Consulta</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <img src="https://i.pravatar.cc/42?u=1" class="avatar" alt="">
                  <div>
                    <strong>Ana Clara Mendes</strong><br>
                    <small class="text-muted">CPF: 000.000.000-00</small>
                  </div>
                </div>
              </td>
              <td>anaclara@email.com</td>
              <td><span class="badge bg-success">Premium</span></td>
              <td>Emagrecimento</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1">
                    <div class="progress-bar bg-success" style="width: 78%"></div>
                  </div>
                  <small class="text-muted fw-medium">78%</small>
                </div>
              </td>
              <td><span class="status-badge bg-success text-white">Ativo</span></td>
              <td>18/05/2026</td>
              <td>
                <button class="btn btn-sm btn-outline-success me-1"><i class="fas fa-eye"></i></button>
                <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
              </td>
            </tr>

            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <img src="https://i.pravatar.cc/42?u=2" class="avatar" alt="">
                  <div>
                    <strong>Lucas Ferreira Santos</strong><br>
                    <small class="text-muted">CPF: 111.222.333-44</small>
                  </div>
                </div>
              </td>
              <td>lucas.ferreira@email.com</td>
              <td><span class="badge bg-primary">Hipertrofia</span></td>
              <td>Ganho Muscular</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1">
                    <div class="progress-bar bg-primary" style="width: 92%"></div>
                  </div>
                  <small class="text-muted fw-medium">92%</small>
                </div>
              </td>
              <td><span class="status-badge bg-success text-white">Ativo</span></td>
              <td>20/05/2026</td>
              <td>
                <button class="btn btn-sm btn-outline-success me-1"><i class="fas fa-eye"></i></button>
                <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
              </td>
            </tr>

            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  <img src="https://i.pravatar.cc/42?u=3" class="avatar" alt="">
                  <div>
                    <strong>Marina Costa Silva</strong><br>
                    <small class="text-muted">CPF: 555.666.777-88</small>
                  </div>
                </div>
              </td>
              <td>marinacs@email.com</td>
              <td><span class="badge bg-info">Low Carb</span></td>
              <td>Definição</td>
              <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1">
                    <div class="progress-bar bg-info" style="width: 45%"></div>
                  </div>
                  <small class="text-muted fw-medium">45%</small>
                </div>
              </td>
              <td><span class="status-badge bg-warning text-dark">Pendente</span></td>
              <td>10/05/2026</td>
              <td>
                <button class="btn btn-sm btn-outline-success me-1"><i class="fas fa-eye"></i></button>
                <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Rodapé com Paginação -->
      <div class="card-footer bg-white border-0 py-3">
        <div class="d-flex justify-content-between align-items-center">
          <small class="text-muted">Mostrando 1-10 de 284 clientes</small>
          <nav>
            <ul class="pagination pagination-sm mb-0">
              <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

@endsection
 @push("script")
       <!-- Filtro de Busca -->
  <script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
      const filter = this.value.toLowerCase();
      const rows = document.querySelectorAll('#clientsTable tbody tr');

      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
      });
    });
  </script>


 @endpush


