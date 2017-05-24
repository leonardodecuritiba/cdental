<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Evolução do paciente</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'evolucoes.store', 'method' => 'POST',
                            'class' => 'form-horizontal form-label-left', 'data-parsley-validate']) !!}
                    <input value="{{$Paciente->idpaciente}}" type="hidden" name="idpaciente">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Data:</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input name="data_evolucao" class="form-control col-md-7 col-xs-12 data-to-now" required="required" type="text">
                            <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Evolução:</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <textarea name="texto" type="text" class="form-control" maxlength="1000" required="required"></textarea>
                            <span class="fa fa-bullhorn form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancelar</button>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<div class="x_title" style="margin-top:20px;">
    <h2>Evoluções</h2>
    <ul class="nav navbar-right panel_toolbox">
        <li>
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-plus-circle fa-2"></i> Adicionar evolução</button>
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
                            {{--<div class="byline">--}}
                            {{--<span>13 hours ago</span> by <a>Jane Smith</a>--}}
                            {{--</div>--}}
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
    {{--<!-- start accordion -->--}}
    {{--<div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">--}}
        {{--@if($Paciente->has_evolucao())--}}
            {{--@foreach($Paciente->evolucoes as $evolucao)--}}
                {{--<div class="panel">--}}
                    {{--<a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">--}}
                        {{--<h4 class="panel-title">{{$evolucao->data_evolucao}}</h4>--}}
                    {{--</a>--}}
                    {{--<div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">--}}
                        {{--<div class="panel-body">--}}
                            {{--<p><strong>{{$evolucao->profissional->nome}}</strong></p>--}}
                            {{--{{$evolucao->texto}}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--@endif--}}
    {{--</div>--}}
    {{--<!-- end of accordion -->--}}


</div>