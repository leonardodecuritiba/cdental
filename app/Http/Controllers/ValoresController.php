<?php

namespace App\Http\Controllers;

use App\Helpers\ExcelFile;
use App\Http\Requests\ValoresRequest;
use App\Models\Valores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ValoresController extends Controller
{
    protected $Page;

    public function __construct()
    {
        $this->Page = (object)[
            'link' => 'valores',
            'Targets' => 'Valores',
            'Target' => 'Valor',
            'Titulo' => 'Valor',
            'funcao' => 'index',
            'extras' => ''
        ];
    }

    public function index(Request $request, $tipo)
    {
        $request->merge(['tipo' => $tipo]);
        $this->Page->Titulo = "Busca de " . Valores::getTipo($tipo);
        $this->Page->Targets = Valores::getTipo($tipo);
        $this->Page->Target = $this->Page->Targets;
        $this->Page->extras = ['tipo' => $tipo];
        $Buscas = Valores::filter($request->all());

        return view('pages.' . $this->Page->link . '.index')
            ->with('Buscas', $Buscas)
            ->with('Page', $this->Page);
    }

    public function create($tipo)
    {
        $this->Page->Targets = Valores::getTipo($tipo);
        $this->Page->Target = $this->Page->Targets;
        $this->Page->Titulo = "Cadastro de " . $this->Page->Target;
        $this->Page->extras = ['tipo' => $tipo];
        $this->Page->funcao = "create";
        return view('pages.' . $this->Page->link . '.master')
            ->with('Page', $this->Page);
    }

    public function edit($id)
    {
        $Cheque = Valores::findOrFail($id);
        $this->Page->Target = $this->Page->Targets;
        $this->Page->Titulo = "Editar " . $this->Page->Target;
        $this->Page->funcao = "edit";
        return view('pages.' . $this->Page->link . '.master')
            ->with('Cheque', $Cheque)
            ->with('Page', $this->Page);
    }

    public function store(ValoresRequest $request)
    {
        //store Cheque
        $data = Valores::create($request->all());
        session()->forget('mensagem');
        session(['mensagem' => $this->Page->Target . ' adicionado com sucesso!']);
        return Redirect::route('valores.index', $data->getTipoName());

    }

    public function update(ValoresRequest $request, $id)
    {
        return $request->all();
        $Cheque = Valores::findOrFail($id);
        $Cheque->update($request->all());
        session()->forget('mensagem');
        session(['mensagem' => $this->Page->Target . ' atualizado com sucesso!']);
        return Redirect::route('cheques.index');

    }

    public function exportar(Request $request, ExcelFile $export)
    {
        $Cheques = Cheque::filter($request->all());
        return $export->sheet('sheetName', function ($sheet) use ($Cheques) {
            $dados = array(
                'ID',
                'Data',
                'Nome',
                'Valor',
                'Banco',
                'Número',
                'Plano',
                'Destino'
            );

            $sheet->row(1, $dados);
            $i = 2;
            foreach ($Cheques as $sel) {
                $sheet->row($i, array(
                    $sel->id,
                    $sel->getData(),
                    $sel->nome,
                    $sel->getValor(),
                    $sel->banco,
                    $sel->numeracao,
                    $sel->getNomePlano(),
                    $sel->destino,
                ));
                $i++;
            }
        })->export('xls');
    }

    public function destroy($id)
    {
        $data = Valores::find($id);
        $data->delete();
        return response()->json(['status' => '1',
            'response' => 'Removido com sucesso']);
    }
}
