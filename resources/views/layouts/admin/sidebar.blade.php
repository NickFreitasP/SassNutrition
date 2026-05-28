 <div class="col-lg-2 col-md-3 sidebar p-4 d-none d-md-block">
      <div class="d-flex align-items-center mb-5">
        <i class="fas fa-leaf fa-2x text-success me-3"></i>
        <h4 class="fw-bold mb-0">NutriFlow</h4>
      </div>

      <ul class="nav flex-column gap-2">



        <li><a href="{{Route("dashboard.index")}}"  class="nav-link px-3 py-3 {{ Route::is("dashboard.index") ? "active": "" }}"></i> Dashboard</a></li>
        <li><a href="{{Route("patients.index")}}" class="nav-link px-3 py-3 {{ Route::is("patients.index") ? "active": "" }}"><i class="fas fa-users me-3"></i> Clientes</a></li>
        <li><a  href="{{Route("patients.create")}}" class="nav-link px-3 py-3 {{ Route::is("patients.create") ? "active": "" }}"><i class="fas fa-users me-3"></i> Novo Cliente</a></li>
        <li><a href="#" class="nav-link px-3 py-3"><i class="fas fa-utensils me-3"></i> Planos Alimentares</a></li>
        <li><a href="#" class="nav-link px-3 py-3"><i class="fas fa-chart-line me-3"></i> Nutricionistas</a></li>
        <li><a href="#" class="nav-link px-3 py-3"><i class="fas fa-calendar me-3"></i> Agendamentos</a></li>
        <li><a href="#" class="nav-link px-3 py-3"><i class="fas fa-chart-bar me-3"></i> Relatórios</a></li>
        <li><a href="#" class="nav-link px-3 py-3"><i class="fas fa-cog me-3"></i> Configurações</a></li>
      </ul>
    </div>
