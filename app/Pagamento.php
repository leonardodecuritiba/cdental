<?php

namespace App;

use App\Helpers\DataHelper;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $table = 'pagamento';
    protected $primaryKey = 'idpagamento';
    protected $fillable = [
        'idorcamento',
        'idpaciente',
        'pagamento'
    ];
    // ******************** FUNCTIONS ****************************
    /*
    */

    public function getStatusText()
    {
        $abertas = $this->parcelas()->where('pago',0)->count();
        return ($abertas > 0) ? 'Aguardando pagamento' : 'Recebido';
    }

    public function parcelas()
    {
        return $this->hasMany('App\Parcela', 'idpagamento');
    }

    public function valores_total_parcelas($float=false)
    {
        $valores = $this->parcelas->map(function ($parcela) {
            //total, pago, pendente, vencimento
            return [
                'valor_pago' => $parcela->getValorPago(),
                'valor_pendente' => $parcela->getValorPendente(),
            ];
        });
        if($float){
            $retorno = (object)[
                'valor_pago' => $valores->sum('valor_pago'),
                'valor_pendente' => $valores->sum('valor_pendente')
            ];
        } else {
            $retorno = (object)[
                'valor_pago' => DataHelper::getFloat2RealMoney($valores->sum('valor_pago')),
                'valor_pendente' => DataHelper::getFloat2RealMoney($valores->sum('valor_pendente')),
            ];
        }

        return $retorno;
    }

    public function parcelas_pagas()
    {
        return $this->parcelas->where('pago', 1)->map(function ($parcela) {
            $parcela->valor_formatado = $parcela->getValorTotalReal();
            return $parcela;
        });
    }
	// ******************** BELONGSTO ****************************
	// Relação orcamento - 1 <-> 1 - pagamento.

    public function parcelas_pendentes()
    {
        return $this->parcelas->where('pago', 0)->map(function ($parcela) {
            $parcela->valor_formatado = $parcela->getValorTotalReal();
            return $parcela;
        });
    }

    public function orcamento()
    {
        return $this->belongsTo('App\Orcamento', 'idorcamento');
    }

    // ******************** HASMANY ****************************
	// Relação pagamento - 1 <-> N - parcela.

    public function paciente()
    {
        return $this->belongsTo('App\Paciente', 'idpaciente');
    }

    public function parcelas_json()
    {
        return $this->parcelas->map(function ($parcela) {
            //total, pago, pendente, vencimento
            $parcela->valor_total = $parcela->getValorTotalReal();
            $parcela->valor_pago = $parcela->getValorPagoReal();
            $parcela->valor_pendente = $parcela->getValorPendenteReal();
            $parcela->valor_total_float = $parcela->valor;
            $parcela->valor_pago_float = $parcela->getValorPago();
            $parcela->valor_pendente_float = $parcela->getValorPendente();
            $parcela->parcela_pagamentos = $parcela->parcela_pagamentos->map(function ($pagamento) {
                //total, pago, pendente, vencimento
                $pagamento->valor = $pagamento->getValorReal();
                $pagamento->data_pagamento = $pagamento->getDataPagamento();
                return $pagamento;
            });
            return $parcela;
        });
    }
}
