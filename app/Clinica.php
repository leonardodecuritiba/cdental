<?php

namespace App;

use App\Helpers\DataHelper;
use App\Helpers\ImageHelper;
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
        'foto',
        'nome'
    ];

    public function getFoto()
    {
        return ($this->foto != NULL) ? ImageHelper::getFullPath('ajustes') . $this->foto : asset('imgs/empresa.png');
    }

    public function getImpressoOrcamentoPath()
    {
        return asset('imgs/impresso_orcamento.jpg');
//        return DIRECTORY_SEPARATOR . 'home'
//            . DIRECTORY_SEPARATOR . 'drvinici'
//            . DIRECTORY_SEPARATOR . 'public_html'
//            . DIRECTORY_SEPARATOR . 'cdental'
//            . DIRECTORY_SEPARATOR . 'imgs'
//            . DIRECTORY_SEPARATOR . 'impresso_orcamento.jpg';
    }

//    public function getFotoPath()
//    {
//        if ($this->foto != NULL) {
//            $dir = DIRECTORY_SEPARATOR . 'home'
//                . DIRECTORY_SEPARATOR . 'drvinici'
//                . DIRECTORY_SEPARATOR . 'public_html'
//                . DIRECTORY_SEPARATOR . 'cdental'
//                . DIRECTORY_SEPARATOR . 'imgs'
//                . DIRECTORY_SEPARATOR . 'uploads'
//                . DIRECTORY_SEPARATOR . 'ajustes';
//            return $dir . $this->foto;
//        } else {
//            $dir = DIRECTORY_SEPARATOR . 'home'
//                . DIRECTORY_SEPARATOR . 'drvinici'
//                . DIRECTORY_SEPARATOR . 'public_html'
//                . DIRECTORY_SEPARATOR . 'cdental'
//                . DIRECTORY_SEPARATOR . 'imgs'
//                . DIRECTORY_SEPARATOR;
//
//            return $dir . 'empresa.png';
//        }
//    }

    public function getThumbFoto()
    {
        return ($this->foto != NULL) ? ImageHelper::getFullThumbPath('ajustes') . $this->foto : asset('imgs/empresa.png');
    }

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
