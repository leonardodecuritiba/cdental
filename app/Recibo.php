<?php
//
//namespace App;
//
//use Illuminate\Database\Eloquent\Model;
//
//class Recibo extends Model
//{
//    protected $table = 'recibo';
//    protected $primaryKey = 'idrecibo';
//    protected $fillable = [
//        'idparcela',
//        'data_recibo',
//        'valor',
//        'observacao',
//    ];
//
//	// ******************** BELONGSTO ****************************
//	// Relação recibo - 1 <-> N - recibo.
//    public function recibo()
//    {
//        return $this->belongsTo('App\Recibo', 'idrecibo');
//    }
//}
