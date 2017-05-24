
<div id="modalShow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalShow" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Valor</th>
                            <th>Pago</th>
                            <th>Pendente</th>
                            <th>Vencimento</th>
                            <th>Pagamento</th>
                            <th colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="modalFormaPgto" class="modal fade" tabindex="-2" role="dialog" aria-labelledby="modalShow" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Pagar parcela (#<b></b>)</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['route' => 'parcelas.pagar', 'method' => 'POST',
                        'class' => 'form-horizontal form-label-left', 'data-parsley-validate']) !!}
                    <input type="hidden" name="idparcela" id="idparcela">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Total:</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                            <input type="text" class="form-control show-valor" id="valor_total" disabled>
                        </div>
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Pago:</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                            <input type="text" class="form-control show-valor" id="valor_pago" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Pendente:</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                            <input type="text" class="form-control show-valor" id="valor_pendente" disabled>
                        </div>
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Vencimento:</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                            <input type="text" class="form-control show-valor" id="data_vencimento" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Forma:</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                            <select class="select2 form-control" tabindex="-1" style="width: 100%;" name="idtipo_pagamento" required>
                                @foreach($TipoPagamentos as $tipo)
                                    <option value="{{$tipo->idtipo_pagamento}}">{{$tipo->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Data:</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                            <input type="text" class="form-control show-data" name="data_pagamento" placeholder="Data de Pagamento"
                                   value="{{\Carbon\Carbon::now()->format('d/m/Y')}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Valor:</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                            <input type="text" class="form-control show-valor" id="valor" name="valor" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                            <button class="btn btn-primary btn-block"><i class="fa fa-money"></i> Pagar</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<div id="modalRecibo" class="modal fade" tabindex="-3" role="dialog" aria-labelledby="modalShow" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Recibo de pagamentos</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>Data de Pagamento</th>
                        <th>Valor Pago</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="x_title" style="margin-top:20px;">
    <h2>Débitos</h2>
    <div class="clearfix"></div>
</div>

<div class="x_content">
    <?php $valores = $Paciente->totais_valores(); ?>
    <div class="product_price">
        <h1 class="price text-center" style="color:#d9534f;">{{$valores['valor_pendente']}}</h1>
        <p class="price-tax text-center">À receber</p>
    </div>
    <div class="product_price">
        <h1 class="price text-center" style="color:#1A82C3;">{{$valores['valor_pago']}}</h1>
        <p class="price-tax text-center">Total pago</p>
    </div>
    @if($Paciente->has_pagamentos())
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 25%">Descrição</th>
                    <th >Valor Total</th>
                    <th >Pagamento</th>
                    <th >Status</th>
                    <th >Pago / Restante</th>
                    <th style="width: 20%">Ações</th>
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
                            <p>{{$orcamento->valor_total}}</p>
                        </td>
                        <td>
                            @if($orcamento->valor_entrada>0)
                                <span>{{$orcamento->valor_entrada}}</span><br />
                                <small>+ {{$orcamento->numero_parcelas}} &times; {{$orcamento->valor_parcelas()}}</small>
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
                            <a class="btn btn-primary btn-xs pagar"
                               data-toggle="modal" data-target="#modalShow"
                               data-parcelas="{{$orcamento->pagamento->parcelas_json()}}"><i class="fa fa-money"></i> Pagar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<script>
    $(document).ready(function(){

        $('#modalShow').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            $data = $(button).data('parcelas');
            var modal = $(this);
            modal.find('.modal-title').text('Pagamento de parcelas');
            //<span class="btn btn-danger btn-xs"> Não Aprovado</span>
            tabela = '';
            URL_estornar = '{{route('parcelas.estornar','IDP')}}';
            $.each($data,function(i,v){
                url_estornar = URL_estornar.replace('IDP',v.idparcela);
                tabela += '<tr>' +
                        '<td>'+(++i)+'/'+$data.length+'</td>' +
                        '<td>'+v.valor_total+'</td>' +
                        '<td>'+v.valor_pago+'</td>' +
                        '<td>'+v.valor_pendente+'</td>' +
                        '<td>' + v.data_vencimento + '</td>';
                        '<td>' + v.data_pagamento + '</td>';
                if(v.pago) {
                    tabela += '<td class="td-data">' + v.data_pagamento + '</td>' +
                            //'<span class="btn btn-success btn-xs">Pago</span>' +
                            '<td class="td-pagar">' +
                        '<a data-toggle="modal" ' +
                        'data-parcela_pagamentos=\'' + JSON.stringify(v.parcela_pagamentos) + '\' ' +
                        'data-target="#modalRecibo" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Recibo</a>'
                        '<a href="'+url_estornar+'" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Estornar</a>';
                } else {
                    tabela += '<td class="td-status"><span class="btn btn-danger btn-xs">Pendente</span></td>' +
                            '<td class="td-pagar">' +
                            '<a data-toggle="modal" ' +
                                'data-idparcela="' + v.idparcela + '"' +
                                'data-numero="' + v.numero + '"' +
                                'data-valor_total="' + v.valor_total + '"' +
                                'data-valor_pago="' + v.valor_pago + '"' +
                                'data-valor_pendente="' + v.valor_pendente + '"' +
                                'data-data_vencimento="' + v.data_vencimento + '"' +
                                'data-target="#modalFormaPgto" class="btn btn-primary btn-xs"><i class="fa fa-money"></i> Pagar</a>';
                            //'<a onclick="ajaxPagar(this,\''+url_pagar+'\')" class="btn btn-info btn-xs"><i class="fa fa-money"></i> Pagar</a>';
                }

                tabela +='</td></tr>';


            });
            modal.find('.modal-body table tbody').html(tabela);
        });

        //MODAL DA FORMA DE PAGAMENTO
        $('#modalFormaPgto').on('show.bs.modal', function (event){
            $('#modalShow').toggle();
            //total, pago, pendente, vencimento
            var $button = $(event.relatedTarget);
            var $modal = $(this);

            $($modal).find('div.modal-header h4.modal-title b').html($($button).data("numero"));

            var list = ['idparcela', 'valor_total', 'valor_pago', 'valor_pendente', 'data_vencimento'];
            $.each(list,function(i,v){
                $($modal).find('input#' + v).val($($button).data(v));
            })
            $($modal).find('input#valor').attr('val');
        });
        $('#modalFormaPgto').on('hide.bs.modal', function (event){
            $('#modalShow').toggle();
        });

        $('#modalRecibo').on('show.bs.modal', function (event) {
            $('#modalShow').toggle();
            var $button = $(event.relatedTarget);
            var $modal = $(this);
            var URL_imprimir = '{{route('pagamento.imprimir','IDP')}}';
            var parcela_pagamentos = $($button).data('parcela_pagamentos');
            var tabela = ''
            var URL_imprimir  = '{{route('pagamento.imprimir','IDP')}}';
            $.each(parcela_pagamentos, function(i,v){
                url_imprimir = URL_imprimir.replace('IDP',v.idtipo_pagamento);
                console.log(v);
                tabela += '<tr>' +
                        '<td>' + v.data_pagamento + '</td>' +
                        '<td>' + v.valor + '</td>' +
                        '<td class="td-pagar">' +
                        '<a target="_blank" href="' + url_imprimir + '" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Recibo</a>'+
                        '</td>' +
                    '</tr>';
            });
            $($modal).find('.modal-body table tbody').html(tabela);

        });
        $('#modalRecibo').on('hide.bs.modal', function (event){
            $('#modalShow').toggle();
        });
    });
</script>

<script>
    /*
    function ajaxPagar($this,href_){
        URL_imprimir = 'http://localhost/workana/control-dental/public/parcelas/imprimir/7';
        $linha = $($this).parents('tr');
        $.ajax({
            url: href_,
            type: 'GET',
            dataType: "json",
            error: function (xhr, textStatus) {
                console.log('xhr-error: ' + xhr.responseText);
                console.log('textStatus-error: ' + textStatus);
            },
            success: function (json) {
                console.log(json);
                if(json.status==1) {
                    $($linha).find('td.td-data').html(json.data_pagamento);
                    $($linha).find('td.td-status').html('<span class="btn btn-success btn-xs">Pago</span>');
                    $($linha).find('td.td-pagar').html('<a target="_blank" href="'+json.url_imprimir+'" class="btn btn-default btn-xs"><i class="fa fa-print"></i> Recibo</a>');
                }
            }
        });
    }
*/
</script>