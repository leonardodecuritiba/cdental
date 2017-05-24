@extends('layouts.template')
@section('page_content')
    @include('layouts.modals.modalRetorno')
    @include('layouts.search.form')
    @if(count($Buscas) > 0)
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    {{--<div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">--}}
                    {{--<ul class="pagination pagination-split">--}}
                    {{--<li><a href="#">A</a></li>--}}
                    {{--<li><a href="#">B</a></li>--}}
                    {{--<li><a href="#">C</a> </li>--}}
                    {{--<li><a href="#">D</a></li>--}}
                    {{--<li><a href="#">E</a></li>--}}
                    {{--<li><a href="#">F</a></li>--}}
                    {{--<li><a href="#">G</a></li>--}}
                    {{--<li><a href="#">H</a></li>--}}
                    {{--<li><a href="#">I</a></li>--}}
                    {{--<li><a href="#">J</a></li>--}}
                    {{--<li><a href="#">K</a></li>--}}
                    {{--<li><a href="#">L</a></li>--}}
                    {{--<li><a href="#">M</a></li>--}}
                    {{--<li><a href="#">N</a></li>--}}
                    {{--<li><a href="#">O</a></li>--}}
                    {{--<li><a href="#">P</a></li>--}}
                    {{--<li><a href="#">Q</a></li>--}}
                    {{--<li><a href="#">R</a></li>--}}
                    {{--<li><a href="#">S</a></li>--}}
                    {{--<li><a href="#">T</a></li>--}}
                    {{--<li><a href="#">U</a></li>--}}
                    {{--<li><a href="#">V</a></li>--}}
                    {{--<li><a href="#">X</a></li>--}}
                    {{--<li><a href="#">W</a> </li>--}}
                    {{--<li><a href="#">X</a></li>--}}
                    {{--<li><a href="#">Y</a></li>--}}
                    {{--<li><a href="#">Z</a></li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="clearfix"></div>--}}
                    @foreach($Buscas as $paciente)
                        <div class="col-md-4 col-sm-6 col-xs-12 profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <div class="left col-xs-7">
                                        <h2>{{$paciente->nome}}</h2>
                                        <ul class="list-unstyled">
                                            @if($paciente->hasIdade())
                                                <li><i class="fa fa-user"></i> Idade: {{$paciente->getIdade()}} anos</li>
                                            @endif
                                            @if($paciente->has_retorno())
                                                <li>
                                                    <i class="fa fa-calendar"></i> Retorno: {{$paciente->getLastRetorno()->data_retorno}}
                                                </li>
                                            @endif
                                            <li>
                                                <button type="button" class="btn btn-info btn-xs add-retorno"
                                                        data-idpaciente="{{$paciente->idpaciente}}"
                                                        data-toggle="modal"
                                                        data-target="#modalRetorno">
                                                    <i class="fa fa-plus"></i> Agendar retorno
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        <img src="{{$paciente->getFoto()}}" alt="" class="img-circle img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                        <p class="ratings">
                                            <a>Cadastro</a>
                                            {{$paciente->created_at}}
                                        </p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                        <a href="{{route('pacientes.show',$paciente->idpaciente)}}" class="btn btn-primary btn-xs">
                                            <i class="fa fa-user"></i> Prontuário
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row pull-right">
                    {!! $Buscas->appends(Request::only('busca'))->links() !!}
                </div>
                {{--<ul class="pagination">--}}
                {{--<li><a href="#">1</a></li>--}}
                {{--<li><a href="#">2</a></li>--}}
                {{--<li><a href="#">3</a></li>--}}
                {{--<li><a href="#">4</a></li>--}}
                {{--<li><a href="#">5</a></li>--}}
                {{--<li><a href="#">6</a></li>--}}
                {{--<li><a href="#">7</a></li>--}}
                {{--<li><a href="#">8</a></li>--}}
                {{--<li><a href="#">9</a></li>--}}
                {{--<li><a href="#">10</a></li>--}}
                {{--</ul>--}}
            </div>
        </div>
    @else
        @include('layouts.search.no-results')
    @endif
@endsection

@section('scripts_content')
    <script>
        $(document).ready(function () {
            $('div#modalRetorno').on('show.bs.modal', function(e) {
                $origem = $(e.relatedTarget);
                idpaciente_ = $($origem).data('idpaciente');
                $(this).find('.modal-body input#idpaciente').val(idpaciente_);
            });
        });
    </script>
@endsection