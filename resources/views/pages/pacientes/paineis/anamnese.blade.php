<div class="x_title" style="margin-top:20px;">
    <h2>Anamnese</h2>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    @if($Anamneses->count()>0)
    {!! Form::open(['method' => 'PATCH','route'=>['respostas.update',$Paciente->idpaciente], 'class' => 'form-horizontal form-label-left']) !!}
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Modelo de anamnese:</label>
            <div class="col-md-5 col-sm-5 col-xs-12">
                <select id="idanamnese" name="idanamnese" class="form-control" required>
                    <option value="0">Selecione</option>
                    @foreach($Anamneses as $anamnese)
                        <?php
                        //guardando as perguntas para serem usadas no jquery
                        foreach($anamnese->perguntas as $pergunta){
                            $_PERGUNTAS_[$anamnese->idanamnese][] = $pergunta;
                        }
                        ?>
                        <option value="{{$anamnese->idanamnese}}">{{$anamnese->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12">
                <button type="submit" class="btn btn-round btn-success salvar-anamnese">Salvar</button>
                <a style="display: none;" target="_blank" class="btn btn-round btn-primary imprimir">Imprimir</a>
            </div>
        </div>
        <br>
        <?php
            foreach($_PERGUNTAS_ as $i => $perguntas){
                echo "<div data-id='".$i."' class='anamnese hide'>";
                    foreach($perguntas as $pergunta){
//                        echo 'id:'.$pergunta->idpergunta;
//                        echo ' idpaciente:'.$Paciente->idpaciente;
//                        echo ' resp:'.$pergunta->has_resposta($Paciente->idpaciente);
                        if($pergunta->has_resposta($Paciente->idpaciente)){
                            $resposta = $pergunta->resposta($Paciente->idpaciente);
//                            print_r($resposta->resposta);
                            $vetor_resposta['resposta'] = [0 => '',1 => '',2 => ''];
                            $vetor_resposta['resposta'][$resposta->resposta] = 'checked';
                            $vetor_resposta['texto_resposta'] = $resposta->texto_resposta;
                            $campo_idreposta = '<input type="hidden" name="resposta['.$pergunta->idpergunta.'][idresposta]" value="'.$resposta->idresposta.'"/>';
                        } else {
                            $vetor_resposta['resposta'] = [0 => '',1 => '',2 => ''];
                            $vetor_resposta['texto_resposta'] = '';
                            $campo_idreposta = '';
                        }

                        switch($pergunta->tipo_resposta){
                            case 0:{ //SIM/NÃO/NÃO SEI
                                echo '<div class="form-group">
                                        <input type="hidden" name="resposta['.$pergunta->idpergunta.'][tipo_resposta]" value="0"/>
                                        '.$campo_idreposta.'
                                        <label>'.$pergunta->texto_pergunta.'</label>
                                        <p>
                                            <input type="radio" class="flat" name="resposta['.$pergunta->idpergunta.'][resposta]" value="0" '.$vetor_resposta['resposta'][0].' />Não
                                            <input type="radio" class="flat" name="resposta['.$pergunta->idpergunta.'][resposta]" value="1" '.$vetor_resposta['resposta'][1].' />Sim
                                            <input type="radio" class="flat" name="resposta['.$pergunta->idpergunta.'][resposta]" value="2" '.$vetor_resposta['resposta'][2].' />Não Sei
                                        </p>
                                    </div>';
                                break;
                            }
                            case 1:{ //SIM/NÃO/NÃO SEI e TEXTO
                                echo '<div class="form-group">
                                        <input type="hidden" name="resposta['.$pergunta->idpergunta.'][tipo_resposta]" value="1"/>
                                        '.$campo_idreposta.'
                                        <label>'.$pergunta->texto_pergunta.'</label>
                                        <p>
                                            <input type="radio" class="flat" name="resposta['.$pergunta->idpergunta.'][resposta]" value="0" '.$vetor_resposta['resposta'][0].' />Não
                                            <input type="radio" class="flat" name="resposta['.$pergunta->idpergunta.'][resposta]" value="1" '.$vetor_resposta['resposta'][1].' />Sim
                                            <input type="radio" class="flat" name="resposta['.$pergunta->idpergunta.'][resposta]" value="2" '.$vetor_resposta['resposta'][2].' />Não Sei
                                        </p>
                                        <input type="text" name="resposta['.$pergunta->idpergunta.'][texto_resposta]" value="'.$vetor_resposta['texto_resposta'].'" class="form-control" placeholder="'.$pergunta->texto_pergunta.'"/>
                                    </div>';
                                break;
                            }
                            case 2:{  //TEXTO
                                echo '<div class="form-group">
                                        <input type="hidden" name="resposta['.$pergunta->idpergunta.'][tipo_resposta]" value="2"/>
                                        '.$campo_idreposta.'
                                        <label>'.$pergunta->texto_pergunta.'</label>
                                        <input type="text" name="resposta['.$pergunta->idpergunta.'][texto_resposta]" value="'.$vetor_resposta['texto_resposta'].'" class="form-control" placeholder="'.$pergunta->texto_pergunta.'"/>
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

<script>
$(document).ready(function(){

    $('div#tab_anamnese div.x_content form').on('submit', function(e) {
        // Prevent form submission
        e.preventDefault();

        var $form = $(e.target);
        // Use Ajax to submit form data
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: $form.serialize(),
            beforeSend: function(){
                $('div.loading').show();
            },
            success: function(json) {
                if(json.status == 1){
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
    $('select#idanamnese').change(function(){
        id = $(this).val();
        $a_imprimir = $(this).parents('div.form-group').find('a.imprimir');
        $a_imprimir.hide();
        if(id>0){
            var url = ("{{route('anamnese.imprimir',['idpaciente' => $Paciente->idpaciente,'idanamnese' =>  '_0_'])}}").replace('_0_',id);
            $a_imprimir.attr("href", url);
            $a_imprimir.show();
        }
        $form = $(this).parents('form');
        $($form).find('div.anamnese').addClass('hide');
        $($form).find('div[data-id="'+id+'"]').removeClass('hide');
    });
});
</script>