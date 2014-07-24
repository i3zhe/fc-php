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
	    $table->string('name', 50)->after('email');
	    $table->string('nick_name', 50)->after('name');
	    $table->string('avatar_url')->after('nick_name');
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
