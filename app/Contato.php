<?php

namespace App;

use App\Helpers\DataHelper;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contato';
    protected $primaryKey = 'idcontato';
    public $timestamps = true;
    protected $fillable = [
        'email',
        'telefone',
        'celular',
        'comercial',
        'cep',
        'estado',
        'cidade',
        'bairro',
        'logradouro',
        'complemento'
    ];

    public function getTelefoneAttribute($value)
    {
        return DataHelper::mask($value, '(##) ####-####');
    }
    public function getCelularAttribute($value)
    {
        return DataHelper::mask($value, '(##) #####-####');
    }
    public function getCepAttribute($value)
    {
        return DataHelper::mask($value, '#####-###');
    }
	// ******************** HASMANY ******************************
	// Relação contato - 1 <-> N - profissional.
    public function getCidadeEstado(){
        $retorno = [];
        if($this->cidade != ""){
            $retorno[] = $this->cidade;
        }
        if($this->estado != ""){
            $retorno[]= $this->estado;
        }
        if(count($retorno)>1){
            return implode(', ',$retorno);
        } else if(count($retorno) == 1){
            return $retorno[0];
        }
        return NULL;
    }

    public function getEnderecoCompleto(){
        $retorno = [];
        if($this->logradouro != ""){
            $retorno[] = $this->logradouro;
        }
        if($this->numero != ""){
            $retorno[]= $this->numero;
        }
        if($this->cidade != ""){
            $retorno[] = $this->cidade;
        }
        if($this->estado != ""){
            $retorno[]= $this->estado;
        }
        if(count($retorno)>1){
            $retorno = implode(', ',$retorno);
        } else if($retorno != NULL){
            $retorno = $retorno[0];
        }

        $fone = NULL;
        if($this->comercial != ""){
            $fone[] = $this->comercial;
        }
        if($this->telefone != ""){
            $fone[] = $this->telefone;
        }
        if($this->celular != ""){
            $fone[] = $this->celular;
        }
        if($this->celular != ""){
            $fone[] = $this->celular;
        }

        if(count($fone)>1){
            $fone = ' / '.implode('- ',$fone);
        } else if($fone != NULL){
            $fone = ' / '.$fone[0];
        }
        return $retorno.$fone;

    }

    public function profissional()
    {
        return $this->hasMany('App\Profissional', 'idprofissional');
    }
	// Relação contato - 1 <-> N - paciente.
    public function paciente()
    {
        return $this->hasMany('App\Paciente', 'idpaciente');
    }	
}
