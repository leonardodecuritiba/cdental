<?php

namespace App\Http\Controllers;

use App\Clinica;
use App\Contato;
use App\Paciente;
use App\Consulta;
use App\Profissional;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;

class MasterController extends Controller
{
    private $tipo_consulta;
    private $idprofissional_criador;
    public function __construct()
    {
        $this->idprofissional_criador = Auth::user()->profissional->idprofissional;
        $this->tipo_consulta = array('Atendimento','Cirurgia','Emergência','Retorno');
    }
    public function home()
    {
        $this->tipo_consulta = array('Atendimento','Cirurgia','Emergência','Retorno');
        $Page = (object)['Targets'=>'Inteligência','Target'=>'Inteligência','Titulo'=> 'Inteligência',
            'Data' => [
                'ProximaConsulta' => Consulta::getProximaConsulta(),
                'ConsultasDoDia' => Consulta::getConsultasDoDia()
            ]
        ];
//        return $Page->Data;
        return view('pages.master.index')
            ->with('Page', $Page);
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
        return view('pages.master.recebimentos')
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
