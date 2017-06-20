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
                                <p>{{$orcamento->valor_total}}</p>
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
                                <a class="btn btn-primary btn-xs receber"
                                   data-toggle="modal" data-target="#modalReceber"
                                   data-parcelas="{{$orcamento->pagamento->parcelas_json()}}"><i
                                            class="fa fa-money"></i>
                                    Receber</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
