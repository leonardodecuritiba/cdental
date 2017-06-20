<?php

namespace App;

use App\Helpers\DataHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    protected $table = 'parcela';
    protected $primaryKey = 'idparcela';
    protected $fillable = [
        'idpagamento',
        'idtipo_pagamento',
        'numero',
        'pago',
        'data_vencimento',
        'data_pagamento',
        'valor'
    ];

    // ******************** FUNCTIONS ****************************

    static public function total_receber()
    {
        return DataHelper::getFloat2RealMoney(self::where('pago', 0)->sum('valor'));
    }

    static public function total_recebido()
    {
        return DataHelper::getFloat2RealMoney(self::where('pago', 1)->sum('valor'));
    }
    static public function pagar($data)
    {
        $Parcela = self::find($data['idparcela']);
        $data['valor'] = DataHelper::getReal2Float($data['valor']);
        $pendente = $Parcela->getValorPendente();
        if($data['valor'] >= $pendente){
            //pagou tudo
            $data['valor'] = $pendente;
            ParcelaPagamento::pagar($data['idparcela'], $data);
            $Parcela->update([
                'pago' => 1,
                'data_pagamento' => DataHelper::setDate($data['data_pagamento']),
            ]);
        } else {
            //nao pagou tudo
            ParcelaPagamento::pagar($Parcela->idparcela, $data);
        }
        return $Parcela;
    }

    static public function alterarVencimento($data)
    {
        $Parcela = self::find($data['idparcela']);
        $Parcela->update([
            'data_vencimento' => DataHelper::setDate($data['data_vencimento']),
        ]);
        return $Parcela;
    }

    static public function estornar($idparcela)
    {
        $Parcela = self::find($idparcela);
        $Parcela->update([
            'pago' => 0,
            'data_pagamento' => NULL,
        ]);
        foreach($Parcela->parcela_pagamentos as $pagamento){
            $pagamento->delete();
        }
        return $Parcela;
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVencidas($query)
    {
        return $query->where('pago', 0)
            ->whereNull('data_pagamento')
            ->where('data_vencimento', '<=', Carbon::now());
    }

    public function paciente()
    {
        return $this->pagamento->paciente();
    }

    public function getDataVencimentoAttribute($value)
    {
        if($value != NULL && $value != 0)
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
        else
            return '-';
    }

    public function getDataPagamentoAttribute($value)
    {
        if($value != NULL && $value != 0)
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
        else
            return '-';
    }

    public function getValorTotalReal()
    {
        return DataHelper::getFloat2RealMoney($this->attributes['valor']);
    }

    public function getValorPagoReal()
    {
        return DataHelper::getFloat2RealMoney($this->getValorPago());
    }

    public function getValorPago()
    {
        return $this->parcela_pagamentos->sum('valor');
    }

    public function getValorPendenteReal()
    {
        return DataHelper::getFloat2RealMoney($this->getValorPendente());
    }

    public function getValorPendente()
    {
        return $this->attributes['valor'] - $this->getValorPago();
    }


	// ******************** BELONGSTO ****************************
	// Relação pagamento - 1 <-> N - parcela.

    public function pagamento()
    {
        return $this->belongsTo('App\Pagamento', 'idpagamento');
    }
	// Relação tipo_pagamento - 1 <-> N - parcela.
    public function tipo_pagamento()
    {
        return $this->belongsTo('App\TipoPagamento', 'idtipo_pagamento');
    }	
	
	// ******************** HASONE ******************************
	// Relação parcela - 1 <-> 1 - recibo.
    public function recibo()
    {
        return $this->hasOne('App\Recibo', 'idrecibo');
    }
    public function parcela_pagamentos()
    {
        return $this->hasMany('App\ParcelaPagamento', 'idparcela');
    }
}
