
@extends("layouts.admin.main")
@section("content")
<div class="container-fluid">
  <div class="row">




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

@endsection
@push("script")
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
@endpush
