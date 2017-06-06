@include('pages.pacientes.modals.financeiro.forma_pagamento')
@include('pages.pacientes.modals.financeiro.receber')
@include('pages.pacientes.modals.financeiro.recibo')
@include('pages.pacientes.modals.financeiro.alterar')

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
                <th>Valor Total</th>
                <th>Pagamento</th>
                <th>Status</th>
                <th>Pago / Restante</th>
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
                            <span>{{$orcamento->valor_entrada}}</span><br/>
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
                        <a class="btn btn-primary btn-xs receber"
                           data-toggle="modal" data-target="#modalReceber"
                           data-parcelas="{{$orcamento->pagamento->parcelas_json()}}"><i class="fa fa-money"></i>
                            Receber</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>

<script>
    $(document).ready(function(){
        $_MODAL_RECEBER_ = $('#modalReceber');
        $_MODAL_FORMA_PAGAMENTO_ = $('#modalFormaPgto');
        $_MODAL_RECIBO_ = $('#modalRecibo');
        $_MODAL_ALTERAR_VENCIMENTO_ = $('#modalAlterarVencimento');

        $($_MODAL_RECEBER_).on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            $data = $(button).data('parcelas');
            var modal = $(this);
            modal.find('.modal-title').text('Recebimento de parcelas');
            //<span class="btn btn-danger btn-xs"> Não Aprovado</span>
            tabela = '';
            URL_estornar = '{{route('parcelas.estornar','IDP')}}';
            $.each($data,function(i,v){
                url_estornar = URL_estornar.replace('IDP',v.idparcela);
                tabela += '<tr>' +
                    '<td>' + (++i) + '/' + $data.length + '</td>' +
                    '<td>' + v.valor_total + '</td>' +
                    '<td>' + v.valor_pago + '</td>' +
                    '<td>' + v.valor_pendente + '</td>' +
                    '<td>' + v.data_vencimento + '</td>';
                '<td>' + v.data_pagamento + '</td>';
                if(v.pago) {
                    tabela += '<td class="td-data">' + v.data_pagamento + '</td>' +
                        //'<span class="btn btn-success btn-xs">Pago</span>' +
                        '<td class="td-receber">' +
                        '<a data-toggle="modal" ' +
                        'data-parcela_pagamentos=\'' + JSON.stringify(v.parcela_pagamentos) + '\' ' +
                        'data-target="#modalRecibo" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Recibo</a>' +
                        '<a href="'+url_estornar+'" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Estornar</a>';
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

                tabela +='</td></tr>';


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
            $.each(list,function(i,v){
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
            $.each(parcela_pagamentos, function(i,v){
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
    });
</script>