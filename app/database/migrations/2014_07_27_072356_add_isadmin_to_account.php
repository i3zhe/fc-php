<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsadminToAccount extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('account', function(Blueprint $table)
		{
			$table->boolean("is_admin")->after("alipay_email")->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('account', function(Blueprint $table)
		{
			$table->dropColumn("is_admin");
		});
	}

}
