<?php

use Illuminate\Database\Seeder;

class TesteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //    php artisan db:seed --class=TesteSeeder
    public function run()
    {
        // Intervenções de teste
        DB::table('intervencao')->insert(['codigo' => '12341','nome' => 'Tirar dente 1', 'regiao' => 'D1','valor' => 500]); // idintervencao = 1
        DB::table('intervencao')->insert(['codigo' =>  '12a341','nome' => 'Tirar dente 2', 'regiao' => 'D2','valor' => 780]); // idintervencao = 2
        DB::table('intervencao')->insert(['codigo' =>  '123sd41','nome' => 'Tirar dente 20', 'regiao' => 'D20','valor' => 800]); // idintervencao = 3

        // Planos de teste
        DB::table('plano')->insert(['nome' => 'Plano desabilitado', 'plano_status' => 0]); // idplano = 1
        DB::table('plano')->insert(['nome' => 'Unimed', 'plano_status' => 1]); // idplano = 2
        DB::table('plano')->insert(['nome' => 'Amil', 'plano_status' => 1]); // idplano = 3
        DB::table('plano')->insert(['nome' => 'Sem plano', 'plano_status' => 1]); // idplano = 4

        // Plano-Intervenção de teste (Para o plano UNIMED)
        DB::table('plano_intervencao')->insert([
            'idintervencao' => 1, 'idplano' => 2,'valor_plano' => 300]);
        DB::table('plano_intervencao')->insert([
            'idintervencao' => 2, 'idplano' => 2,'valor_plano' => 480]);
        DB::table('plano_intervencao')->insert([
            'idintervencao' => 3, 'idplano' => 2,'valor_plano' => 400]);

        // Plano-Intervenção de teste (Para o plano AMIL)
        DB::table('plano_intervencao')->insert([
            'idintervencao' => 1, 'idplano' => 3,'valor_plano' => 400]);
        DB::table('plano_intervencao')->insert([
            'idintervencao' => 2, 'idplano' => 3,'valor_plano' => 580]);
        DB::table('plano_intervencao')->insert([
            'idintervencao' => 3, 'idplano' => 3,'valor_plano' => 500]);

        // Plano-Intervenção de teste (Para o plano SEM PLANO)
        DB::table('plano_intervencao')->insert([
            'idintervencao' => 1, 'idplano' => 3,'valor_plano' => 0]);
        DB::table('plano_intervencao')->insert([
            'idintervencao' => 2,'idplano' => 3,'valor_plano' => 0]);
        DB::table('plano_intervencao')->insert([
            'idintervencao' => 3, 'idplano' => 3,'valor_plano' => 0]);

        // Users de teste
        DB::table('contato')->insert(['cep' => '0000001', 'estado' => 'PR',
            'cidade' => 'CURITIBA', 'bairro' => 'HAUER', 'logradouro' => 'RUA PROFISSIONAL', 'complemento' => 'CASA 2',
            'telefone' => '53334444', 'celular' => '89998888']);
        DB::table('users')->insert(['email' => 'secretaria01@email.com', 'password' => bcrypt('123'), 'remember_token' => str_random(10)]);
        // Profissional de teste
        DB::table('profissional')->insert(['idusers' => 3, 'idcontato' => 3, 'nome' => 'Profissional 2','cpf' => '44433221100', 'foto'=>NULL]);
        $user = \App\User::find(3);
        $user->attachRole(1); // parameter can be an Role object, array, or id

        // Paciente ---
        DB::table('contato')->insert(['cep' => '0000002', 'estado' => 'PR',
            'cidade' => 'CURITIBA', 'bairro' => 'HAUER', 'logradouro' => 'RUA PACIENTE 1',  'complemento' => 'CASA 1',
            'telefone' => '53334444', 'celular' => '89998888']);
        DB::table('paciente')->insert(['idplano' => 2, 'idprofissional_criador' => 1,'idcontato' => 4,
            'nome' => 'Paciente 1', 'cpf'=>'00000000001', 'rg' => '00000001',
            'sexo' => 1,'data_nascimento' => '1987/01/05','foto' => NULL]);
        // ---
        DB::table('contato')->insert(['cep' => '0000003', 'estado' => 'PR',
            'cidade' => 'CURITIBA', 'bairro' => 'HAUER', 'logradouro' => 'RUA PACIENTE 2',  'complemento' => 'CASA 2',
            'celular' => '992334444', 'comercial' => '44334444']);
        DB::table('paciente')->insert(['idplano' => 2, 'idprofissional_criador' => 1,'idcontato' => 5,
            'nome' => 'Paciente 2', 'cpf'=>'00000000002', 'rg' => '00000002',
            'sexo' => 1,'data_nascimento' => '1987/02/05','foto' => NULL]);
        // ---
        DB::table('contato')->insert(['cep' => '0000004', 'estado' => 'PR',
            'cidade' => 'CURITIBA', 'bairro' => 'HAUER', 'logradouro' => 'RUA PACIENTE 3', 'complemento' => 'CASA 3',
            'telefone' => '52234444', 'comercial' => '55334444']);
        DB::table('paciente')->insert(['idplano' => 2, 'idprofissional_criador' => 1,'idcontato' => 6,
            'nome' => 'Paciente 3', 'cpf'=>'00000000003', 'rg' => '00000003',
            'sexo' => 1,'data_nascimento' => '1987/03/05','foto' => NULL]);
        // ---
        DB::table('contato')->insert(['cep' => '0000005', 'estado' => 'PR',
            'cidade' => 'CURITIBA', 'bairro' => 'HAUER', 'logradouro' => 'RUA PACIENTE 4', 'complemento' => 'CASA 4',
            'telefone' => '533656644', 'celular' => '66334444']);
        DB::table('paciente')->insert(['idplano' => 3, 'idprofissional_criador' => 2,'idcontato' => 7,
            'nome' => 'Paciente 4', 'cpf'=>'00000000004', 'rg' => '00000004',
            'sexo' => 0,'data_nascimento' => '1987/04/05','foto' => NULL]);
        // ---
        DB::table('contato')->insert(['cep' => '0000006', 'estado' => 'PR',
            'cidade' => 'CURITIBA', 'bairro' => 'HAUER', 'logradouro' => 'RUA PACIENTE 5',  'complemento' => 'CASA 5',
            'telefone' => '522334444', 'celular' => '77334444']);
        DB::table('paciente')->insert(['idplano' => 3, 'idprofissional_criador' => 2,'idcontato' => 8,
            'nome' => 'Paciente 5', 'cpf'=>'00000000005', 'rg' => '00000005',
            'sexo' => 0,'data_nascimento' => '1987/05/05','foto' => NULL]);

        // Anamnese de teste (2)
        DB::table('anamnese')->insert(['idprofissional_criador' => 1, 'nome' => 'Anamnese de Teste 1', 'data_criacao' => '2015/01/01']);
        DB::table('anamnese')->insert(['idprofissional_criador' => 2, 'nome' => 'Anamnese de Teste 2', 'data_criacao' => '2015/02/02']);
        // Perguntas da Anamnese 1
        for ($ind=1; $ind <=10; $ind++){
            if($ind<3){
                $tp = 0;
                $tr = 2;
            } else if($ind<5){
                $tp = 1;
                $tr = 1;
            } else {
                $tp = 2;
                $tr = 0;
            }
            DB::table('pergunta')->insert(['idanamnese' => 1, 'numero_ordem' => $ind, 'tipo_pergunta' => $tp, 'tipo_resposta' => $tr,
                'texto_pergunta' => 'Pergunta '.$ind.'?', 'msg_alerta' => 'Esse paciente possui um problema grave '.$ind.'!']);
        }
        // Perguntas da Anamnese 2
        for ($ind=1; $ind <=13; $ind++){
            if($ind<3){
                $tp = 1;
                $tr = 1;
            } else if($ind<5){
                $tp = 0;
                $tr = 2;
            } else {
                $tp = 2;
                $tr = 0;
            }
            DB::table('pergunta')->insert(['idanamnese' => 2, 'numero_ordem' => $ind, 'tipo_pergunta' => $tp, 'tipo_resposta' => $tr,
                'texto_pergunta' => 'Pergunta '.$ind.'?', 'msg_alerta' => 'Esse paciente possui um problema grave '.$ind.'!']);
        }

        // RESPOSTAS SERÃO TESTADAS POR BROWSER
        // Retorno (Pacientes 1 e 2)
        DB::table('retorno')->insert(['idprofissional_criador' => 1, 'idprofissional' => 1, 'idpaciente' => 1, 'data_retorno' => '2016/10/01',
            'motivo_retorno' => 'Paciente retonará por motivo 1', 'observacao' => 'Observação teste 1!']);
        DB::table('retorno')->insert(['idprofissional_criador' => 1, 'idprofissional' => 2, 'idpaciente' => 2, 'data_retorno' => '2016/10/02',
            'motivo_retorno' => 'Paciente retonará por motivo 2', 'observacao' => 'Observação teste 2!']);

        // Consultas (Pacientes 3 e 4)
        DB::table('consulta')->insert(['idprofissional_criador' => 1, 'idprofissional' => 1, 'idpaciente' => 3,
            'data_consulta' => '2016-06-06','dia_inteiro' => 0, 'hora_inicio' => '13:00', 'hora_termino' => '18:00:00',
            'observacao' => 'Observação teste da consulta 1!', 'tipo_consulta' => 'Atendimento']);
        DB::table('consulta')->insert(['idprofissional_criador' => 2, 'idprofissional' => 2, 'idpaciente' => 4,
            'data_consulta' => '2016-06-06','dia_inteiro' => 0, 'hora_inicio' => '17:00', 'hora_termino' => '19:30:00',
            'observacao' => NULL, 'tipo_consulta' => 'Cirurgia']);

        // Orçamentos
        DB::table('orcamento')->insert([
            'descricao'         => 'Orçamento 1',
            'idprofissional'    => 1,
            'idpaciente'        => 1,
            'valor_total'       => 5000,
            'desconto'          => 10,
            'valor_entrada'     => 100,
            'numero_parcelas'   => 5,
            'aprovacao'         => 0
        ]);
        // item Orçamentos
        DB::table('item_orcamento')->insert([
            'idorcamento'   => 1,
            'idintervencao' => 1,
            'regiao'        => 'D1',
            'valor'         => '2000'
        ]);
        DB::table('item_orcamento')->insert([
            'idorcamento'   => 1,
            'idintervencao' => 2,
            'regiao'        => 'D2',
            'valor'         => '2000'
        ]);
        DB::table('item_orcamento')->insert([
            'idorcamento'   => 1,
            'idintervencao' => 3,
            'regiao'        => 'D3',
            'valor'         => '2000'
        ]);

        DB::table('orcamento')->insert([
            'descricao'         => 'Orçamento 2',
            'idprofissional'    => 2,
            'idpaciente'        => 2,
            'valor_total'       => 2000,
            'desconto'          => 8,
            'valor_entrada'     => 500,
            'numero_parcelas'   => 5,
            'aprovacao'         => 0
        ]);
        // item Orçamentos
        DB::table('item_orcamento')->insert([
            'idorcamento'   => 2,
            'idintervencao' => 1,
            'regiao'        => 'D1',
            'valor'         => '1000'
        ]);
        DB::table('item_orcamento')->insert([
            'idorcamento'   => 2,
            'idintervencao' => 2,
            'regiao'        => 'D2',
            'valor'         => '500'
        ]);
        DB::table('item_orcamento')->insert([
            'idorcamento'   => 2,
            'idintervencao' => 3,
            'regiao'        => 'D3',
            'valor'         => '500'
        ]);

    }
}
