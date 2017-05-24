<div class="x_title" style="margin-top:20px;">
    <h2>Dados pessoais (Cadastrado em {{$Paciente->created_at}})</h2>
    <ul class="nav navbar-right panel_toolbox">
        <li>
            {{Form::open(['route'=>['prontuario.imprimir',$Paciente->idpaciente], 'target'=>'_blank', 'method'=>'GET'])}}
            <button  class="btn btn-default">
                <i class="fa fa-print fa-2"></i> Imprimir Prontuário</button>
            {{Form::close()}}
        </li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    {!! Form::model($Paciente, ['method' => 'PATCH','route'=>[$Page->link.'.update',$Paciente->idpaciente],
        'files' => true, 'class' => 'form-horizontal form-label-left', 'data-parsley-validate']) !!}
        @include('pages.pacientes.form.cadastro')
        <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1">
                <button type="button" class="btn btn-round btn-danger">Cancelar</button>
                <button type="submit" class="btn btn-round btn-success">Salvar</button>
            </div>
        </div>
    {{ Form::close() }}
</div>