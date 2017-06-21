@extends('layouts.template')
@section('style_content')

    <!-- Datatables -->
    @include('helpers.datatables.head')
    <!-- /Datatables -->
{{--@include('admin.master.forms.search')--}}
{{--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />--}}
    <style>
        .select2 {
            width: 100%;
        }
        .preco {
            font-size: 13px;
            font-weight: 400;
            color: #26B99A;
        }
    </style>

    {!! Html::style('vendors/dropzone/dist/min/dropzone.min.css') !!}
@endsection
@section('modal_content')
    @include('layouts.modals.exclui')
    @include('pages.pacientes.modals.financeiro.forma_pagamento')
    @include('pages.pacientes.modals.financeiro.receber')
    @include('pages.pacientes.modals.financeiro.recibo')
    @include('pages.pacientes.modals.financeiro.recebimentos')
    @include('pages.pacientes.modals.financeiro.alterar')
    @include('pages.pacientes.modals.alerts.alerta')
    @include('pages.pacientes.modals.evolucao')
@endsection
@section('page_content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Prontuário - {{$Paciente->nome}}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <button class="btn btn-danger"
                                data-toggle="modal"
                                data-target="#modalAlertas"><i class="fa fa-exclamation-triangle fa-2"></i> Alertas
                        </button>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        @include('pages.pacientes.paineis.perfil')
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        @include('pages.pacientes.paineis.sobre')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{--Anamnese--}}
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Anamnese</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if($Anamneses->count()>0)
                        {!! Form::open(['method' => 'PATCH','route'=>['respostas.update',$Paciente->idpaciente], 'class' => 'form-horizontal form-label-left']) !!}
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-4 col-xs-12">Modelo:</label>
                            <div class="col-md-5 col-sm-4 col-xs-8">
                                <select id="idanamnese" name="idanamnese" class="form-control" required>
                                    <option value="0">Selecione</option>
                                    @foreach($Anamneses as $anamnese)
                                        <?php
                                        //guardando as perguntas para serem usadas no jquery
                                        foreach ($anamnese->perguntas as $pergunta) {
                                            $_PERGUNTAS_[$anamnese->idanamnese][] = $pergunta;
                                        }
                                        ?>
                                        <option value="{{$anamnese->idanamnese}}">{{$anamnese->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5 col-sm-3 col-xs-4">
                                <button type="submit" class="btn btn-round btn-success salvar-anamnese">Salvar</button>
                                <a style="display: none;" target="_blank" class="btn btn-round btn-primary imprimir">Imprimir</a>
                            </div>
                        </div>
                        <?php
                        foreach ($_PERGUNTAS_ as $i => $perguntas) {
                            echo "<div data-id='" . $i . "' class='anamnese hide'>";
                            foreach ($perguntas as $pergunta) {
//                        echo 'id:'.$pergunta->idpergunta;
//                        echo ' idpaciente:'.$Paciente->idpaciente;
//                        echo ' resp:'.$pergunta->has_resposta($Paciente->idpaciente);
                                if ($pergunta->has_resposta($Paciente->idpaciente)) {
                                    $resposta = $pergunta->resposta($Paciente->idpaciente);
//                            print_r($resposta->resposta);
                                    $vetor_resposta['resposta'] = [0 => '', 1 => '', 2 => ''];
                                    $vetor_resposta['resposta'][$resposta->resposta] = 'checked';
                                    $vetor_resposta['texto_resposta'] = $resposta->texto_resposta;
                                    $campo_idreposta = '<input type="hidden" name="resposta[' . $pergunta->idpergunta . '][idresposta]" value="' . $resposta->idresposta . '"/>';
                                } else {
                                    $vetor_resposta['resposta'] = [0 => '', 1 => '', 2 => ''];
                                    $vetor_resposta['texto_resposta'] = '';
                                    $campo_idreposta = '';
                                }

                                switch ($pergunta->tipo_resposta) {
                                    case 0: { //SIM/NÃO/NÃO SEI
                                        echo '<div class="form-group">
                                        <input type="hidden" name="resposta[' . $pergunta->idpergunta . '][tipo_resposta]" value="0"/>
                                        ' . $campo_idreposta . '
                                        <label>' . $pergunta->texto_pergunta . '</label>
                                        <p>
                                            <input type="radio" class="flat" name="resposta[' . $pergunta->idpergunta . '][resposta]" value="0" ' . $vetor_resposta['resposta'][0] . ' />Não
                                            <input type="radio" class="flat" name="resposta[' . $pergunta->idpergunta . '][resposta]" value="1" ' . $vetor_resposta['resposta'][1] . ' />Sim
                                            <input type="radio" class="flat" name="resposta[' . $pergunta->idpergunta . '][resposta]" value="2" ' . $vetor_resposta['resposta'][2] . ' />Não Sei
                                        </p>
                                    </div>';
                                        break;
                                    }
                                    case 1: { //SIM/NÃO/NÃO SEI e TEXTO
                                        echo '<div class="form-group">
                                        <input type="hidden" name="resposta[' . $pergunta->idpergunta . '][tipo_resposta]" value="1"/>
                                        ' . $campo_idreposta . '
                                        <label>' . $pergunta->texto_pergunta . '</label>
                                        <p>
                                            <input type="radio" class="flat" name="resposta[' . $pergunta->idpergunta . '][resposta]" value="0" ' . $vetor_resposta['resposta'][0] . ' />Não
                                            <input type="radio" class="flat" name="resposta[' . $pergunta->idpergunta . '][resposta]" value="1" ' . $vetor_resposta['resposta'][1] . ' />Sim
                                            <input type="radio" class="flat" name="resposta[' . $pergunta->idpergunta . '][resposta]" value="2" ' . $vetor_resposta['resposta'][2] . ' />Não Sei
                                        </p>
                                        <input type="text" name="resposta[' . $pergunta->idpergunta . '][texto_resposta]" value="' . $vetor_resposta['texto_resposta'] . '" class="form-control" placeholder="' . $pergunta->texto_pergunta . '"/>
                                    </div>';
                                        break;
                                    }
                                    case 2: {  //TEXTO
                                        echo '<div class="form-group">
                                        <input type="hidden" name="resposta[' . $pergunta->idpergunta . '][tipo_resposta]" value="2"/>
                                        ' . $campo_idreposta . '
                                        <label>' . $pergunta->texto_pergunta . '</label>
                                        <input type="text" name="resposta[' . $pergunta->idpergunta . '][texto_resposta]" value="' . $vetor_resposta['texto_resposta'] . '" class="form-control" placeholder="' . $pergunta->texto_pergunta . '"/>
                                    </div>';
                                        break;
                                    }
                                }
                                echo '<div class="ln_solid"></div>';
                            }
                            echo "</div>";
                        }
                        ?>
                        {!! Form::close() !!}
                    @else
                        <div class="jumbotron">
                            <h1>Ops!</h1>
                            <h3>Nenhuma anamnese cadastrada!</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {{--/Anamnese--}}
        {{--Evoluções--}}
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Evoluções</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalEvolucao"><i class="fa fa-plus-circle fa-2"></i> Adicionar
                                evolução
                            </button>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if($Paciente->has_evolucao())
                        @foreach($Paciente->evolucoes as $evolucao)
                            <ul class="list-unstyled timeline">
                                <li>
                                    <div class="block">
                                        <div class="tags">
                                            <a class="tag">
                                                <span>{{$evolucao->data_evolucao}}</span>
                                            </a>
                                        </div>
                                        <div class="block_content">
                                            <h2 class="title">
                                                <a>{{$evolucao->profissional_criador->nome}}</a>
                                            </h2>
                                            <p class="excerpt">{{$evolucao->texto}}</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                        <div class="clearfix"></div>
                    @else
                        <div class="bs-example" data-example-id="simple-jumbotron">
                            <div class="jumbotron">
                                <p>Este paciente não possui nenhuma evolução cadastrada.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {{--/Evoluções--}}
    </div>

    <div class="row">
        {{--Orçamentos--}}
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Orçamentos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li>
                            <button class="btn btn-primary" id="add-orcamento"><i class="fa fa-plus-circle fa-2"></i>
                                Novo orçamento
                            </button>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <section id="new-orcamento" style="display: none">
                        {!! Form::open(['route' => 'orcamentos.store', 'method' => 'POST',
                                    'class' => 'form-horizontal form-label-left', 'data-parsley-validate']) !!}
                        <input type="hidden" name="idpaciente" value="{{$Paciente->idpaciente}}">
                        <div class="x_title" style="margin-top:20px;">
                            <h2>Novo Orçamento</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" id="orcamento-container">
                            <div class="form-group">
                                <label class="control-label col-md-1 col-sm-1 col-xs-12"
                                       for="first-name">Descrição:</label>
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" name="descricao"
                                           placeholder="Descrição do orçamento..." required="required">
                                    <span class="fa fa-medkit form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <label class="control-label col-md-1 col-sm-1 col-xs-12"
                                       for="first-name">Profissional:</label>
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                    <select class="select2 form-control" tabindex="-1" style="width: 100%;"
                                            name="idprofissional">
                                        @foreach($Profissionais as $profissional)
                                            <option value="{{$profissional->idprofissional}}"
                                                    @if(isset($Paciente) && ($Paciente->idprofissional) == ($profissional->idprofissional)) selected @endif>{{$profissional->nome}}</option>
                                        @endforeach
                                    </select>
                                    <span class="fa fa-user-md form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            <section id="tratamentos">
                                <div class="form-group" data-action="new">
                                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tratamento:</label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <select id="intervencao" onchange="popula_valores(this);"
                                                class="select2 form-control" tabindex="-1" style="width: 100%;"
                                                name="idintervencao[0]">
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input id="codigo" type="text" class="form-control" disabled
                                               placeholder="Código">
                                        <span class="fa fa-info-circle form-control-feedback right"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input id="regiao" type="text" class="form-control" name="regiao[0]"
                                               placeholder="Região">
                                        <span class="fa fa-info-circle form-control-feedback right"
                                              aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input id="valor" onkeyup="atualiza_total('new')" type="text"
                                               class="form-control show-valor" name="valor[0]" placeholder="Valor">
                                        <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </section>
                            <div class="form-group">
                                <label class="control-label col-md-offset-8 col-md-1 col-sm-offset-8 col-sm-1 col-xs-12"
                                       for="first-name">Total:</label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <input id="valor_total" type="text" disabled class="form-control"
                                           placeholder="Valor">
                                    <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-9 col-md-2 col-sm-offset-9 col-sm-2 col-xs-12">
                                    <button id="add-tratamento" data-action="new" type="button" class="btn btn-primary">
                                        <i class="fa fa-plus-circle fa-2"></i> Adicionar tratamento
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="x_title" style="margin-top:20px;">
                            <h2>Forma de Pagamento</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" id="pagamento-container">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Desconto
                                    (%)</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input type="text" onkeyup="atualiza_total('new')" class="form-control"
                                           id="desconto" name="desconto">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Valor de
                                    entrada</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input type="text" onkeyup="atualiza_total('new')" class="form-control"
                                           name="valor_entrada">
                                    <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Número de
                                    Parcelas</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input type="number" onchange="atualiza_total('new')"
                                           onkeyup="atualiza_total('new')" min="1" class="form-control" value="1"
                                           name="numero_parcelas" required="required">
                                </div>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Valor das
                                    Parcelas</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input id="valor_parcela" type="text" class="form-control" disabled
                                           placeholder="Valor da parcela:">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-offset-7 col-md-2 col-sm-offset-7 col-sm-2 col-xs-12"
                                       for="first-name">Valor total com desconto:</label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <input id="valor_total_desconto" type="text" disabled class="form-control">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-offset-9 col-md-2 col-sm-offset-9 col-sm-2 col-xs-12">
                                    <button type="submit" class="btn btn-block btn-round btn-success"><i
                                                class="fa fa-save"></i> Salvar
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </section>
                    @if($Paciente->orcamentos->count() > 0)
                        <section id="edit-orcamento" style="display: none">
                            {!! Form::open(['route' => ['orcamentos.update', '_0_'], 'method' => 'PATCH',
                                        'id' => 'form-edit', 'class' => 'form-horizontal form-label-left', 'data-parsley-validate']) !!}
                            <input type="hidden" name="idpaciente" value="{{$Paciente->idpaciente}}">
                            <div class="x_title" style="margin-top:20px;">
                                <h2>Editar Orçamento</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content" id="orcamento-container">
                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1 col-xs-12"
                                           for="first-name">Descrição:</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control" name="descricao"
                                               placeholder="Descrição do orçamento..." required="required">
                                        <span class="fa fa-medkit form-control-feedback right"
                                              aria-hidden="true"></span>
                                    </div>
                                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Profissional:</label>
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                        <select class="select2 form-control" tabindex="-1" style="width: 100%;"
                                                name="idprofissional">
                                            @foreach($Profissionais as $profissional)
                                                <option value="{{$profissional->idprofissional}}"
                                                        @if(isset($Paciente) && ($Paciente->idprofissional) == ($profissional->idprofissional)) selected @endif
                                                >{{$profissional->nome}}</option>
                                            @endforeach
                                        </select>
                                        <span class="fa fa-user-md form-control-feedback right"
                                              aria-hidden="true"></span>
                                    </div>
                                </div>
                                <section id="tratamentos">
                                </section>
                                <div class="form-group">
                                    <label class="control-label col-md-offset-8 col-md-1 col-sm-offset-8 col-sm-1 col-xs-12"
                                           for="first-name">Total:</label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input id="valor_total" type="text" disabled class="form-control"
                                               placeholder="Valor">
                                        <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-9 col-md-2 col-sm-offset-9 col-sm-2 col-xs-12">
                                        <button id="add-tratamento" data-action="edit" type="button"
                                                class="btn btn-primary"><i class="fa fa-plus-circle fa-2"></i> Adicionar
                                            tratamento
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="x_title" style="margin-top:20px;">
                                <h2>Forma de Pagamento</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content" id="pagamento-container">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Desconto
                                        (%)</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" onkeyup="atualiza_total('edit')" class="form-control"
                                               id="desconto" name="desconto">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Valor de
                                        entrada</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="text" onkeyup="atualiza_total('edit')" class="form-control"
                                               name="valor_entrada">
                                        <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Número de
                                        Parcelas</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input type="number" onchange="atualiza_total('edit')"
                                               onkeyup="atualiza_total('edit')" min="1" class="form-control" value="1"
                                               name="numero_parcelas" required="required">
                                    </div>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Valor das
                                        Parcelas</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <input id="valor_parcela" type="text" class="form-control" disabled
                                               placeholder="Valor da parcela:">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-offset-7 col-md-2 col-sm-offset-7 col-sm-2 col-xs-12"
                                           for="first-name">Valor total com desconto:</label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input id="valor_total_desconto" type="text" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group pull-right">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <a class="edit-orcamento-cancel btn btn-block btn-round btn-danger"><i
                                                    class="fa fa-times"></i> Cancelar</a>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-block btn-round btn-success"><i
                                                    class="fa fa-save"></i> Salvar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </section>
                        <section id="show-orcamentos">
                            <table class="table table-striped dt-responsive table-bordered nowrap" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Dentista/Data</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Desconto</th>
                                    <th>Total</th>
                                    <th>Pagamento</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach($Paciente->orcamentos_abertos as $orcamento)--}}
                                @foreach($Paciente->orcamentos as $orcamento)
                                    <tr>
                                        <td class="td-aprovar">
                                            @if($orcamento->aprovacao == 1)
                                                <span class="btn btn-success btn-xs"> Aprovado</span>
                                            @else
                                                <span class="btn btn-danger btn-xs"> Não Aprovado</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span>{{$orcamento->profissional->nome}}</span>
                                            <br/>
                                            <small>Data: {{$orcamento->created_at}}</small>
                                        </td>
                                        <td>
                                            <span>{{$orcamento->descricao}}</span>
                                        </td>
                                        <td>
                                            <span>{{$orcamento->valor_total}}</span>
                                        </td>
                                        <td>
                                            @if($orcamento->desconto>0)
                                                <span>{{$orcamento->valor_desconto()}} ({{$orcamento->desconto}}
                                                    %)</span>
                                            @else
                                                <p class="text-center">-</p>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="preco show-valor">{{$orcamento->valor_final_total()}}</span>
                                        </td>
                                        <td>
                                            @if($orcamento->valor_entrada>0)
                                                <span>{{$orcamento->valor_entrada}}</span>
                                                <br/>
                                                <small>+
                                                    {{$orcamento->numero_parcelas}} &times; {{$orcamento->valor_parcelas()}}</small>
                                            @else
                                                <span class="show-valor">{{$orcamento->numero_parcelas}} &times; {{$orcamento->valor_parcelas()}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-default btn-xs"
                                               target="_blank"
                                               href="{{route('orcamento.imprimir',$orcamento->idorcamento)}}"><i
                                                        class="fa fa-print"></i></a>
                                            @if(!$orcamento->aprovacao)
                                                <a href="{{route('orcamento.aprovar',$orcamento->idorcamento)}}"
                                                   class="btn btn-aprovar btn-default btn-xs"><i
                                                            class="fa fa-thumbs-o-up"></i> Aprovar</a>
                                                <a class="btn btn-info btn-xs edit-orcamento"
                                                   data-dados="{{$orcamento}}"
                                                   data-valor_entrada="{{$orcamento->valor_entrada_float()}}"
                                                   data-itens="{{$orcamento->itens_orcamento}}"><i
                                                            class="fa fa-pencil"></i></a>
                                                <button class="btn btn-danger btn-xs"
                                                        data-nome="{{$orcamento->descricao}}"
                                                        data-href="{{route('orcamentos.destroy',$orcamento->idorcamento)}}"
                                                        data-toggle="modal"
                                                        data-target="#modalRemocao"><i class="fa fa-trash-o fa-sm"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </section>
                    @endif
                </div>
            </div>
        </div>
        {{--/Orçamentos--}}
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Débitos</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php $valores = $Paciente->totais_valores(); ?>
                    <div class="col-md-6 col-sm-6 col-xs-12 product_price">
                        <h1 class="price text-center" style="color:#d9534f;">{{$valores['valor_pendente']}}</h1>
                        <p class="price-tax text-center">À receber</p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 product_price">
                        <h1 class="price text-center" style="color:#1A82C3;">{{$valores['valor_pago']}}</h1>
                        <p class="price-tax text-center">Total recebido</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 animated fadeInDown">
                            @if($Paciente->has_pagamentos())
                                <table class="table table-striped dt-responsive table-bordered nowrap" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>Descrição</th>
                                        <th>Valor Total</th>
                                        <th>Pagamento</th>
                                        <th>Status</th>
                                        <th>Pago / Restante</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Paciente->orcamentos_pagamento as $orcamento)
                                        <tr>
                                            <td>
                                                <h4 class="price">{{$orcamento->descricao}}</h4>
                                                <small>Data: {{$orcamento->created_at}}</small>
                                            </td>
                                            <td>
                                                <p>{{$orcamento->valor_final_total()}}</p>
                                            </td>
                                            <td>
                                                @if($orcamento->valor_entrada>0)
                                                    <span>{{$orcamento->valor_entrada}}</span><br/>
                                                    <small>+
                                                        {{$orcamento->numero_parcelas}} &times; {{$orcamento->valor_parcelas()}}</small>
                                                @else
                                                    <span>{{$orcamento->numero_parcelas}} &times; {{$orcamento->valor_parcelas()}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <p>{{$orcamento->pagamento->getStatusText()}}</p>
                                            </td>
                                            <td class="project_progress">
                                                <?php $valores = $orcamento->pagamento->valores_total_parcelas(); ?>
                                                <h4 class="price">{{$valores->valor_pago}}</h4>
                                                <small style="color:red">{{$valores->valor_pendente}}</small>
                                            </td>
                                            <td>
                                                <?php $parcelas = $orcamento->pagamento->parcelas_json(); ?>
                                                <a class="btn btn-primary btn-xs receber"
                                                   data-toggle="modal" data-target="#modalReceber"
                                                   data-parcelas="{{$parcelas}}"><i
                                                            class="fa fa-money"></i>
                                                    Receber</a>
                                                <a class="btn btn-default btn-xs"
                                                   data-toggle="modal"
                                                   data-target="#modalRecebimentos"
                                                   data-href="{{route('json.parcelas.pagas', $orcamento->pagamento->idpagamento)}}"><i
                                                            class="fa fa-eye"></i>
                                                    Pagamentos</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Documentos--}}
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Documentos</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <button class="btn btn-success" id="refresh-documento"><i class="fa fa-refresh fa-2"></i>
                            Atualizar
                        </button>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                {!! Form::open([
                    'route' => 'documentos.pacientes.store', 'files' => true,
                    'method' => 'POST',
                    'class' => 'dropzone']) !!}
                <input type="hidden" name="idpaciente" value="{{$Paciente->idpaciente}}">
                <div class="dz-message" data-dz-message><span>Arraste seus arquivos aqui!</span></div>
                </form>
                <div class="ln_solid"></div>
                <div class="row">
                    @if($Paciente->has_documentos())
                        @foreach($Paciente->documentos as $documento)
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;"
                                             src="{{$documento->getDocumentoThumb()}}" alt="image"/>
                                        <div class="mask">
                                            <div class="tools tools-bottom">
                                                <a href="#" class="ver-documento"><i class="fa fa-eye"></i></a>
                                                <a href="#"
                                                   class="del-documento"
                                                   data-href="{{route('documentos.destroy',$documento->iddocumento)}}"
                                                ><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="jumbotron">
                            <h1>Ops!</h1>
                            <h3>Nenhum documento encontrado!</h3>
                        </div>
                    @endif
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $('button#refresh-documento').click(function () {
                        url = "{{route('pacientes.show',$Paciente->idpaciente)}}" + '?tab=documentos';
                        window.location.href = url;
                    });
                    $('a.del-documento').click(function () {
                        $parent = $(this).parents('div.col-md-55');

                        href_ = $(this).data('href');
                        $.ajax({
                            url: href_,
                            type: 'post',
                            data: {"_method": 'delete', "_token": "{{ csrf_token() }}"},
//                    dataType: "json",
                            beforeSend: function () {
                                $(".loading").show();
                            },
                            complete: function (xhr, textStatus) {
                                $(".loading").hide();
                            },
                            error: function (xhr, textStatus) {
                                console.log('xhr-error: ' + xhr);
                                console.log('textStatus-error: ' + textStatus);
                            },
                            success: function (json) {
                                if (json.status) {
                                    $($parent).remove();
                                    new PNotify({
                                        title: 'Sucesso!',
                                        text: json.response,
                                        type: 'success',
                                        delay: 2000,
                                        styling: 'bootstrap3'
                                    });
                                } else {
                                    alert(json.response);
                                }
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
    {{--/Documentos--}}
@endsection
@section('scripts_content')
    <!-- tags -->
    {!! Html::script('js/tags/jquery.tagsinput.min.js') !!}
    <!-- switchery -->
    {!! Html::script('js/switchery/switchery.min.js') !!}
    <!-- richtext editor -->
    {!! Html::script('js/editor/bootstrap-wysiwyg.js') !!}
    {!! Html::script('js/editor/external/jquery.hotkeys.js') !!}
    {!! Html::script('js/editor/external/google-code-prettify/prettify.js') !!}
    <!-- select2 -->
    <!-- form validation -->
    {!! Html::script('js/parsley/parsley.min.js') !!}
    <!-- textarea resize -->


    <!-- Select2 -->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>--}}
    {!! Html::script('vendors/select2/dist/js/select2.min.js') !!}

    <!-- Select2 -->
    <script>
        $(document).ready(function() {
            $(".select2").select2({ width: 'resolve' });
        });
    </script>
    <!-- /Select2 -->

    <!-- Datatables -->
    @include('helpers.datatables.foot')
    <script>
        $(document).ready(function () {
            $('.dt-responsive').DataTable(
                {
                    "language": language_pt_br,
                    "pageLength": 10,
                    "bLengthChange": false, //used to hide the property
                    "bFilter": false,
                    "order": [0, "desc"]
                }
            );
        });
    </script>
    <!-- /Datatables -->

    <!-- dropzone -->
    {!! Html::script('vendors/dropzone/dist/min/dropzone.min.js') !!}

    <script>
        $('#modalAlertas').on('show.bs.modal', function (event) {
            var $this = $(this);
            $modal_body = $($this).find('div.modal-body');
            $($modal_body).empty();
            $.ajax({
                url: '{{route('alertas.pacientes',$Paciente->idpaciente)}}',
                type: 'GET',
                dataType: "json",
                error: function (xhr, textStatus) {
                    console.log('xhr-error: ' + xhr.responseText);
                    console.log('textStatus-error: ' + textStatus);
                },
                success: function (json) {
                    console.log(json);
                    if(json.status==1) {
                        $($modal_body).append('<div class="alert alert-danger"><ul></ul></div>');
                        $(json.response).each(function (i, v) {
                            $($modal_body).find('ul').append($('<li></li>').html(v));
                        })
                    } else {
                        $($modal_body).html(json.response);
                    }
                }
            });
        })
    </script>

    {{--Anamnese--}}
    <script>
        $(document).ready(function () {

            $('div#tab_anamnese div.x_content form').on('submit', function (e) {
                // Prevent form submission
                e.preventDefault();

                var $form = $(e.target);
                // Use Ajax to submit form data
                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: $form.serialize(),
                    beforeSend: function () {
                        $('div.loading').show();
                    },
                    success: function (json) {
                        if (json.status == 1) {
                            new PNotify({
                                title: 'Sucesso!',
                                text: json.response,
                                type: 'success',
                                delay: 2000,
                                styling: 'bootstrap3'
                            });
                        }
                        $('div.loading').hide();
                    }
                });

            });
            $('select#idanamnese').change(function () {
                id = $(this).val();
                $a_imprimir = $(this).parents('div.form-group').find('a.imprimir');
                $a_imprimir.hide();
                if (id > 0) {
                    var url = ("{{route('anamnese.imprimir',['idpaciente' => $Paciente->idpaciente,'idanamnese' =>  '_0_'])}}").replace('_0_', id);
                    $a_imprimir.attr("href", url);
                    $a_imprimir.show();
                }
                $form = $(this).parents('form');
                $($form).find('div.anamnese').addClass('hide');
                $($form).find('div[data-id="' + id + '"]').removeClass('hide');
            });
        });
    </script>
    {{--/Anamnese--}}

    {{--ORCAMENTOS--}}
    <script>
        var cont = 0;
        var VALOR_TOTAL = 0;
        var VALOR_TOTAL_DESCONTO = 0;
        var temp = '<?php echo json_encode($Intervencoes);?>';
        $Intervencoes = jQuery.parseJSON(temp);
        $INPUT_desconto = '';

        //Atualização do select das intervenções
        function popula_intervencao(cont, $select) {
            $.each($Intervencoes, function (i, intervencao) {
                $($select).append($('<option>', {
                    value: intervencao.idintervencao,
                    text: intervencao.nome,
                    'data-codigo': intervencao.codigo,
                    'data-regiao': intervencao.regiao,
                    'data-valor': intervencao.valor
                }));
            });
        }

        function atualiza_total(action = 'new') {
            console.log(action);
            if (action == 'new') {
                $input_desconto = $INPUT_desconto_new;
                $input_valor_entrada = $INPUT_valor_entrada_new;
                $input_parcelas = $INPUT_parcelas_new;
                $input_valor_parcelas = $INPUT_valor_parcelas_new;
                $input_valor_desconto = $INPUT_valor_desconto_new;
                $input_valor_total = $INPUT_valor_total_new;
            } else {
                $input_desconto = $INPUT_desconto_edit;
                $input_valor_entrada = $INPUT_valor_entrada_edit;
                $input_parcelas = $INPUT_parcelas_edit;
                $input_valor_parcelas = $INPUT_valor_parcelas_edit;
                $input_valor_desconto = $INPUT_valor_desconto_edit;
                $input_valor_total = $INPUT_valor_total_edit;
            }
            desconto = parseInt($($input_desconto).val().replace('%', ''));
            if (desconto >= 100) {
                $($input_desconto).maskMoney('mask', 100);
                desconto = 100;
            }

            VALOR_TOTAL = 0;
            $parent = $('section#' + action + '-orcamento').find('div#orcamento-container');
            $($parent).find('section#tratamentos').find('input[name^="valor"]').each(function (i, v) {
                valor_atual = 0;
                valor_atual = $(this).maskMoney('unmasked')[0];
                VALOR_TOTAL += valor_atual
            });

            entrada = $($input_valor_entrada).maskMoney('unmasked')[0];

            VALOR_TOTAL_DESCONTO = VALOR_TOTAL;
            if (!isNaN(desconto) && desconto != "") {
                VALOR_TOTAL_DESCONTO = VALOR_TOTAL_DESCONTO - (VALOR_TOTAL_DESCONTO * desconto) / 100;
            }

            n_parcela = $($input_parcelas).val();
            n_parcela = (n_parcela != '' && n_parcela > 0) ? n_parcela : 1;
            valor_parcelas = (VALOR_TOTAL_DESCONTO - entrada) / n_parcela;

            $($input_valor_parcelas).maskMoney('mask', valor_parcelas);
            $($input_valor_desconto).maskMoney('mask', VALOR_TOTAL_DESCONTO);
            $($input_valor_total).maskMoney('mask', VALOR_TOTAL);
        }

        function popula_valores($this) {
            $op = $($this).find(":selected");
            $parents = $($this).parents('div.form-group');
            console.log($op);
            $parents.find('input#codigo').val($op.data('codigo'));
            $parents.find('input#regiao').val($op.data('regiao'));
            initMaskMoney($parents.find('input#valor').val($op.data('valor')));
            atualiza_total($($parents).data('action'));
//        atualiza_total('new');
        }

        function add_campos(cont, $this_btn) {
            action = $($this_btn).data('action');
            console.log(action)
            $($this_btn).parents('div.form-group').siblings('section').append(get_campos(cont, action));
            $this = "select[name='idintervencao[" + cont + "]']";

            popula_intervencao(cont, "select[name='idintervencao[" + cont + "]']");
            popula_valores($this);

            $($this).select2({width: 'resolve'});
            initMaskMoney($("input[name='valor[" + cont + "]']"));

            console.log(VALOR_TOTAL);
            atualiza_total(action);
        }

        function get_campos(cont, action, iditem = 0) {
            field_iditem = (iditem == 0) ? '' : '<input name="iditem_orcamento[' + cont + ']" type="hidden" value="' + iditem + '">';
            return '<div class="form-group" data-action="' + action + '">' +
                field_iditem +
                '<label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tratamento:</label>' +
                '<div class="col-md-4 col-sm-4 col-xs-12">' +
                '<select id="interv" onchange="popula_valores(this);" class="select2 form-control" tabindex="-1" style="width: 100%;" name="idintervencao[' + cont + ']">' +
                '</select>' +
                '</div>' +
                '<div class="col-md-2 col-sm-2 col-xs-12">' +
                '<input id="codigo" type="text" class="form-control" disabled placeholder="Código">' +
                '<span class="fa fa-info-circle form-control-feedback right" aria-hidden="true"></span>' +
                '</div>' +
                '<div class="col-md-2 col-sm-2 col-xs-12">' +
                '<input id="regiao" type="text" class="form-control" name="regiao[' + cont + ']" placeholder="Região">' +
                '<span class="fa fa-info-circle form-control-feedback right" aria-hidden="true"></span>' +
                '</div>' +
                '<div class="col-md-2 col-sm-2 col-xs-12">' +
                '<input id="valor" onkeyup="atualiza_total(\'' + action + '\')" type="text" class="form-control show-valor" name="valor[' + cont + ']" placeholder="Valor">' +
                '<span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>' +
                '</div>' +
                '<div class="col-md-1 col-sm-1 col-xs-12">' +
                '<button onclick="remove_valores(this)" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button>' +
                '</div>' +
                '</div>';
        }

        function remove_valores($this) {
            $parents = $($this).parents('div.form-group');
            //if isset item_orcamento
            //;
            if (typeof ($($parents).find('input[name^="iditem_orcamento"]').val()) != 'undefined') {
                var URL = '{{route('item_orcamento.remove', '_0_')}}';
                iditem_orcamento = $($parents).find('input[name^="iditem_orcamento"]').val();

                $.ajax({
                    url: URL.replace('_0_', iditem_orcamento),
                    type: 'GET',
                    dataType: "json",
                    error: function (xhr, textStatus) {
                        console.log('xhr-error: ' + xhr.responseText);
                        console.log('textStatus-error: ' + textStatus);
                    },
                    beforeSend: function () {
                        $(".loading").show();
                    },
                    complete: function (xhr, textStatus) {
                        $(".loading").hide();
                    },
                    success: function (json) {
                        console.log(json);
                        if (json.status == 1) {
                            $($parents).remove();
                            atualiza_total($($parents).data('action'));
                        } else {
                            alert('Erro ao remover');
                        }
                    }
                });
            } else {
                $($parents).remove();
                atualiza_total($($parents).data('action'));
            }
        }

        //INICIALIZAÇÃO DE CAMPOS E VARIÁVEIS
        $(document).ready(function () {
            $INPUT_desconto_new = $('div#pagamento-container').find("input#desconto");
            $INPUT_valor_total_new = $('div#orcamento-container').find("input#valor_total");
            $INPUT_valor_entrada_new = $('div#pagamento-container').find("input[name=valor_entrada]");
            $INPUT_parcelas_new = $('div#pagamento-container').find("input[name=numero_parcelas]");
            $INPUT_valor_parcelas_new = $('div#pagamento-container').find("input#valor_parcela");
            $INPUT_valor_desconto_new = $('div#pagamento-container').find("input#valor_total_desconto");

            initMaskMoney($INPUT_valor_total_new);
            initMaskMoney($INPUT_valor_entrada_new);
            initMaskMoney($INPUT_valor_parcelas_new);
            initMaskMoney($INPUT_valor_desconto_new);
            initMaskPercent($INPUT_desconto_new);

            popula_intervencao(0, "select[name='idintervencao[" + cont + "]']");
            VALOR_TOTAL += popula_valores("section#new-orcamento select[name='idintervencao[" + cont + "]']");
//        atualiza_total('new');

            $parent = $('section#edit-orcamento');
            $INPUT_descricao_edit = $($parent).find("input[name=descricao]");
            $INPUT_idprofissional_edit = $($parent).find("select[name=idprofissional]");
            $INPUT_desconto_edit = $($parent).find("input#desconto");
            $INPUT_valor_total_edit = $($parent).find("input#valor_total");
            $INPUT_valor_entrada_edit = $($parent).find("input[name=valor_entrada]");
            $INPUT_parcelas_edit = $($parent).find("input[name=numero_parcelas]");
            $INPUT_valor_parcelas_edit = $($parent).find("input#valor_parcela");
            $INPUT_valor_desconto_edit = $($parent).find("input#valor_total_desconto");

            initMaskMoney($INPUT_valor_total_edit);
            initMaskMoney($INPUT_valor_entrada_edit);
            initMaskMoney($INPUT_valor_parcelas_edit);
            initMaskMoney($INPUT_valor_desconto_edit);
            initMaskPercent($INPUT_desconto_edit);

        });

        //INICIALIZAÇÃO DE BOTÕES
        $(document).ready(function () {

            $('button#add-orcamento').click(function () {
                $('section#new-orcamento').toggle('slow');
            });

            $('button#add-tratamento').click(function () {
                cont++;
                add_campos(cont, $(this));
            });

            $('a.edit-orcamento').click(function () {
                $parent = $(this).closest('div.x_content').find('section#edit-orcamento');
                var ORCAMENTO = $(this).data('dados');
                $data = $(this).data();
                console.log($data);
                var URL = $($parent).find('form#form-edit').attr('action');
                $($parent).find('form#form-edit').attr('action', URL.replace('_0_', ORCAMENTO.idorcamento))

                $($INPUT_descricao_edit).val(ORCAMENTO.descricao);
                $($INPUT_idprofissional_edit).val(ORCAMENTO.idprofissional).trigger("change");
                $($INPUT_valor_entrada_edit).maskMoney('mask', parseFloat($data.valor_entrada));
                $($INPUT_desconto_edit).maskMoney('mask', ORCAMENTO.desconto);
                $($INPUT_parcelas_edit).val(ORCAMENTO.numero_parcelas);

                $.each($data.itens, function (i, v) {
//                console.log(v);
                    cont++;
                    $($parent).find('section#tratamentos').append(get_campos(cont, 'edit', v.iditem_orcamento));

                    $this = $($parent).find("select[name='idintervencao[" + cont + "]']");
                    popula_intervencao(cont, $this);
                    $($this).select2({width: 'resolve'}).val(v.idintervencao).trigger('change');
//                popula_valores($this);

                    $this_parent = $($this).parents("div.form-group");
                    //Região do tratamento
                    $($this_parent).find("input#regiao").val(v.regiao);
                    //Valor do tratamento
                    $($this_parent).find("input#valor").val(v.valor);
                });

                $parent = $(this).closest('div.x_content').find('section#edit-orcamento');
                $($parent).toggle("slow");
                $($parent).next().toggle("slide");
                atualiza_total('edit');
            });

            $('a.edit-orcamento-cancel').click(function () {
                $parent = $(this).closest('section#edit-orcamento');
                $($parent).toggle("quick");
                $($parent).next().toggle("slide");
                $($parent).find('div#orcamento-container').find('section#tratamentos').empty();
            });

        });
    </script>
    {{--/ORCAMENTOS--}}

    {{--FINANCEIRO--}}
    <script>
        $(document).ready(function () {
            var _URL_IMPRIMIR_PARCELA_ = '{{route('pagamento.imprimir','_IDPARCELA_')}}';
            $_MODAL_RECEBER_ = $('#modalReceber');
            $_MODAL_FORMA_PAGAMENTO_ = $('#modalFormaPgto');
            $_MODAL_RECIBO_ = $('#modalRecibo');
            $_MODAL_ALTERAR_VENCIMENTO_ = $('#modalAlterarVencimento');
            $_MODAL_RECEBIMENTOS_ = $('#modalRecebimentos');

            $($_MODAL_RECEBER_).on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                $data = $(button).data('parcelas');
                var modal = $(this);
                modal.find('.modal-title').text('Recebimento de parcelas');
                //<span class="btn btn-danger btn-xs"> Não Aprovado</span>
                tabela = '';
                URL_estornar = '{{route('parcelas.estornar','IDP')}}';
                $.each($data, function (i, v) {
                    url_estornar = URL_estornar.replace('IDP', v.idparcela);
                    tabela += '<tr>' +
                        '<td>' + (++i) + '/' + $data.length + '</td>' +
                        '<td>' + v.valor_total + '</td>' +
                        '<td>' + v.valor_pago + '</td>' +
                        '<td>' + v.valor_pendente + '</td>' +
                        '<td>' + v.data_vencimento + '</td>';
                    '<td>' + v.data_pagamento + '</td>';
                    if (v.pago) {
                        tabela += '<td class="td-data">' + v.data_pagamento + '</td>' +
                            //'<span class="btn btn-success btn-xs">Pago</span>' +
                            '<td class="td-receber">' +
                            '<a data-toggle="modal" ' +
                            'data-parcela_pagamentos=\'' + JSON.stringify(v.parcela_pagamentos) + '\' ' +
                            'data-target="#modalRecibo" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Recibo</a>' +
                            '<a href="' + url_estornar + '" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Estornar</a>';
                    } else {
                        tabela += '<td class="td-status"><span class="btn btn-danger btn-xs">Pendente</span></td>' +
                            '<td class="td-receber">' +
                            '<a data-toggle="modal" ' +
                            'data-idparcela="' + v.idparcela + '"' +
                            'data-numero="' + v.numero + '"' +
                            'data-valor_total="' + v.valor_total + '"' +
                            'data-valor_pago="' + v.valor_pago + '"' +
                            'data-valor_pendente="' + v.valor_pendente + '"' +
                            'data-data_vencimento="' + v.data_vencimento + '"' +
                            'data-target="#modalFormaPgto" class="btn btn-primary btn-xs"><i class="fa fa-money"></i> Receber</a>' +
                            '<a data-toggle="modal" ' +
                            'data-idparcela="' + v.idparcela + '"' +
                            'data-data_vencimento="' + v.data_vencimento + '"' +
                            'data-target="#modalAlterarVencimento" class="btn btn-default btn-xs"><i class="fa fa-calendar"></i> Alterar</a>';
                        //'<a onclick="ajaxreceber(this,\''+url_receber+'\')" class="btn btn-info btn-xs"><i class="fa fa-money"></i> receber</a>';
                    }

                    tabela += '</td></tr>';


                });
                modal.find('.modal-body table tbody').html(tabela);
            });

            //MODAL DA FORMA DE PAGAMENTO
            $($_MODAL_FORMA_PAGAMENTO_).on('show.bs.modal', function (event) {
                $($_MODAL_RECEBER_).toggle();
                //total, pago, pendente, vencimento
                var $button = $(event.relatedTarget);
                var $modal = $(this);

                $($modal).find('div.modal-header h4.modal-title b').html($($button).data("numero"));

                var list = ['idparcela', 'valor_total', 'valor_pago', 'valor_pendente', 'data_vencimento'];
                $.each(list, function (i, v) {
                    $($modal).find('input#' + v).val($($button).data(v));
                })
                $($modal).find('input#valor').attr('val');
            });

            $($_MODAL_FORMA_PAGAMENTO_).on('hide.bs.modal', function (event) {
                $($_MODAL_RECEBER_).toggle();
            });


            //MODAL RECIBO
            $($_MODAL_RECIBO_).on('show.bs.modal', function (event) {
                $($_MODAL_RECEBER_).toggle();
                var $button = $(event.relatedTarget);
                var $modal = $(this);
                var URL_imprimir = '{{route('pagamento.imprimir','IDP')}}';
                var parcela_pagamentos = $($button).data('parcela_pagamentos');
                var tabela = ''
                $.each(parcela_pagamentos, function (i, v) {
                    url_imprimir = URL_imprimir.replace('IDP', v.id);
                    console.log(v);
                    tabela += '<tr>' +
                        '<td>' + v.data_pagamento + '</td>' +
                        '<td>' + v.valor + '</td>' +
                        '<td class="td-receber">' +
                        '<a target="_blank" href="' + url_imprimir + '" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Recibo</a>' +
                        '</td>' +
                        '</tr>';
                });
                $($modal).find('.modal-body table tbody').html(tabela);

            });

            $($_MODAL_RECIBO_).on('hide.bs.modal', function (event) {
                $($_MODAL_RECEBER_).toggle();
            });


            //MODAL ALTERAR VENCIMENTO
            $($_MODAL_ALTERAR_VENCIMENTO_).on('show.bs.modal', function (event) {
                $($_MODAL_RECEBER_).toggle();
//            //total, pago, pendente, vencimento
                var $button = $(event.relatedTarget);
                var $modal = $(this);
//
                $($modal).find('div.modal-header h4.modal-title b').html($($button).data("numero"));
                $($modal).find('input#idparcela').val($($button).data('idparcela'));
                $($modal).find('input#data_vencimento_old').val($($button).data('data_vencimento'));
                $($modal).find('input[name=data_vencimento]').val($($button).data('data_vencimento'));
            });

            $($_MODAL_ALTERAR_VENCIMENTO_).on('hide.bs.modal', function (event) {
                $($_MODAL_RECEBER_).toggle();
            });

            //MODAL RECEBIMENTOS
            $($_MODAL_RECEBIMENTOS_).on('show.bs.modal', function (event) {
                var $button = $(event.relatedTarget);
                var $modal = $(this);
                var href = $($button).data('href');
                $.ajax({
                    url: href,
                    type: 'GET',
                    beforeSend: function () {
                        $('div.loading').show();
                    },
                    success: function (json) {
                        console.log(json);
                        var tabela = '';
                        $.each(json, function (i, v) {
                            var url_imprimir = _URL_IMPRIMIR_PARCELA_.replace('_IDPARCELA_', v.idparcela);
                            tabela += '<tr>' +
                                '<td>' + v.data_pagamento + '</td>' +
                                '<td>' + v.valor_formatado + '</td>' +
                                '<td class="td-receber">' +
                                '<a target="_blank" href="' + url_imprimir + '" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Recibo</a>' +
                                '</td>' +
                                '</tr>';
                        });
                        $($modal).find('.modal-body table tbody').html(tabela);
                        $('div.loading').hide();
                    }
                });


            });
        });
    </script>
    {{--/FINANCEIRO--}}
@endsection


