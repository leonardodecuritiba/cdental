<?php

namespace App\Http\Controllers;

use App\Helpers\PrintHelper;
use App\Parcela;
use App\ParcelaPagamento;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use App\ItemOrcamento;
use App\Pagamento;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Orcamento;
use App\Http\Controllers\PacientesController;
use Illuminate\Http\Request;
use App\Http\Requests;

class PagamentoController extends Controller
{
    protected $Page;
    public function __construct()
    {
        $this->idprofissional_criador = Auth::user()->profissional->idprofissional;
        $this->Page = (object)[
            'link'      => 'orcamentos',
            'Targets'   => 'Orçamentos',
            'Target'    => 'Orçamento',
            'Titulo'    => 'Orçamento',
            'funcao'    => 'index'];
    }

    /*
    public function index(Request $request)
    {
        $this->Page->Titulo = "Busca de Intervenções";
        if(isset($request['busca'])){
            $busca = $request['busca'];
            $Buscas = Intervencao::where('nome', 'like', '%'.$busca.'%')
                ->orderBy('nome','ASC')
                ->get();
        } else {
            $Buscas = Intervencao::orderBy('nome','ASC')->get();
        }

        return view('pages.ajustes.'.$this->Page->link.'.index')
            ->with('Buscas', $Buscas)
            ->with('Page', $this->Page);
    }

    public function create()
    {
        $this->Page->Titulo = "Cadastro de Intervenções";
        $this->Page->funcao = "create";
        return view('pages.ajustes.'.$this->Page->link.'.master')
            ->with('Page', $this->Page);
    }

    public function edit($id)
    {
        $Intervencao = Intervencao::find($id);
        $this->Page->Titulo = "Edição de Intervenção";
        $this->Page->funcao = "edit";
        return view('pages.ajustes.'.$this->Page->link.'.master')
            ->with('Intervencao', $Intervencao)
            ->with('Page', $this->Page);
    }

    */
    public function update(Request $request)
    {
        $data=Orcamento::find($request['idconsulta']);
        $validator = Validator::make($request->all(), [
            'idpaciente'     => 'required',
            'dia_inteiro'    => 'required',
            'data_consulta'  => 'required',
            'tipo_consulta'  => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect('agenda')
                ->withErrors($validator)
                ->withInput();
        } else {

            //atualizar intervencao
            $dataUpdate = $request->all();

            if($dataUpdate['dia_inteiro']){
                $dataUpdate["hora_inicio"] = '00:00';
                $dataUpdate["hora_termino"] = '23:59';
            }
//            return $dataUpdate;
            $data->update($dataUpdate);
            session()->forget('mensagem');
            session(['mensagem' => $this->Page->Target.' atualizada!']);
            return redirect('agenda');
        }
    }
    
    public function store(Request $request)
    {
        $idpaciente = $request->get('idpaciente');
        $validator = Validator::make($request->all(), [
            'idpaciente'        => 'required',
            'descricao'         => 'required',
            'numero_parcelas'   => 'required',
            'idintervencao'     => 'required',
        ]);
        if ($validator->fails())
        {
            return redirect('pacientes/'.$idpaciente)
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $request->all();

            //fazer laço nas intervencoes
            //calcular valor total
            $data['valor_total'] = 0;
            foreach($data['idintervencao'] as $key => $intervencao){
                $value = str_replace('.','',$data["valor"][$key]);
                $data['valor_total'] += floatval(str_replace(',','.',$value));
            }
//            echo 'valor_total= '.$data['valor_total']."<br>";
            $data['desconto'] = ($data['desconto']!="")?$data['desconto']:0;
            $data['valor_entrada'] = ($data['valor_entrada']!="")?floatval(str_replace(',','.',str_replace('.','',$data["valor_entrada"]))):0;
            $data['numero_parcelas'] = intval($data['numero_parcelas']);
            $Orcamento = Orcamento::create($data);

            foreach($data['idintervencao'] as $key => $intervencao){
                $value = str_replace('.','',$data["valor"][$key]);
                $item = [
                    'idorcamento'   => $Orcamento->idorcamento,
                    'idintervencao' => $intervencao,
                    'regiao'        => $data["regiao"][$key],
                    'valor'         => floatval(str_replace(',','.',$value))
                ];
                $ItemOrcamento = ItemOrcamento::create($item);
            }
            /*
            //verificar se tem desconto. se tiver, calcular novo valor
            $valor_total_desconto = $data['valor_total'];
            //verificar se tem desconto. se tiver, calcular novo valor
            $valor_total_desconto = $data['valor_total'];
            if($request->has('desconto')){
                $valor_total_desconto -= ($valor_total_desconto * $data['desconto']/100);
                echo 'valor_total_desconto= '.$valor_total_desconto."<br>";
            }
            //verificar se tem entrada. se tiver calcular valor restante
            if($request->has('valor_entrada')){
                $value = str_replace('.','',$data["valor_entrada"]);
                $valor_total_desconto -= floatval(str_replace(',','.',$value));
                echo 'valor_total_desconto (com entrada) = '.$valor_total_desconto."<br>";
            }
            //verificar se tem parcelamento. se tiver, calcular valor de parcelas
            if($request->has('numero_parcelas')){
                $valor_total_final = floatval(str_replace(',','.',$value));
                echo 'valor_total_desconto (com entrada) = '.$valor_total_desconto."<br>";
            }
            */

            session()->forget('mensagem');
            session(['mensagem' => $this->Page->Target . ' cadastrado!']);
            return redirect('pacientes/'.$idpaciente);
        }

    }

    public function imprimir($id)
    {
        return PrintHelper::recibo(ParcelaPagamento::findOrFail($id));
    }

    public function estornar($idparcela)
    {
        $Parcela = Parcela::estornar($idparcela);
        session()->forget('mensagem');
        session(['mensagem' => 'Parcela cancelada!']);
        return redirect('pacientes/'.$Parcela->pagamento->idpaciente.'/financeiro');
    }

    public function pagar(Request $request)
    {
        $Parcela = Parcela::pagar($request->all());
        session()->forget('mensagem');
        session(['mensagem' => 'Pagamento efetuado!']);
        return redirect('pacientes/'.$Parcela->pagamento->idpaciente.'/financeiro');
    }

    public function destroy($id)
    {
        $data=Orcamento::find($id);
        $data->delete();
        return response()->json(['status' => '1',
            'response' => 'Removido com sucesso']);
    }
}
