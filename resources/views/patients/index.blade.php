@extends('layouts.admin.main')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pacientes</h1>
            </div>

            <div class="row">

                <div class=" col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pacientes</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr class="text-center">
                                        <th>Nome</th>
                                        <th>Data de criação</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                    @foreach ($patients as $patient )
                                    <tr style="color: rgb(46, 42, 42)" class="text-center">
                                        {{-- <td>1</td> --}}
                                        <td> <img class="rounded-circle mr-1" width="50" height="50" src="{{asset("$patient->image")}}" alt=""> {{$patient->name}}</td>
                                        <td>2017-01-09</td>
                                         <td>{{$patient->email}}</td>
                                         <td>{{$patient->phone}}</td>

                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                         <td >
                                    <a href="{{ route('diets.index', ['patient' => $patient->id]) }}" title="Dietas"
                                        class="btn btn-sm a-link me-1" style="background-color: #e9e9ed">
                                        <i class="fas fa-utensils me-3"
                                        style="color:#673FD7;border-color:#673FD7;">
                                        </i>
                                    </a>
                                    <a href="{{ route('weightentry.index', ['patient' => $patient->id]) }}"
                                        title="Histórico de pesos" class="btn btn-sm a-link s me-1"
                                        style="background-color: #e9e9ed">
                                        <i class="fas fa-weight"></i>
                                    </a>
                                     <a href="{{ route('consultations.index', ['patient' => $patient->id]) }}"
                                        title="Histórico de Consultas" class="btn btn-sm a-link s me-1"
                                       style="background-color: #e9e9ed">
                                       <i class="fas fa-notes-medical"></i>
                                    </a>

                                    <a href="{{ route('patients.show', ['patient' => $patient->id]) }}"
                                        title="Dados do paciente" class="btn btn-sm a-link  me-1" style="background-color: #e9e9ed">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('patients.edit', ['patient' => $patient->id]) }}"
                                        title="Editar" class="btn btn-sm a-link  me-1"  style="background-color: #e9e9ed">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form class="" style="display: inline-block;background-color:transparent;" action="{{ route('patients.destroy', ['patient' => $patient->id]) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button
                                       onclick="return confirm('Tem certeza que deseja remover este paciente?')"
                                       style="background-color: #e9e9ed"
                                       title="Excluir paciente" class="btn btn-sm me-1" >
                                      <i class="fas fa-trash text-danger" style="color:#cc3333;"></i>
                                    </button>
                                    </form>
                                </td>
                                    </tr>
                                @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i
                                                class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                                class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>
@endsection
