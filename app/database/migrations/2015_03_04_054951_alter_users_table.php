<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::update('ALTER TABLE qroche.users CHANGE COLUMN `estado` `estado` CHAR(1) NOT NULL DEFAULT "P"');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::update('ALTER TABLE qroche.users CHANGE COLUMN `estado` `estado` CHAR(1) NOT NULL DEFAULT "A"');
	}

}
