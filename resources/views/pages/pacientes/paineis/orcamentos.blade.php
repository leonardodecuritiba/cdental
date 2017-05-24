
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
                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Descrição:</label>
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" name="descricao" placeholder="Descrição do orçamento..." required="required" >
                        <span class="fa fa-medkit form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Profissional:</label>
                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                        <select class="select2 form-control" tabindex="-1" style="width: 100%;" name="idprofissional">
                            @foreach($Profissionais as $profissional)
                                <option value="{{$profissional->idprofissional}}" @if(isset($Paciente) && ($Paciente->idprofissional) == ($profissional->idprofissional)) selected @endif>{{$profissional->nome}}</option>
                            @endforeach
                        </select>
                        <span class="fa fa-user-md form-control-feedback right" aria-hidden="true"></span>
                    </div>
                </div>
                <section id="tratamentos">
                    <div class="form-group" data-action="new">
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tratamento:</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <select id="intervencao" onchange="popula_valores(this);" class="select2 form-control" tabindex="-1" style="width: 100%;" name="idintervencao[0]">
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input id="codigo" type="text" class="form-control" disabled placeholder="Código">
                            <span class="fa fa-info-circle form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input id="regiao" type="text" class="form-control" name="regiao[0]" placeholder="Região">
                            <span class="fa fa-info-circle form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input id="valor" onkeyup="atualiza_total('new')" type="text" class="form-control show-valor" name="valor[0]" placeholder="Valor">
                            <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                </section>
                <div class="form-group">
                    <label class="control-label col-md-offset-8 col-md-1 col-sm-offset-8 col-sm-1 col-xs-12" for="first-name">Total:</label>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <input id="valor_total" type="text" disabled class="form-control" placeholder="Valor">
                        <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-9 col-md-2 col-sm-offset-9 col-sm-2 col-xs-12">
                        <button id="add-tratamento" data-action="new" type="button" class="btn btn-primary"><i class="fa fa-plus-circle fa-2"></i> Adicionar tratamento</button>
                    </div>
                </div>
            </div>
            <div class="x_title" style="margin-top:20px;">
                <h2>Forma de Pagamento</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" id="pagamento-container">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Desconto (%)</label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" onkeyup="atualiza_total('new')" class="form-control" id="desconto" name="desconto">
                    </div>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Valor de entrada</label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="text" onkeyup="atualiza_total('new')" class="form-control" name="valor_entrada">
                        <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Número de Parcelas</label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="number" onchange="atualiza_total('new')" onkeyup="atualiza_total('new')" min="1" class="form-control" value="1" name="numero_parcelas" required="required">
                    </div>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Valor das Parcelas</label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input id="valor_parcela" type="text" class="form-control" disabled placeholder="Valor da parcela:" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-offset-7 col-md-2 col-sm-offset-7 col-sm-2 col-xs-12" for="first-name">Valor total com desconto:</label>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <input id="valor_total_desconto" type="text" disabled class="form-control">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-offset-9 col-md-2 col-sm-offset-9 col-sm-2 col-xs-12">
                        <button type="submit" class="btn btn-block btn-round btn-success"><i class="fa fa-save"></i> Salvar</button>
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </section>

    <div class="x_title" style="margin-top:20px;">
        <h2>Orçamentos do paciente</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li>
                <button class="btn btn-primary" id="add-orcamento"><i class="fa fa-plus-circle fa-2"></i> Novo orçamento</button>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    @if($Paciente->orcamentos_abertos->count() > 0)
        <div class="x_content">
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
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Descrição:</label>
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control" name="descricao" placeholder="Descrição do orçamento..." required="required" >
                            <span class="fa fa-medkit form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Profissional:</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                            <select class="select2 form-control" tabindex="-1" style="width: 100%;" name="idprofissional">
                                @foreach($Profissionais as $profissional)
                                    <option value="{{$profissional->idprofissional}}"
                                            @if(isset($Paciente) && ($Paciente->idprofissional) == ($profissional->idprofissional)) selected @endif
                                    >{{$profissional->nome}}</option>
                                @endforeach
                            </select>
                            <span class="fa fa-user-md form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                    <section id="tratamentos">
                    </section>
                    <div class="form-group">
                        <label class="control-label col-md-offset-8 col-md-1 col-sm-offset-8 col-sm-1 col-xs-12" for="first-name">Total:</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input id="valor_total" type="text" disabled class="form-control" placeholder="Valor">
                            <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-9 col-md-2 col-sm-offset-9 col-sm-2 col-xs-12">
                            <button id="add-tratamento" data-action="edit" type="button" class="btn btn-primary"><i class="fa fa-plus-circle fa-2"></i> Adicionar tratamento</button>
                        </div>
                    </div>
                </div>
                <div class="x_title" style="margin-top:20px;">
                    <h2>Forma de Pagamento</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="pagamento-container">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Desconto (%)</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" onkeyup="atualiza_total('edit')" class="form-control" id="desconto" name="desconto">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Valor de entrada</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" onkeyup="atualiza_total('edit')" class="form-control" name="valor_entrada">
                            <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Número de Parcelas</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="number" onchange="atualiza_total('edit')" onkeyup="atualiza_total('edit')" min="1" class="form-control" value="1" name="numero_parcelas" required="required">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Valor das Parcelas</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input id="valor_parcela" type="text" class="form-control" disabled placeholder="Valor da parcela:" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-offset-7 col-md-2 col-sm-offset-7 col-sm-2 col-xs-12" for="first-name">Valor total com desconto:</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input id="valor_total_desconto" type="text" disabled class="form-control">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group pull-right">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <a class="edit-orcamento-cancel btn btn-block btn-round btn-danger"><i class="fa fa-times"></i> Cancelar</a>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <button type="submit" class="btn btn-block btn-round btn-success"><i class="fa fa-save"></i> Salvar</button>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </section>
            <section id="show-orcamentos">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Dentista/Data</th>
                        <th style="width: 15%">Descrição</th>
                        <th>Valor</th>
                        <th>Desconto</th>
                        <th>Total</th>
                        <th>Pagamento</th>
                        <th colspan="4">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Paciente->orcamentos_abertos as $orcamento)
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
                                <br />
                                <small>Data: {{$orcamento->created_at}}</small></td>
                            <td>
                                <span>{{$orcamento->descricao}}</span>
                            </td>
                            <td>
                                <span>{{$orcamento->valor_total}}</span>
                            </td>
                            <td>
                                @if($orcamento->desconto>0)
                                    <span>{{$orcamento->valor_desconto()}} ({{$orcamento->desconto}}%)</span>
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
                                    <br />
                                    <small>+ {{$orcamento->numero_parcelas}} &times; {{$orcamento->valor_parcelas()}}</small>
                                @else
                                    <span class="show-valor">{{$orcamento->numero_parcelas}} &times; {{$orcamento->valor_parcelas()}}</span>
                                @endif
                            </td>
                            <td>
                                @if(!$orcamento->aprovacao)
                                    <a href="{{route('orcamento.aprovar',$orcamento->idorcamento)}}" class="btn btn-aprovar btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Aprovar</a>
                                @endif
                                <a class="btn btn-info btn-xs edit-orcamento"
                                    data-dados="{{$orcamento}}"
                                    data-valor_entrada="{{$orcamento->valor_entrada_float()}}"
                                    data-itens="{{$orcamento->itens_orcamento}}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-default btn-xs"
                                   target="_blank"
                                   href="{{route('orcamento.imprimir',$orcamento->idorcamento)}}"><i class="fa fa-print"></i></a>
                                <button class="btn btn-danger btn-xs"
                                    data-nome="{{$orcamento->descricao}}"
                                    data-href="{{route('orcamentos.destroy',$orcamento->idorcamento)}}"
                                    data-toggle="modal"
                                    data-target="#modalRemocao"><i class="fa fa-trash-o fa-sm"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    @endif
