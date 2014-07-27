<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteryCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lottery_category', function(Blueprint $table)
		{
			$table->engine = "InnoDB";

			$table->increments("id");
      $table->string("name")->default('');
      $table->string("description")->default('');

      $table->dateTime("created_at");
      $table->dateTime("updated_at");
      $table->dateTime("deleted_at")->default(null);      
      
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("lottery_category");
	}

}
