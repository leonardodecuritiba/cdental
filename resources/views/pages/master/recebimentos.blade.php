@extends('layouts.template')
@section('style_content')
    <!-- Datatables -->
    @include('helpers.datatables.head')
    <!-- /Datatables -->
@endsection
@section('page_content')
    @if(count($Buscas) > 0)
        <div class="row">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Relatório</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-6 col-sm-6 col-xs-12 product_price">
                        <h1 class="price text-center" style="color:#d9534f;">{{$Resumo['total_pendente']}}</h1>
                        <p class="price-tax text-center">À receber</p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 product_price">
                        <h1 class="price text-center" style="color:#1A82C3;">{{$Resumo['total_recebido']}}</h1>
                        <p class="price-tax text-center">Total pago</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$Page->Targets}}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 animated fadeInDown">
                            <table class="table table-striped dt-responsive table-bordered nowrap" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Data</th>
                                    <th>Paciente</th>
                                    <th>Tratamento</th>
                                    <th>Valor</th>
                                    <th>Responsável</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($Buscas as $recebimento)
                                    <tr>
                                        <td>{{$recebimento->id}}</td>
                                        <td data-order="{{$recebimento->data_pagamento}}">{{$recebimento->getDataPagamento()}}</td>
                                        <td>
                                            <a target="_blank"
                                               href="{{route('pacientes.show',$recebimento->paciente()->idpaciente)}}">{{$recebimento->paciente()->nome}}</a>
                                        </td>
                                        <td>{{$recebimento->orcamento()->descricao}}</td>
                                        <td data-order="{{$recebimento->valor}}">{{$recebimento->getValorReal()}}</td>
                                        <td>{{$recebimento->profissional()->nome}}</td>
                                        <td>
                                            <a target="_blank"
                                               href="{{route('pagamento.imprimir',$recebimento->idparcela)}}"
                                               class="btn btn-info btn-xs"><i class="fa fa-print"></i> Recibo</a>
                                            <a href="{{route('parcelas.estornar',$recebimento->idparcela)}}"
                                               class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Estornar</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @include('layouts.search.no-results')
    @endif
@endsection
@section('scripts_content')
    <!-- Datatables -->
    @include('helpers.datatables.foot')
    <script>
        $(document).ready(function () {
            $('.dt-responsive').DataTable(
                {
                    "language": language_pt_br,
                    "pageLength": 20,
                    "bLengthChange": false, //used to hide the property
                    "bFilter": false,
                    "order": [1, "desc"]
                }
            );
        });
    </script>
    <!-- /Datatables -->
@endsection