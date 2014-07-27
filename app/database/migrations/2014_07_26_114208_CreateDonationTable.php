<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donation', function(Blueprint $table)
		{
			$table->engine = "InnoDB";

      $table->increments("id");
      $table->integer("account_id");
      $table->integer("acceptor_id");
      $table->float("amount");

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
		Schema::dropIfExists("donation");
	}

}
