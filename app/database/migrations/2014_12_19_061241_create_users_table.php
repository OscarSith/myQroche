<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('dni', 7)->unique();
			$table->string('nombre');
			$table->string('apellido');
			$table->char('genero', 1);
			$table->string('alias')->unique();
			$table->date('nacimiento');
			$table->string('email')->unique();
			$table->string('telefono');
			$table->string('celular');
			$table->char('estado', 1)->default('A');
			$table->text('post');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
