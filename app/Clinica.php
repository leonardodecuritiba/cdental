<?php

namespace App;

use App\Helpers\DataHelper;
use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    protected $table = 'clinica';
    protected $primaryKey = 'idclinica';
    protected $fillable = [
        'idresponsavel',
        'idcontato',
        'cnpj',
        'email',
        'nome'
    ];

    public function getCreatedAtAttribute($value)
    {
        return DataHelper::getPrettyDateTime($value);
    }

    public function profissional()
    {
        return $this->belongsTo('App\Profissional', 'idresponsavel', 'idprofissional');
    }
    public function contato()
    {
        return $this->belongsTo('App\Contato', 'idcontato');
    }
}
