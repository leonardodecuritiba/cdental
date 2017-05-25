<tr>
    <td rowspan="3" colspan="3">
        {{--<img src="imgs/empresa.png">--}}
        <img src="{{($clinica->foto == NULL) ? 'imgs/empresa.png' : 'uploads/ajustes/' . $clinica->foto}}">
        {{--        <img src="{{$clinica->getFoto()}}">--}}
    </td>
    <td colspan="7">{{$clinica->nome}}</td>
</tr>
<tr>
    <td colspan="7">{{$clinica->contato->getEnderecoCompleto()}}</td>
</tr>
<tr>
    <td colspan="5">Emitido por: {{Auth::user()->nome()}}</td>
    <td colspan="2">Data: {{Carbon\Carbon::now()->format('d/m/Y')}}</td>
</tr>