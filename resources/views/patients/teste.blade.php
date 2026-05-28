<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NutriFlow • Painel Administrativo</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

  <style>
    :root {
      --primary: #10b981;
      --primary-dark: #059669;
    }

    body {
      background: #f8fafc;
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    .sidebar {
      background: linear-gradient(180deg, #0f172a 0%, #1e2937 100%);
      color: white;
      min-height: 100vh;
    }

    .nav-link {
      color: #cbd5e1;
      transition: all 0.3s;
    }

    .nav-link:hover, .nav-link.active {
      color: white;
      background: rgba(16, 185, 129, 0.2);
      border-radius: 8px;
    }

    .card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.06);
      transition: transform 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .stat-card {
      background: white;
      border-radius: 16px;
    }

    .header-gradient {
      background: linear-gradient(135deg, #10b981, #34d399);
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">

    <!-- SIDEBAR -->
    <div class="col-lg-2 col-md-3 sidebar p-4 d-none d-md-block">
      <div class="d-flex align-items-center mb-5">
        <i class="fas fa-leaf fa-2x text-success me-3"></i>
        <h4 class="fw-bold mb-0">NutriFlow</h4>
      </div>

      <ul class="nav flex-column gap-2">
        <li><a href="#" class="nav-link active px-3 py-3"><i class="fas fa-home me-3"></i> Dashboard</a></li>
        <li><a href="#" class="nav-link px-3 py-3"><i class="fas fa-users me-3"></i> Clientes</a></li>
        <li><a href="#" class="nav-link px-3 py-3"><i class="fas fa-utensils me-3"></i> Planos Alimentares</a></li>
        <li><a href="#" class="nav-link px-3 py-3"><i class="fas fa-chart-line me-3"></i> Nutricionistas</a></li>
        <li><a href="#" class="nav-link px-3 py-3"><i class="fas fa-calendar me-3"></i> Agendamentos</a></li>
        <li><a href="#" class="nav-link px-3 py-3"><i class="fas fa-chart-bar me-3"></i> Relatórios</a></li>
        <li><a href="#" class="nav-link px-3 py-3"><i class="fas fa-cog me-3"></i> Configurações</a></li>
      </ul>
    </div>

    <!-- CONTEÚDO PRINCIPAL -->
    <div class="col-lg-10 col-md-9 p-4">

      <!-- TOP NAV -->
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
                  <small class="text-muted">Administrador</small>
                  <p class="mb-0 fw-medium small">Nicholas</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>

      <!-- TÍTULO -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <button class="btn btn-success rounded-pill px-4">
          <i class="fas fa-plus me-2"></i> Novo Plano
        </button>
      </div>

      <!-- CARDS DE ESTATÍSTICAS -->
      <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
          <div class="card stat-card p-4">
            <div class="d-flex justify-content-between">
              <div>
                <p class="text-muted mb-1">Clientes Ativos</p>
                <h3 class="fw-bold text-success">1.284</h3>
                <small class="text-success"><i class="fas fa-arrow-up"></i> +12% este mês</small>
              </div>
              <i class="fas fa-users fa-3x text-success opacity-25"></i>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card stat-card p-4">
            <div class="d-flex justify-content-between">
              <div>
                <p class="text-muted mb-1">Planos Criados</p>
                <h3 class="fw-bold">874</h3>
                <small class="text-success"><i class="fas fa-arrow-up"></i> +8% este mês</small>
              </div>
              <i class="fas fa-file-alt fa-3x text-primary opacity-25"></i>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card stat-card p-4">
            <div class="d-flex justify-content-between">
              <div>
                <p class="text-muted mb-1">Receita Mensal</p>
                <h3 class="fw-bold">R$ 48.920</h3>
                <small class="text-success"><i class="fas fa-arrow-up"></i> +21% este mês</small>
              </div>
              <i class="fas fa-dollar-sign fa-3x text-warning opacity-25"></i>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card stat-card p-4">
            <div class="d-flex justify-content-between">
              <div>
                <p class="text-muted mb-1">Média de Adesão</p>
                <h3 class="fw-bold">87%</h3>
                <small class="text-danger"><i class="fas fa-arrow-down"></i> -2%</small>
              </div>
              <i class="fas fa-heart fa-3x text-danger opacity-25"></i>
            </div>
          </div>
        </div>
      </div>

      <!-- GRÁFICOS -->
      <div class="row g-4">
        <div class="col-xl-8">
          <div class="card p-4">
            <h5 class="card-title mb-4">Crescimento de Clientes (Últimos 6 meses)</h5>
            <canvas id="growthChart" height="100"></canvas>
          </div>
        </div>

        <div class="col-xl-4">
          <div class="card p-4 h-100">
            <h5 class="card-title mb-4">Distribuição por Objetivo</h5>
            <canvas id="pieChart" height="280"></canvas>
          </div>
        </div>
      </div>

      <!-- TABELA DE CLIENTES RECENTES -->
      <div class="card mt-4">
        <div class="card-header bg-white border-0 py-3">
          <h5 class="mb-0">Clientes Recentes</h5>
        </div>
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Plano</th>
                <th>Objetivo</th>
                <th>Progresso</th>
                <th>Última Consulta</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Ana Clara Mendes</strong></td>
                <td>Emagrecimento Premium</td>
                <td>Perda de Gordura</td>
                <td><div class="progress" style="height: 8px;"><div class="progress-bar bg-success" style="width: 78%"></div></div></td>
                <td>15/05/2026</td>
                <td><button class="btn btn-sm btn-outline-success">Ver</button></td>
              </tr>
              <tr>
                <td><strong>Lucas Ferreira</strong></td>
                <td>Hipertrofia</td>
                <td>Ganho Muscular</td>
                <td><div class="progress" style="height: 8px;"><div class="progress-bar bg-primary" style="width: 92%"></div></div></td>
                <td>18/05/2026</td>
                <td><button class="btn btn-sm btn-outline-success">Ver</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Gráfico de Crescimento
const growthCtx = document.getElementById('growthChart');
new Chart(growthCtx, {
  type: 'line',
  data: {
    labels: ['Nov', 'Dez', 'Jan', 'Fev', 'Mar', 'Abr', 'Mai'],
    datasets: [{
      label: 'Clientes',
      data: [620, 780, 920, 1050, 1180, 1240, 1284],
      borderColor: '#10b981',
      tension: 0.4,
      fill: true,
      backgroundColor: 'rgba(16, 185, 129, 0.1)'
    }]
  },
  options: {
    responsive: true,
    plugins: { legend: { display: false } }
  }
});

// Gráfico de Pizza
const pieCtx = document.getElementById('pieChart');
new Chart(pieCtx, {
  type: 'doughnut',
  data: {
    labels: ['Emagrecimento', 'Hipertrofia', 'Manutenção', 'Vegetariano', 'Low Carb'],
    datasets: [{
      data: [35, 28, 18, 12, 7],
      backgroundColor: ['#10b981', '#34d399', '#6ee7b7', '#a7f3d0', '#d1fae5']
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { position: 'bottom' }
    }
  }
});
</script>

</body>
</html>
