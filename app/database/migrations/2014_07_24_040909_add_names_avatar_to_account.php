<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNamesAvatarToAccount extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('account', function($table)
		{
	    $table->string('name', 50)->after('email')->default('');
	    $table->string('nick_name', 50)->after('name')->default('');
	    $table->string('avatar_url')->after('nick_name')->default('');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('account', function($table)
		{
	    $table->dropColumn(array('name', "nick_name", "avatar_url"));		    
		});
	}

}
