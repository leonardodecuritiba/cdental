<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
//Route::get('login', 'MasterController@login');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'MasterController@home');
    Route::get('home', 'MasterController@home');
    Route::get('agenda', 'MasterController@agenda');

//Financeiro
    Route::get('editar_perfil', 'MasterController@editar_perfil');
    Route::get('clinica', 'MasterController@clinica')->name('clinica');
    Route::post('clinica/store', 'MasterController@clinica_store')->name('clinica.store');
    Route::post('clinica/{idclinica}/update', 'MasterController@clinica_update')->name('clinica.update');

//Financeiro
    Route::get('recebimentos', 'MasterController@recebimentos');
    Route::get('recibos', 'MasterController@recibos');

//Ajustes
    Route::resource('planos', 'PlanoController');
    Route::resource('plano_intervencao', 'PlanoIntervencaoController');
    Route::resource('intervencoes', 'IntervencaoController');
    Route::resource('caixas', 'CaixaController');
    Route::resource('anamneses', 'AnamneseController');
    Route::resource('perguntas', 'PerguntaController');
    Route::resource('respostas', 'RespostaController');
        Route::get('respostas/imprimir/{idpaciente},{idanamnese}', 'RespostaController@imprimir')->name('anamnese.imprimir');

    Route::resource('evolucoes', 'EvolucaoController');
    Route::resource('retornos', 'RetornoController');
    Route::resource('consultas', 'ConsultaController');
    Route::post('consultas._update', 'ConsultaController@update')->name('consultas._update');
    Route::get('remove/consultas/{id}', 'ConsultaController@remove')->name('consultas._remove');
    Route::get('updateDateTime', 'ConsultaController@updateDateTime');

    Route::resource('orcamentos', 'OrcamentoController');
    Route::get('orcamento/aprovar/{idorcamento}', 'OrcamentoController@aprovar')->name('orcamento.aprovar');
    Route::get('remove/item_orcamento/{id}', 'OrcamentoController@destroy_item')->name('item_orcamento.remove');
        Route::get('orcamento/imprimir/{idorcamento}', 'OrcamentoController@imprimir')->name('orcamento.imprimir');


    Route::post('pagar/parcelas', 'PagamentoController@pagar')->name('parcelas.pagar');
    Route::get('parcelas/estornar/{idparcela}', 'PagamentoController@estornar')->name('parcelas.estornar');

    Route::resource('pacientes', 'PacientesController');
    Route::get('pacientes/{idparcela}/{tab}', 'PacientesController@show')->name('pacientes.tab');
    Route::post('documentos/pacientes/store', 'PacientesController@documentosStore')->name('documentos.pacientes.store');
    Route::get('alertas/{idpaciente}/pacientes', 'PacientesController@alertas_paciente')->name('alertas.pacientes');

    Route::resource('documentos', 'DocumentoController');

    Route::resource('usuarios', 'UserController');
        Route::post('pwd/{user}/usuarios', 'UserController@upd_pass')->name('usuarios.upd_pass');
        Route::get('active/{user}/ususuariosers', 'UserController@active')->name('usuarios.active');
        Route::get('destroy/{user}/usuarios', 'UserController@destroy')->name('usuarios.destroy');

    Route::get('imprimir/pagamento/{id}', 'PagamentoController@imprimir')->name('pagamento.imprimir');
    Route::get('imprimir/prontuario/{idpaciente}', 'PacientesController@imprimir')->name('prontuario.imprimir');



    Route::get('ajax', 'AjaxController@ajax');
    Route::get('teste', function(){
        return \App\Pagamento::find(1)->parcelas_json();
//
//        $data = [
//            'foo' => 'bar'
//        ];
//        $pdf = \niklasravnsborg\LaravelPdf\Facades\Pdf::loadView('print.print', $data);
//        return $pdf->download('document.pdf');

//        $pdf = App::make('dompdf.wrapper');
//        $pdf->loadHTML('<h1>Test</h1>');
//        return $pdf->stream();
    });

    /*---- teste email ----*/
    Route::get('sendemail', function () {

        $user = array(
            'email' => "silva.zanin@gmail.com",
            'name' => "LEO",
            'mensagem' => "olá",
        );

        Mail::raw($user['mensagem'], function ($message) use ($user) {
            $message->to($user['email'], $user['name'])->subject('Welcome!');
            $message->from('sac@restaurantesopeixe.com.br', 'Atendimento SÓPEIXE');
        });

        return "Your email has been sent successfully";

    });

});