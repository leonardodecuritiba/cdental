<?php

namespace App;

use App\Helpers\DataHelper;
use App\Helpers\UploadHelper;
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
        return ($this->foto != NULL) ? UploadHelper::getFullPath('ajustes') . $this->foto : asset('imgs/empresa.png');
    }

    public function getFotoPrint()
    {
        return public_path(($this->foto != NULL) ? 'uploads/ajustes/' . $this->foto  : 'imgs/empresa.png');
    }

    public function getImpressoOrcamentoPath()
    {
        return public_path('imgs/impresso_orcamento.jpg');
        return asset('imgs/impresso_orcamento.jpg');
    }

    public function getThumbFoto()
    {
        return ($this->foto != NULL) ? UploadHelper::getFullThumbPath('ajustes') . $this->foto : asset('imgs/empresa.png');
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