<script>
    var cont = 0;
    var VALOR_TOTAL = 0;
    var VALOR_TOTAL_DESCONTO = 0;
    var temp = '<?php echo json_encode($Intervencoes);?>';
    $Intervencoes = jQuery.parseJSON(temp);
    $INPUT_desconto = '';

    //Atualização do select das intervenções
    function popula_intervencao(cont, $select){
        $.each($Intervencoes, function (i, intervencao) {
            $($select).append($('<option>', {
                value           : intervencao.idintervencao,
                text            : intervencao.nome,
                'data-codigo'   : intervencao.codigo,
                'data-regiao'   : intervencao.regiao,
                'data-valor'    : intervencao.valor
            }));
        });
    }

    function atualiza_total(action = 'new'){
        console.log(action);
        if(action == 'new'){
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
        desconto = parseInt($($input_desconto).val().replace('%',''));
        if(desconto>=100){
            $($input_desconto).maskMoney('mask', 100);
            desconto = 100;
        }

        VALOR_TOTAL = 0;
        $parent = $('section#' + action + '-orcamento').find('div#orcamento-container');
        $($parent).find('section#tratamentos').find('input[name^="valor"]').each(function(i,v){
            valor_atual = 0;
            valor_atual = $(this).maskMoney('unmasked')[0];
            VALOR_TOTAL += valor_atual
        });

        entrada = $($input_valor_entrada).maskMoney('unmasked')[0];

        VALOR_TOTAL_DESCONTO = VALOR_TOTAL;
        if(!isNaN(desconto) && desconto != ""){
            VALOR_TOTAL_DESCONTO = VALOR_TOTAL_DESCONTO - (VALOR_TOTAL_DESCONTO*desconto)/100;
        }

        n_parcela = $($input_parcelas).val();
        n_parcela = (n_parcela != '' && n_parcela > 0)?n_parcela:1;
        valor_parcelas = (VALOR_TOTAL_DESCONTO  - entrada) / n_parcela;

        $($input_valor_parcelas).maskMoney('mask', valor_parcelas);
        $($input_valor_desconto).maskMoney('mask', VALOR_TOTAL_DESCONTO);
        $($input_valor_total).maskMoney('mask', VALOR_TOTAL);
    }

    function popula_valores($this){
        $op = $($this).find(":selected");
        $parents = $($this).parents('div.form-group');
        console.log($op);
        $parents.find('input#codigo').val($op.data('codigo'));
        $parents.find('input#regiao').val($op.data('regiao'));
        initMaskMoney($parents.find('input#valor').val($op.data('valor')));
        atualiza_total($($parents).data('action'));
//        atualiza_total('new');
    }

    function add_campos(cont,$this_btn){
        action = $($this_btn).data('action');
        console.log(action)
        $($this_btn).parents('div.form-group').siblings('section').append(get_campos(cont, action));
        $this = "select[name='idintervencao["+cont+"]']";

        popula_intervencao(cont, "select[name='idintervencao["+cont+"]']");
        popula_valores($this);

        $($this).select2({ width: 'resolve' });
        initMaskMoney($("input[name='valor["+cont+"]']"));

        console.log(VALOR_TOTAL);
        atualiza_total(action);
    }

    function get_campos(cont, action, iditem = 0){
        field_iditem = (iditem == 0)?'':'<input name="iditem_orcamento['+cont+']" type="hidden" value="' + iditem + '">';
        return '<div class="form-group" data-action="' + action + '">' +
            field_iditem +
            '<label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Tratamento:</label>' +
            '<div class="col-md-4 col-sm-4 col-xs-12">' +
            '<select id="interv" onchange="popula_valores(this);" class="select2 form-control" tabindex="-1" style="width: 100%;" name="idintervencao['+cont+']">' +
            '</select>' +
            '</div>' +
            '<div class="col-md-2 col-sm-2 col-xs-12">' +
            '<input id="codigo" type="text" class="form-control" disabled placeholder="Código">' +
            '<span class="fa fa-info-circle form-control-feedback right" aria-hidden="true"></span>' +
            '</div>' +
            '<div class="col-md-2 col-sm-2 col-xs-12">' +
            '<input id="regiao" type="text" class="form-control" name="regiao['+cont+']" placeholder="Região">' +
            '<span class="fa fa-info-circle form-control-feedback right" aria-hidden="true"></span>' +
            '</div>' +
            '<div class="col-md-2 col-sm-2 col-xs-12">' +
            '<input id="valor" onkeyup="atualiza_total(\'' + action + '\')" type="text" class="form-control show-valor" name="valor['+cont+']" placeholder="Valor">' +
            '<span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>' +
            '</div>' +
            '<div class="col-md-1 col-sm-1 col-xs-12">'+
            '<button onclick="remove_valores(this)" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button>'+
            '</div>' +
            '</div>';
    }

    function remove_valores($this) {
        $parents = $($this).parents('div.form-group');
        //if isset item_orcamento
        //;
        if ($($parents).find('input[name^="iditem_orcamento"]').val() != 'undefined'){
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
    $(document).ready(function() {
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

        popula_intervencao(0,"select[name='idintervencao["+cont+"]']");
        VALOR_TOTAL += popula_valores("section#new-orcamento select[name='idintervencao["+cont+"]']");
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
    $(document).ready(function(){

        $('button#add-orcamento').click(function(){
            $('section#new-orcamento').toggle('slow');
        });

        $('button#add-tratamento').click(function(){
            cont++;
            add_campos(cont,$(this));
        });

        $('a.edit-orcamento').click(function(){
            $parent = $(this).closest('div.x_content').find('section#edit-orcamento');
            var ORCAMENTO = $(this).data('dados');
            $data = $(this).data();
            console.log($data);
            var URL = $($parent).find('form#form-edit').attr('action');
            $($parent).find('form#form-edit').attr('action', URL.replace('_0_',ORCAMENTO.idorcamento))

            $($INPUT_descricao_edit).val(ORCAMENTO.descricao);
            $($INPUT_idprofissional_edit).val(ORCAMENTO.idprofissional).trigger("change");
            $($INPUT_valor_entrada_edit).maskMoney('mask', parseFloat($data.valor_entrada));
            $($INPUT_desconto_edit).maskMoney('mask', ORCAMENTO.desconto);
            $($INPUT_parcelas_edit).val(ORCAMENTO.numero_parcelas);

            $.each($data.itens, function(i,v){
//                console.log(v);
                cont++;
                $($parent).find('section#tratamentos').append(get_campos(cont, 'edit', v.iditem_orcamento));

                $this = $($parent).find("select[name='idintervencao["+cont+"]']");
                popula_intervencao(cont, $this);
                $($this).select2({ width: 'resolve' }).val(v.idintervencao).trigger('change');
//                popula_valores($this);

                $this_parent = $($this).parents("div.form-group");
                //Região do tratamento
                $($this_parent).find("input#regiao").val(v.regiao);
                //Valor do tratamento
                $($this_parent).find("input#valor").val(v.valor);
            });

            $parent = $(this).closest('div.x_content').find('section#edit-orcamento');
            $($parent).toggle( "slow");
            $($parent).next().toggle("slide");
            atualiza_total('edit');
        });

        $('a.edit-orcamento-cancel').click(function(){
            $parent = $(this).closest('section#edit-orcamento');
            $($parent).toggle( "quick");
            $($parent).next().toggle("slide");
            $($parent).find('div#orcamento-container').find('section#tratamentos').empty();
        });

    });
</script>
