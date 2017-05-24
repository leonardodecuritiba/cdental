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
    static public function pagar($idparcela, $data)
    {
        return self::create([
            'idparcela' => $idparcela,
            'idtipo_pagamento' => $data['idtipo_pagamento'],
            'data_pagamento' => DataHelper::setDate($data['data_pagamento']),
            'valor' => $data['valor']
        ]);
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
}
