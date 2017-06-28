<?php

namespace App;

use App\Helpers\DataHelper;
use Illuminate\Database\Eloquent\Model;

class ParcelaPagamento extends Model
{
    protected $table = 'parcela_pagamentos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idparcela',
        'idtipo_pagamento',
        'data_pagamento',
        'valor'
    ];


    // ******************** BELONGSTO ****************************
    // Relação ParcelaPagamento - 1 <-> N - parcela.
    static public function filter($data)
    {
        if (isset($data['data_inicial'])) {
            if (isset($data['idpaciente']) && ($data['idpaciente'] != '')) {
                $idsparcela = Parcela::whereIn('idparcela',
                    Pagamento::where('idpaciente', $data['idpaciente'])->pluck('idpagamento')
                )->pluck('idparcela');
            }
            if (isset($data['idprofissional']) && ($data['idprofissional'] != '')) {
                $idsparcela_pro = Parcela::whereIn('idparcela',
                    Pagamento::whereIn('idorcamento',
                        Orcamento::where('idprofissional', $data['idprofissional'])->pluck('idorcamento')
                    )->pluck('idpagamento')
                )->pluck('idparcela');
            }
            if (isset($idsparcela) && isset($idsparcela_pro) && ($idsparcela != NULL) && ($idsparcela_pro != NULL)) {
                $idsparcela = array_merge($idsparcela, $idsparcela_pro);
            } elseif (isset($idsparcela_pro) && $idsparcela_pro != NULL) {
                $idsparcela = $idsparcela_pro;
            }

            if (isset($idsparcela) && $idsparcela != NULL) {
                $query = self::whereIn('idparcela', $idsparcela)->whereBetween('data_pagamento', [
                    DataHelper::setDateToDateTime($data['data_inicial']),
                    DataHelper::setDateToDateTime($data['data_final'])
                ]);
            } else {
                $query = self::whereBetween('data_pagamento', [
                    DataHelper::setDateToDateTime($data['data_inicial']),
                    DataHelper::setDateToDateTime($data['data_final'])
                ]);
            }
        }

        return (isset($query) ? $query->get() : self::all());
    }
    static public function total_recebido()
    {
        return DataHelper::getFloat2RealMoney(self::sum('valor'));
    }

    static public function pagar($idparcela, $data)
    {
        return self::create([
            'idparcela' => $idparcela,
            'idtipo_pagamento' => $data['idtipo_pagamento'],
            'data_pagamento' => DataHelper::setDate($data['data_pagamento']),
            'valor' => $data['valor']
        ]);
    }


    static public function estornar($id)
    {
        $ParcelaPagamento = self::find($id);
        $ParcelaPagamento->delete();
        return $Parcela = $ParcelaPagamento->parcela;
    }

    static public function parcelasPagas($idparcelas)
    {
        return self::whereIn('idparcela', $idparcelas)->get()->map(function ($p) {
            $p->valor_formatado = $p->getValorReal();
            $p->data_pagamento_formatado = $p->getDataPagamento();
            return $p;
        });;
    }


    public function valor_extenso()
    {
        return DataHelper::extenso($this->attributes['valor'], true);
    }

    public function getValorReal()
    {
        return DataHelper::getFloat2RealMoney($this->attributes['valor']);
    }
    public function getDataPagamento()
    {
        return DataHelper::getPrettyDate($this->attributes['data_pagamento']);
    }
    public function parcela()
    {
        return $this->belongsTo('App\Parcela', 'idparcela');
    }

    public function paciente()
    {
        return $this->pagamento()->paciente;
    }

    public function pagamento()
    {
        return $this->parcela->pagamento;
    }

    public function profissional()
    {
        return $this->orcamento()->profissional;
    }

    public function orcamento()
    {
        return $this->pagamento()->orcamento;
    }
}
