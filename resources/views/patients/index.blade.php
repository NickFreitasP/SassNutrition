@extends('layouts.admin.main')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <!-- Cabeçalho da Tabela -->
            <div class="card-header bg-white border-0 pt-4  ">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">


                    <div class="d-flex  gap-3 w-100  w-md-auto" style="justify-content:space-between">
                        <h4 class="fw-bold mb-0  d-flex " style="align-items: center;color:#673FD7;">
                          Pacientes
                        </h4>
                        <div>
                            <form class="row g-3" action="{{ route('patients.index') }}" method="get">
                                @csrf

                                <div class="col-auto">
                                    <input class="form-control" name="search" placeholder="Pesquise por pacientes">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-success mb-3 text-center"
                                        style="padding: 12px 16px;border-style: none; background-image: linear-gradient(92.88deg, #455EB5 9.16%, #5643CC 43.89%, #673FD7 64.72%);"><i
                                            class="fas fa-search "></i></button>
                                </div>
                            </form>


                        </div>

                        <button class="button-36" role="button">
                            <a href="{{ Route('patients.create') }}"
                                style="color: white;text-decoration:none;font-weight: bold;"> Novo Paciente </a>
                        </button>
                    </div>
                </div>
            </div>
            @session('success')
                <div class="alert alert-success">{{ session("success") }}</div>
            @endsession

            <!-- Tabela -->
            <div class="table-responsive mt-2 rounded-0">
                <table class="table table-hover mb-0 " id="clientsTable">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            {{-- <th>Plano</th> --}}
                            <th>Objetivo</th>
                            {{-- <th>Progresso</th> --}}
                            {{-- <th>Status</th> --}}
                            {{-- <th>Última Consulta</th> --}}
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ asset($patient->image) }}" class="avatar" alt="">
                                        <div>
                                            <strong>{{ $patient->name }}</strong><br>
                                            {{-- <small class="text-muted">CPF: 000.000.000-00</small> --}}
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $patient->email }}</td>
                                {{-- <td><span class="badge bg-success">Premium</span></td> --}}
                                <td >{{ $patient->objective }}</td>
                                {{-- <td>
                <div class="d-flex align-items-center gap-2">
                  <div class="progress flex-grow-1">
                    <div class="progress-bar bg-success" style="width: 78%"></div>
                  </div>
                   <small class="text-muted fw-medium">78%</small>
                </div>
              </td> --}}
                                {{-- <td><span class="status-badge bg-success text-white">Ativo</span></td> --}}
                                {{-- <td>18/05/2026</td> --}}
                                <td >
                                    <a href="{{ route('diets.index', ['patient' => $patient->id]) }}" title="Dietas"
                                        class="btn btn-sm a-link me-1"><i class="fas fa-utensils me-3"
                                        style="color:#673FD7;border-color:#673FD7;"></i>
                                    </a>
                                    <a href="{{ route('weightentry.index', ['patient' => $patient->id]) }}"
                                        title="Histórico de pesos" class="btn btn-sm a-link s me-1"
                                        style="color:#673FD7;"><i class="fas fa-weight"></i>
                                    </a>
                                    <a href="{{ route('patients.show', ['patient' => $patient->id]) }}"
                                        title="Dados do paciente" class="btn btn-sm a-link  me-1" style="color:#673FD7;"><i
                                            class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('patients.edit', ['patient' => $patient->id]) }}"
                                        title="Editar" class="btn btn-sm a-link  me-1" style="color:#673FD7;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form class="" style="display: inline-block" action="{{ route('patients.destroy', ['patient' => $patient->id]) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button
                                       onclick="return confirm('Tem certeza que deseja remover este paciente?')"
                                       style="color:#cc3333;border-color:#cc3333;display:inline;"
                                       title="Excluir paciente" class="btn btn-sm me-1" >
                                      <i class="fas fa-trash"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach



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
@push('styles')
    <style>
        /* CSS */
        .button-36,
        .h4-top {
            background-image: linear-gradient(92.88deg, #455EB5 9.16%, #5643CC 43.89%, #673FD7 64.72%);
            border-radius: 8px;
            border-style: none;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            flex-shrink: 0;
            font-family: "Inter UI", "SF Pro Display", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            font-size: 16px;
            font-weight: 500;
            height: 3rem;
            padding: 0 1.6rem;
            text-align: center;
            text-shadow: rgba(0, 0, 0, 0.25) 0 3px 8px;
            transition: all .5s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-36:hover,
        .h4-top {
            box-shadow: rgba(80, 63, 205, 0.5) 0 1px 30px;
            transition-duration: .1s;
        }

        .a-link {
            color: #673FD7;
            border-color: #673FD7;
            "

        }
        .btn:hover{
          border-color:#455EB5;
        }
        a-link:hover {
            color: #673FD7;
            border-color: #673FD7;
            "

        }
        @media (min-width: 768px) {

            .button-36,
            .h4-top {
                padding: 0 2.6rem;
            }
        }
    </style>
@endpush
