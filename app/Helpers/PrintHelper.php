<?php

namespace App\Helpers;

use App\Clinica;
use App\Orcamento;
use App\Paciente;
use App\Parcela;
use App\ParcelaPagamento;
use App\Resposta;
use Carbon\Carbon;
//use \niklasravnsborg\LaravelPdf\Facades\PDF as PDF;
use \Barryvdh\DomPDF\Facade as PDF;
class PrintHelper {

    static public function recibo(ParcelaPagamento $ParcelaPagamento)
    {
//        return view('print.recibo')->with('parcela',$parcela);
        $pdf = PDF::loadView('print.recibo',['ParcelaPagamento'=>$ParcelaPagamento, 'clinica'=>Clinica::find(1)]);
        $hora = Carbon::now()->format('HidmY');
        $filename = 'recibo-'.$hora;
        return $pdf->stream($filename.'.pdf');
    }

    static public function prontuario(Paciente $paciente)
    {
//        return view('print.prontuario')->with('paciente',$paciente);
        $pdf = PDF::loadView('print.prontuario',['paciente'=>$paciente, 'clinica'=>Clinica::find(1)]);
        $hora = Carbon::now()->format('HidmY');
        $filename = 'prontuario-'.$paciente->nome.'-'.$paciente->idpaciente.'-'.$hora;
        return $pdf->stream($filename.'.pdf');
    }

    static public function anamnese($respostas)
    {
        $paciente = $respostas[0]->paciente;
        $pdf = PDF::loadView('print.anamnese',[
            'paciente'  => $paciente,
            'clinica'   => Clinica::find(1),
            'respostas' => $respostas
        ]);
        $hora = Carbon::now()->format('HidmY');
        $filename = 'anamnese-'.$paciente->nome.'-'.$paciente->idpaciente.'-'.$hora;
        return $pdf->stream($filename.'.pdf');
    }

    static public function orcamento(Orcamento $orcamento)
    {
        $paciente = $orcamento->paciente;
//        return view('print.prontuario')->with('paciente',$paciente);
        $pdf = PDF::loadView('print.orcamento',[
            'paciente'  => $paciente,
            'clinica'   => Clinica::find(1),
            'orcamento' => $orcamento
        ]);
        $hora = Carbon::now()->format('HidmY');
        $filename = 'orcamento-'.$paciente->nome.'-'.$paciente->idpaciente.'-'.$hora;
        return $pdf->stream($filename.'.pdf');
    }
}