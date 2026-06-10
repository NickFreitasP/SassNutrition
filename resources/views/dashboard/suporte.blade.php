<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultas - NutriFlow</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <style>
    body {
      background: #f8fafc;
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    }

    .table th {
      background: #f1f5f9;
      font-weight: 500;
      color: #475569;
    }

    .status-badge {
      padding: 8px 16px;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    .consult-card {
      transition: all 0.3s ease;
    }

    .consult-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 35px rgba(16, 185, 129, 0.15);
    }
  </style>
</head>
<body class="p-4">

  <div class="container">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
      <h4 class="fw-bold text-success mb-0">
        <i class="fas fa-calendar-check me-2"></i> Consultas
      </h4>
      <button class="btn btn-success rounded-pill px-4 py-2 mt-3 mt-md-0">
        <i class="fas fa-plus me-2"></i> Nova Consulta
      </button>
    </div>

    <div class="card">
      <div class="card-body p-4">

        <!-- Filtros -->
        <div class="row g-3 mb-4">
          <div class="col-md-5">
            <input type="text" class="form-control rounded-pill" placeholder="Buscar por paciente...">
          </div>
          <div class="col-md-3">
            <select class="form-select rounded-pill">
              <option value="">Todos os Status</option>
              <option value="agendada">Agendada</option>
              <option value="realizada">Realizada</option>
              <option value="cancelada">Cancelada</option>
            </select>
          </div>
          <div class="col-md-4">
            <input type="date" class="form-control rounded-pill">
          </div>
        </div>

        <!-- Tabela de Consultas -->
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead>
              <tr>
                <th>Data / Hora</th>
                <th>Paciente</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Nutricionista</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <strong>10/06/2026</strong><br>
                  <small class="text-muted">14:30</small>
                </td>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    <img src="https://i.pravatar.cc/40?u=1" class="rounded-circle" width="40" alt="">
                    <div>
                      <strong>Ana Clara Mendes</strong>
                    </div>
                  </div>
                </td>
                <td><span class="badge bg-success">Retorno</span></td>
                <td>
                  <span class="status-badge bg-success text-white">Confirmada</span>
                </td>
                <td>Dr. Lucas Mendes</td>
                <td>
                  <button class="btn btn-sm btn-outline-success me-1"><i class="fas fa-eye"></i></button>
                  <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                </td>
              </tr>

              <tr>
                <td>
                  <strong>12/06/2026</strong><br>
                  <small class="text-muted">09:00</small>
                </td>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    <img src="https://i.pravatar.cc/40?u=2" class="rounded-circle" width="40" alt="">
                    <div>
                      <strong>Lucas Ferreira</strong>
                    </div>
                  </div>
                </td>
                <td><span class="badge bg-primary">Avaliação Inicial</span></td>
                <td>
                  <span class="status-badge bg-warning text-dark">Pendente</span>
                </td>
                <td>Dr. Lucas Mendes</td>
                <td>
                  <button class="btn btn-sm btn-outline-success me-1"><i class="fas fa-eye"></i></button>
                  <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                </td>
              </tr>

              <tr>
                <td>
                  <strong>08/06/2026</strong><br>
                  <small class="text-muted">16:00</small>
                </td>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    <img src="https://i.pravatar.cc/40?u=3" class="rounded-circle" width="40" alt="">
                    <div>
                      <strong>Marina Costa</strong>
                    </div>
                  </div>
                </td>
                <td><span class="badge bg-info">Acompanhamento</span></td>
                <td>
                  <span class="status-badge bg-secondary text-white">Realizada</span>
                </td>
                <td>Dr. Lucas Mendes</td>
                <td>
                  <button class="btn btn-sm btn-outline-success me-1"><i class="fas fa-eye"></i></button>
                  <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Paginação -->
      <div class="card-footer bg-white border-0 py-3">
        <nav>
          <ul class="pagination justify-content-center mb-0">
            <li class="page-item"><a class="page-link rounded-pill" href="#">Anterior</a></li>
            <li class="page-item active"><a class="page-link rounded-pill" href="#">1</a></li>
            <li class="page-item"><a class="page-link rounded-pill" href="#">2</a></li>
            <li class="page-item"><a class="page-link rounded-pill" href="#">3</a></li>
            <li class="page-item"><a class="page-link rounded-pill" href="#">Próximo</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
