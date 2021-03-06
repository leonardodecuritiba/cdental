<?php

use Illuminate\Database\Seeder;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Contato de teste (2 profissionais / 5 pacientes)
        // Profissional ---
        DB::table('contato')->insert(['cep' => '0000000', 'estado' => 'PR',
            'cidade' => 'CURITIBA', 'bairro' => 'HAUER', 'logradouro' => 'RUA PROFISSIONAL', 'complemento' => 'CASA 1',
            'telefone' => '33334444', 'celular' => '99998888', 'created_at' => '2017-01-01 10:00:00']);
        DB::table('users')->insert(['email' => 'drvsilva@gmail.com', 'password' => bcrypt('123'), 'remember_token' => str_random(10), 'created_at' => '2017-01-01 10:00:00']);
        DB::table('profissional')->insert(['idusers' => 1, 'idcontato' => 1, 'nome' => 'Vinicius','cpf' => '00112233444', 'cro' => '1122334455','foto'=>NULL, 'created_at' => '2017-01-01 10:00:00']);

        // ---
        DB::table('contato')->insert(['cep' => '0000001', 'estado' => 'PR',
            'cidade' => 'CURITIBA', 'bairro' => 'HAUER', 'logradouro' => 'RUA PROFISSIONAL', 'complemento' => 'CASA 2',
            'telefone' => '53334444', 'celular' => '89998888', 'created_at' => '2017-01-01 10:00:00']);
        DB::table('users')->insert(['email' => 'silva.zanin@gmail.com', 'password' => bcrypt('123'), 'remember_token' => str_random(10), 'created_at' => '2017-01-01 10:00:00']);
        DB::table('profissional')->insert(['idusers' => 2, 'idcontato' => 2, 'nome' => 'Profissional LEONARDO','cpf' => '0011112244', 'cro' => '112114455','foto'=>NULL, 'created_at' => '2017-01-01 10:00:00']);


        DB::table('contato')->insert(['cep' => '0000001', 'estado' => 'PR',
            'cidade' => 'CURITIBA', 'bairro' => 'HAUER', 'logradouro' => 'RUA PROFISSIONAL', 'complemento' => 'CASA 2',
            'telefone' => '53334444', 'celular' => '89998888', 'created_at' => '2017-01-01 10:00:00']);
        DB::table('clinica')->insert(['idresponsavel' => 1, 'idcontato' => 3, 'nome' => 'Clinica','email' => 'clinica@email.com','cnpj' => '100000111111111', 'created_at' => '2017-01-01 10:00:00']);


//        Criando as permisões
        $profissional = new Role();
        $profissional->name         = 'profissional';
        $profissional->display_name = 'Profissional'; // optional
        $profissional->description  = 'Acesso total ao sistema'; // optional
        $profissional->save();

        $equipe = new Role();
        $equipe->name         = 'equipe';
        $equipe->display_name = 'Equipe'; // optional
        $equipe->description  = 'Acesso restrito ao sistema'; // optional
        $equipe->save();

        $user = \App\User::find(1);
        $user->attachRole(1); // parameter can be an Role object, array, or id
        $user = \App\User::find(2);
        $user->attachRole(1); // parameter can be an Role object, array, or id

        // Tipos de pagamentos)
        DB::table('tipo_pagamento')->insert(['nome' => 'Cartão de Crédito', 'created_at' => '2017-01-01 10:00:00']);
        DB::table('tipo_pagamento')->insert(['nome' => 'Cheque', 'created_at' => '2017-01-01 10:00:00']);
        DB::table('tipo_pagamento')->insert(['nome' => 'Dinheiro', 'created_at' => '2017-01-01 10:00:00']);

        // Intervenções de teste
        DB::table('intervencao')->insert(['codigo' => '5002','nome' => 'Coroa Provisória', 'regiao' => '','valor' => 400, 'created_at' => '2017-03-28 10:00:00']); // idintervencao = 1
        DB::table('intervencao')->insert(['codigo' =>  '5004','nome' => 'Prótese Total', 'regiao' => '','valor' => 2500, 'created_at' => '2017-03-28 10:00:00']); // idintervencao = 2
        DB::table('intervencao')->insert(['codigo' =>  '5005','nome' => 'Prótese Total Caracterizada', 'regiao' => '','valor' => 3000, 'created_at' => '2017-03-28 10:00:00']); // idintervencao = 3

        // Planos de teste
        DB::table('plano')->insert(['nome' => 'Particular', 'plano_status' => 1]); // idplano = 2

        DB::table('plano_intervencao')->insert(['idintervencao' => 1, 'idplano' => 1,'valor_plano' => 400, 'created_at' => '2017-03-28 10:00:00']);
        DB::table('plano_intervencao')->insert(['idintervencao' => 2, 'idplano' => 1,'valor_plano' => 2500, 'created_at' => '2017-03-28 10:00:00']);
        DB::table('plano_intervencao')->insert(['idintervencao' => 3, 'idplano' => 1,'valor_plano' => 3000, 'created_at' => '2017-03-28 10:00:00']);

        DB::table('anamnese')->insert(['idprofissional_criador' => 1, 'nome' => 'Principal', 'created_at' => '2017-03-28 10:00:00']);

        DB::insert("INSERT INTO `pergunta` (`idpergunta`, `idanamnese`, `numero_ordem`, `tipo_pergunta`, `tipo_resposta`, `texto_pergunta`, `msg_alerta`, `created_at`, `updated_at`, `deleted_at`) VALUES
                    (1, 1, 1, 1, 1, 'Possui algum problema de saúde?', '', '2017-03-28 17:17:01', '2017-03-28 17:17:01', NULL),
                    (2, 1, 2, 0, 0, 'Possui problemas cardíacos?', 'Problemas Cardíacos', '2017-03-28 17:17:54', '2017-03-28 17:17:54', NULL),
                    (3, 1, 3, 0, 0, 'Possui Diabetes?', 'Diabético', '2017-03-28 17:18:17', '2017-03-28 17:18:27', NULL),
                    (4, 1, 4, 1, 1, 'Algum problema com anestesia?', 'Problemas com anestesia', '2017-03-28 17:19:02', '2017-03-28 17:19:02', NULL),
                    (5, 1, 5, 1, 1, 'Faz uso de algum rémedio de uso diário?', 'Utiliza remédios de uso diário', '2017-03-28 17:19:39', '2017-03-28 17:19:39', NULL),
                    (6, 1, 6, 0, 0, 'Faz uso de bifosfonato?', 'Utiliza Bifosfonato', '2017-03-28 17:20:12', '2017-03-28 17:20:12', NULL),
                    (7, 1, 7, 1, 1, 'Esta fazendo algum tratamento médico?', 'Em ttratamento médico', '2017-03-28 17:20:58', '2017-03-28 17:20:58', NULL);");
    }
}
