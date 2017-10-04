<?php

use Illuminate\Database\Seeder;

class ChangeFullDBSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//php artisan db:seed --class=ChangeFullDBSeeder
		$start = microtime( true );
		$faker = Faker\Factory::create( 'pt_BR' );

		foreach ( \App\Paciente::all() as $dt ) {
			$data = [
				'nome' => $faker->name,
				'cpf'  => $faker->cpf( false ),
				'rg'   => $faker->rg( false ),
			];
			$dt->update( $data );
		}
		$this->command->info( 'Paciente complete: in ' . round( ( microtime( true ) - $start ), 3 ) . 's ...' );

		foreach ( \App\Contato::all() as $dt ) {
			$data = [
				'email'       => $faker->safeEmail,
				'telefone'    => $faker->areaCode() . $faker->landline( false ),
				'celular'     => $faker->areaCode() . $faker->cellphone( false, true ),
				'comercial'   => $faker->areaCode() . $faker->landline( false ),
				'cep'         => $faker->randomNumber( $nbDigits = 8 ),
				'estado'      => $faker->stateAbbr,
				'cidade'      => $faker->city,
				'bairro'      => $faker->streetName,
				'logradouro'  => $faker->streetName,
				'complemento' => $faker->word,
			];
			$dt->update( $data );
		}
		$this->command->info( 'Contato complete: in ' . round( ( microtime( true ) - $start ), 3 ) . 's ...' );

		foreach ( \App\Models\Cheque::all() as $dt ) {
			$data = [
				'nome'      => $faker->name,
				'banco'     => $faker->word,
				'numeracao' => $faker->randomNumber( $nbDigits = 8 ),
				'destino'   => $faker->word . $faker->randomNumber( $nbDigits = 3 ),
			];
			$dt->update( $data );
		}
		$this->command->info( 'Cheque complete: in ' . round( ( microtime( true ) - $start ), 3 ) . 's ...' );

		foreach ( \App\Evolucao::all() as $dt ) {
			$data = [
				'texto' => $faker->sentence( $nbWords = 6, $variableNbWords = true ),
			];
			$dt->update( $data );
		}
		$this->command->info( 'Evolucao complete: in ' . round( ( microtime( true ) - $start ), 3 ) . 's ...' );
		foreach ( \App\Orcamento::all() as $dt ) {
			$data = [
				'descricao' => $faker->sentence( $nbWords = 6, $variableNbWords = true ),
			];
			$dt->update( $data );
		}

		$this->command->info( 'ChangeFullDBSeeder complete: in ' . round( ( microtime( true ) - $start ), 3 ) . 's ...' );

	}
}
