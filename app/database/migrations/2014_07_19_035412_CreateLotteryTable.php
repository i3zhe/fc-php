<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lottery', function(Blueprint $table)
		{
			$table->engine = "InnoDB";

			$table->increments("id");
			$table->string("name", 50);
			$table->integer("price");
			$table->integer("time_cycle")->default(0);
      $table->string("drawing_time")->default('');
      $table->dateTime("last_drawing_time")->nullable()->default(null);
			
      $table->integer('category_id');

			$table->dateTime("created_at");
      $table->dateTime("updated_at");
      $table->dateTime("deleted_at")->nullable()->default(null);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("lottery");
	}

}
