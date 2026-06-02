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

    /* .card:hover {
      transform: translateY(-5px);
    } */

    .stat-card {
      background: white;
      border-radius: 16px;
    }

    .header-gradient {
      background: linear-gradient(135deg, #10b981, #34d399);
    }


    .table {
      /* border-radius: 12px; */
      overflow: hidden;
    }

    .table thead {
      background: linear-gradient(135deg, #10b981, #34d399);
      color: white;
    }

    .table th {
      font-weight: 500;
      padding: 16px 12px;
      font-size: 0.95rem;
    }

    .table td {
      padding: 16px 12px;
      vertical-align: middle;
    }

    .avatar {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      object-fit: cover;
    }

    .status-badge {
      padding: 6px 14px;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    .progress {
      height: 7px;
      border-radius: 10px;
    }

    tr:hover {
      background-color: #f8fafc;
      transform: scale(1.01);
      transition: all 0.2s;
    }

    .form-control, .form-select {
      /* border-radius: 12px; */
      padding: 12px 16px;
      border: 1px solid #e2e8f0;
    }

    .form-control:focus, .form-select:focus {
      border-color: #10b981;
      box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
    }

    .section-title {
      font-size: 1.1rem;
      color: #10b981;
      font-weight: 600;
      margin-bottom: 1.5rem;
      border-bottom: 2px solid #10b981;
      padding-bottom: 8px;
    }

    .avatar-upload {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      border: 4px solid #10b981;
      background: #f1f5f9;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s;
    }

    .avatar-upload:hover {
      background: #ecfdf5;
      transform: scale(1.05);
    }

     :root {
      --primary: #10b981;
      --primary-dark: #059669;
    }


     .diet-card {
      transition: all 0.3s ease;
      border-radius: 16px;
    }

    .diet-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 10px 25px rgba(16, 185, 129, 0.15);
    }

    .status-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      display: inline-block;
    }
       .upload-area {
      border: 3px dashed #10b981;
      border-radius: 16px;
      background: #f8fdf9;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .upload-area:hover {
      background: #ecfdf5;
      border-color: #059669;
    }

    .upload-area.dragover {
      background: #d1fae5;
      border-color: #10b981;
      transform: scale(1.02);
    }
   .weight-card {
      transition: all 0.3s ease;
    }

    .trend-up { color: #ef4444; }
    .trend-down { color: #10b981; }

    .table th {
      background: #f8fafc;
      font-weight: 500;
    }


  </style>
  @stack("styles")
</head>
<body>

<div class="container-fluid">
  <div class="row">

    <!-- SIDEBAR -->
     @include("layouts.admin.sidebar")



    <!-- CONTEÚDO PRINCIPAL -->
    <div class="col-lg-10 col-md-9 p-4">

      <!-- TOP NAV -->
        @include("layouts.admin.navbar")






        @yield("content")

      <!-- TÍTULO -->
      {{-- <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <button class="btn btn-success rounded-pill px-4">
          <i class="fas fa-plus me-2"></i> Novo Plano
        </button>
      </div> --}}

      <!-- CARDS DE ESTATÍSTICAS -->
      {{-- <div class="row g-4 mb-5">
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
      </div> --}}

      <!-- GRÁFICOS -->
      {{-- <div class="row g-4">
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
      </div> --}}

      <!-- TABELA DE CLIENTES RECENTES -->
      {{-- <div class="card mt-4">
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
      </div> --}}


    </div>
  </div>
</div>

  @stack('script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- <script>
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
</script> --}}

</body>
</html>
