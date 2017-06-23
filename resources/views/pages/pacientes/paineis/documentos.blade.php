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