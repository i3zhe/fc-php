<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("account", function($table)
    {
      $table->engine = "InnoDB";
      
      $table->increments("id");
      $table->string("email")->default('');
      $table->string("password")->default('');
      $table->dateTime("created_at");
      $table->dateTime("updated_at");
      $table->dateTime("deleted_at")->nullable();
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("account");
	}

}
