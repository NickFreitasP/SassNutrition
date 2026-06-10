<div class="main-sidebar sidebar-style-2" style="background-color:#62cdc0;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route("dashboard.index")}}" style="color: white">NUTRIFLOW</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <hr style="background-color: rgba(255, 255, 255, 0.342);width:80%;">
            <li class="menu-header ml-3" style="color: white;font-weight:bold;">Painel Administrativo</li>
            <hr style="background-color: rgba(255, 255, 255, 0.342);width:80%;">


             {{-- <li class="menu-header">Patients</li> --}}
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-pie"></i>
                    <span>Painel Administrativo</span></a>
                <ul class="dropdown-menu card " style="margin:0px auto;width:100%; ">
                    <div class="card" style="width: 90%;margin:0px auto">
                         <div class="card-body">
                    <li><a class="nav-link" href="{{ route('dashboard.index') }}">Home</a></li>
                    {{-- <li><a class="nav-link" href="{{ route('patients.create') }}">Novo Paciente</a></li> --}}
                         </div>
                    </div>

                    {{-- <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li> --}}


                </ul>
            </li>

            {{-- <li class="menu-header">Patients</li> --}}
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                    <span>Patients</span></a>
                <ul class="dropdown-menu card " style="margin:0px auto;width:100%; ">
                    <div class="card" style="width: 90%;margin:0px auto">
                         <div class="card-body">
                    <li><a class="nav-link" href="{{ route('patients.index') }}">Todos Pacientes</a></li>
                    <li><a class="nav-link" href="{{ route('patients.create') }}">Novo Paciente</a></li>
                         </div>
                    </div>

                    {{-- <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li> --}}


                </ul>
            </li>
        </ul>



    </aside>
</div>
