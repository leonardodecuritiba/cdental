<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $table = 'plano';
    protected $primaryKey = 'idplano';
    protected $fillable = [
        'nome',
        'plano_status'
    ];

	// ******************** HASMANY ****************************
	// Relação plano - 1 <-> N - plano_intervencao.
    public function plano_intervencao()
    {
        return $this->hasMany('App\PlanoIntervencao', 'idplano');
    }
	// Relação plano - 1 <-> N - paciente.
    public function paciente()
    {
        return $this->belongsTo('App\Paciente', 'idpaciente');
    }	
	
}
