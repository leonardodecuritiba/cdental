@extends('layouts.template')
@section('style_content')
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
@section('page_content')
    @include('layouts.modals.exclui')
    <!-- mascaras -->
    <!-- Modal alertas -->
    <div class="modal fade" id="modalAlertas" tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Alertas do paciente</h4>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Prontuário - {{$Paciente->nome}}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <button class="btn btn-danger"
                            data-toggle="modal"
                            data-target="#modalAlertas"><i class="fa fa-exclamation-triangle fa-2"></i> Alertas</button>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                @include('pages.pacientes.paineis.perfil')
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" @if($Page->tab == 'sobre')class="active" @endif><a href="#tab_sobre" role="tab" data-toggle="tab" aria-expanded="true">Sobre</a></li>
                        <li role="presentation" @if($Page->tab == 'evolucoes')class="active" @endif><a href="#tab_evolucoes" role="tab" data-toggle="tab" aria-expanded="false">Evoluções</a></li>
                        <li role="presentation" @if($Page->tab == 'anamnese')class="active" @endif><a href="#tab_anamnese" role="tab" data-toggle="tab" aria-expanded="false">Anamnese</a></li>
                        @role('profissional')
                        <li role="presentation" @if($Page->tab == 'orcamentos')class="active" @endif><a href="#tab_orcamentos" role="tab" data-toggle="tab" aria-expanded="false">Orçamentos</a></li>
                        <li role="presentation" @if($Page->tab == 'financeiro')class="active" @endif><a href="#tab_financeiro" role="tab" data-toggle="tab" aria-expanded="false">Financeiro</a></li>
                        @endrole
                        <li role="presentation" @if($Page->tab == 'documentos')class="active" @endif><a href="#tab_documentos" role="tab" data-toggle="tab" aria-expanded="false">Documentos</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane @if($Page->tab == 'sobre')active in @endif fade" id="tab_sobre" aria-labelledby="home-tab">
                            @include('pages.pacientes.paineis.sobre')
                        </div>
                        <div role="tabpanel" class="tab-pane @if($Page->tab == 'evolucoes')active in @endif fade" id="tab_evolucoes" aria-labelledby="profile-tab">
                            @include('pages.pacientes.paineis.evolucoes')
                        </div>
                        <div role="tabpanel" class="tab-pane @if($Page->tab == 'anamnese')active in @endif fade" id="tab_anamnese" aria-labelledby="profile-tab">
                            @include('pages.pacientes.paineis.anamnese')
                        </div>
                        <div role="tabpanel" class="tab-pane @if($Page->tab == 'orcamentos')active in @endif fade" id="tab_orcamentos" aria-labelledby="profile-tab">
                            @include('pages.pacientes.paineis.orcamentos')
                        </div>
                        <div role="tabpanel" class="tab-pane @if($Page->tab == 'financeiro')active in @endif fade" id="tab_financeiro" aria-labelledby="profile-tab">
                            @include('pages.pacientes.paineis.financeiro')
                        </div>
                        <div role="tabpanel" class="tab-pane @if($Page->tab == 'documentos')active in @endif fade" id="tab_documentos" aria-labelledby="profile-tab">
                            @include('pages.pacientes.paineis.documentos')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
@endsection


