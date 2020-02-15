<?php

namespace App\Observers\Financials;

use App\Orcamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetObserver {

	protected $request;
	protected $table = 'orcamentos';

	public function __construct( Request $request ) {
		$this->request = $request;
	}
	/**
	 * Listen to the Provider created event.
	 *
	 * @param  Orcamento $orcamento
	 *
	 *
	 * @return void
	 */
	public function creating( Orcamento $orcamento ) {
        $orcamento->idprofissional = Auth::user()->profissional->idprofissional;
	}


	/**
	 * Listen to the Client updating event.
	 *
	 * @param  Orcamento $orcamento
	 *
	 * @return void
	 */
	public function saving( Orcamento $orcamento ) {

	}
	/**
	 * Listen to the Provider deleting event.
	 *
	 * @param  Orcamento $orcamento
	 *
	 * @return void
	 */
	public function deleting( Orcamento $orcamento ) {

	}
}
