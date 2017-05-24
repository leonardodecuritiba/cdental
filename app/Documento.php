<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documento';
    protected $primaryKey = 'iddocumento';
    protected $fillable = [
        'idprofissional_criador',
        'idpaciente',
        'documento'
    ];
    // ******************** FUNCTIONS ****************************
    public function getDocumentoThumb()
    {
        return asset('../storage/uploads/documentos/thumb_'.$this->documento);
    }
	// ******************** BELONGSTO ****************************
	// Relação orcamento - 1 <-> 1 - pagamento.
    public function paciente()
    {
        return $this->belongsTo('App\Paciente', 'idpaciente');
    }
    public function profissional_criador()
    {
        return $this->belongsTo('App\Profissional', 'idprofissional_criador', 'idprofissional');
    }
	
	// ******************** HASMANY ****************************
	// Relação pagamento - 1 <-> N - parcela.
}
