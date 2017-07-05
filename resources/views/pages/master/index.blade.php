@extends('layouts.template')
@section('page_content')
    <!-- top tiles -->
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Próximo Paciente</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if($Page->Data['ProximaConsulta'] != NULL)
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>Telefone/Celular</th>
                                <th>Data/Hora</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                {{$Page->Data['ProximaConsulta']->getNome()}}
                                <td>
                                    {{$Page->Data['ProximaConsulta']->getTelefone()}}
                                </td>
                                <td>
                                    {{$Page->Data['ProximaConsulta']->data_consulta_inicio()}}
                                </td>
                                <td>
                                    @if($Page->Data['ProximaConsulta']->idpaciente == NULL)
                                        <i>Não cadastrado</i>
                                    @else
                                        <a href="{{route('pacientes.show',$Page->Data['ProximaConsulta']->idpaciente)}}"
                                           class="btn btn-default btn-xs"><i class="fa fa-eye"></i> Ver prontuário </a>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    @else
                        <div class="jumbotron">
                            <h1>Ops!</h1>
                            <h3>Nenhuma consulta marcada para hoje.</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Agenda do dia</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if($Page->Data['ConsultasDoDia']->count() > 0)
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>Celular/Telefone</th>
                                <th>Data/Hora</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($Page->Data['ConsultasDoDia'] as $consulta)
                                    <tr>
                                        <td>
                                            {{$consulta->getNome()}}
                                        <td>
                                            {{$consulta->getTelefone()}}
                                        </td>
                                        <td>
                                            {{$consulta->data_consulta_inicio()}}
                                        </td>
                                        <td>
                                            @if($consulta->idpaciente == NULL)
                                                <i>Não cadastrado</i>
                                            @else
                                                <a href="{{route('pacientes.show',$consulta->idpaciente)}}"
                                                   class="btn btn-default btn-xs"><i class="fa fa-eye"></i> Ver prontuário </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="jumbotron">
                            <h1>Ops!</h1>
                            <h3>Nenhuma consulta marcada para hoje.</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Retornos</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if($Page->Data['Retornos'] != NULL)
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>Telefone/Celular</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Page->Data['Retornos'] as $retorno)
                                <tr>
                                    <td>
                                    {{$retorno->getNome()}}
                                    <td>
                                        {{$retorno->getTelefone()}}
                                    </td>
                                    <td>
                                        {{$retorno->data_retorno}}
                                    </td>
                                    <td>
                                        <a href="{{route('pacientes.show',$retorno->idpaciente)}}"
                                           class="btn btn-default btn-xs"><i class="fa fa-eye"></i> Ver prontuário </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="jumbotron">
                            <h1>Ops!</h1>
                            <h3>Nenhuma retorno marcado.</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Débitos vencidos pendentes</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if($Page->Data['ParcelaVencidas']->count() > 0)
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>Valor</th>
                                <th>Pago</th>
                                <th>Pendente</th>
                                <th>Vencimento</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Page->Data['ParcelaVencidas'] as $parcela)
                                <tr>
                                    <td>
                                        <a href="{{route('pacientes.show',$parcela->paciente->idpaciente)}}">{{$parcela->paciente->nome}}</a>
                                    </td>
                                    <td>
                                        {{$parcela->getValorTotalReal()}}
                                    </td>
                                    <td>
                                        {{$parcela->getValorPagoReal()}}
                                    </td>
                                    <td>
                                        {{$parcela->getValorPendenteReal()}}
                                    </td>
                                    <td>
                                        {{$parcela->data_vencimento}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="jumbotron">
                            <h1>Ops!</h1>
                            <h3>Nenhuma consulta marcada para hoje.</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection