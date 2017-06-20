<?php

namespace App\Http\Controllers;

use App\Clinica;
use App\Contato;
use App\Helpers\ImageHelper;
use App\Paciente;
use App\Consulta;
use App\Parcela;
use App\ParcelaPagamento;
use App\Profissional;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;

class MasterController extends Controller
{
    private $tipo_consulta;
    private $backup_path;
    private $idprofissional_criador;
    public function __construct()
    {
        $this->idprofissional_criador = Auth::user()->profissional->idprofissional;
        $this->tipo_consulta = array('Atendimento','Cirurgia','Emergência','Retorno');
        $this->backup_path = DIRECTORY_SEPARATOR . 'home'
            . DIRECTORY_SEPARATOR . 'drvinici'
            . DIRECTORY_SEPARATOR . 'public_html'
            . DIRECTORY_SEPARATOR . 'cdental'
            . DIRECTORY_SEPARATOR . 'backups'
            . DIRECTORY_SEPARATOR . config('app.url');
//        $path = public_path('backups' . DIRECTORY_SEPARATOR . config('app.url'));
//        $path = storage_path('backups' . DIRECTORY_SEPARATOR . config('app.url'));
    }
    public function home()
    {
        $this->tipo_consulta = array('Atendimento','Cirurgia','Emergência','Retorno');
        $Page = (object)['Targets'=>'Inteligência','Target'=>'Inteligência','Titulo'=> 'Inteligência',
            'Data' => [
                'ProximaConsulta' => Consulta::getProximaConsulta(),
                'ConsultasDoDia' => Consulta::getConsultasDoDia(),
                'ParcelaVencidas' => Parcela::vencidas()->orderBy('data_vencimento')->get()
            ]
        ];
        return view('pages.master.index')
            ->with('Page', $Page);
    }

    public function backups()
    {
        $Page = (object)['Targets' => 'Backups', 'Target' => 'Backup', 'Titulo' => 'Backup'];
        $Backups = File::allFiles($this->backup_path);

        return view('pages.master.backups')
            ->with('Backups', $Backups)
            ->with('Page', $Page);
    }

    public function functionBackup($option)
    {
        set_time_limit(0);
        Artisan::call('backup:' . $option);
        session()->forget('mensagem');
        session(['mensagem' => (($option == 'clean') ? 'Backup limpo com sucesso!' : 'Novo Backup realizado com sucesso!')]);
        return Redirect::route('backups.index');
    }

    public function destroyBackup($file)
    {
//        dd($this->backup_path . DIRECTORY_SEPARATOR . $file);
        array_map('unlink', glob($this->backup_path . DIRECTORY_SEPARATOR . $file));
        session()->forget('mensagem');
        session(['mensagem' => 'Backup removido com sucesso!']);
        return Redirect::route('backups.index');
    }

    public function agenda()
    {
        $Consultas = Consulta::all()->map(function($consulta){
            $consulta->data = json_encode($consulta);
            $consulta->title = $consulta->getNome().' '.$consulta->getTelefone();
            $consulta->start = $consulta->data_consulta_inicio_date();
            $consulta->end = $consulta->data_consulta_termino();
            $consulta->allDay = $consulta->dia_inteiro;
           return $consulta;
        });

//        return $Consultas;

        $Page = (object)[
            'Targets'       => 'Agendamento',
            'Target'        => 'Agendamento',
            'Consultas'     => $Consultas,
            'Pacientes'     => Paciente::all(),
            'Profissionais' => Profissional::all(),
            'TipoConsultas' => $this->tipo_consulta,
            'Titulo'        => 'Agendamento'];
        return view('pages.master.agenda')
            ->with('Page', $Page);
    }

    public function recebimentos()
    {
        $Page = (object)['Targets'=>'Recebimentos','Target'=>'Recebimentos','Titulo'=> 'Recebimentos'];
        $Resumo = [
            'total_recebido' => ParcelaPagamento::total_recebido(),
            'total_pendente' => Parcela::total_receber(),
        ];
        $Buscas = ParcelaPagamento::all();
        return view('pages.master.recebimentos')
            ->with('Resumo', $Resumo)
            ->with('Buscas', $Buscas)
            ->with('Page', $Page);
    }

    public function recibos()
    {
        $Page = (object)['Targets'=>'Recibos','Target'=>'Recibos','Titulo'=> 'Recibos'];
        return view('pages.master.recibos')
            ->with('Page', $Page);
    }

    public function editar_perfil()
    {
        $Page = (object)['Targets'=>'Editar','Target'=>'Editar','Titulo'=> 'Editar'];
        return view('pages.master.editar_perfil')
            ->with('Page', $Page);
    }

    public function clinica()
    {
        $Page = (object)['Targets'=>'Clinica','Target'=>'Clinica','Titulo'=> 'Clínica','link'=> 'clinica'];
        $Page->Estados = parent::$Estados;
        return view('pages.master.clinica')
            ->with('Page', $Page)
            ->with('Clinica', Clinica::first())
            ->with('Profissionais', Profissional::all());
    }
    public function clinica_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cnpj'              => 'required|unique:clinica',
            'email'             => 'required|unique:clinica',
            'nome'              => 'required',
            'idresponsavel'     => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $request->all();
            //store CONTATO
            $Contato = Contato::create($data);

            //store CLINICA
            $data['idcontato'] = $Contato->idcontato;
            if ($request->hasfile('foto')) {
                $img = new ImageHelper();
                $data['foto'] = $img->store($request->file('foto'), 'ajustes');
            } else {
                $data['foto'] = NULL;
            }
            $Clinica = Clinica::create($data);

            session()->forget('mensagem');
            session(['mensagem' => 'Clínica adicionada com sucesso!']);
            return Redirect::route('clinica');
        }
    }

    public function clinica_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'cnpj'              => 'unique:clinica,cnpj,'.$id.',idclinica',
            'email'             => 'unique:clinica,email,'.$id.',idclinica',
            'nome'              => 'required',
            'idresponsavel'     => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $dataUpdate = $request->all();
            $Clinica = Clinica::find($id);

            if ($request->hasfile('foto')) {
                $img = new ImageHelper();
                $dataUpdate['foto'] = $img->update($request->file('foto'), 'ajustes', $Clinica->foto);
            }
            $Clinica->update($dataUpdate);
            $Clinica->contato->update($dataUpdate);

            session()->forget('mensagem');
            session(['mensagem' => 'Clínica atualizada com sucesso!']);
            return Redirect::route('clinica');
        }
    }

    public function login()
    {
        $Page = (object)['Targets'=>'Login','Target'=>'Login','Titulo'=> 'Login'];
        return view('pages.master.login')
            ->with('Page', $Page);
    }

}
