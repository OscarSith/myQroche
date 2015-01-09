<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDniUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::update('ALTER TABLE qroche.users CHANGE COLUMN dni `dni` CHAR(8)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::update('ALTER TABLE qroche.users CHANGE COLUMN dni `dni` CHAR(7)');
	}

}
