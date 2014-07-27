f<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("order_item", function($table)
    {
      $table->engine = "InnoDB";
      
      $table->increments("id");
      $table->integer("order_id");
      $table->integer("lottery_id");
      $table->integer("quantity");
      $table->float("price");
      $table->string("status", 50);

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
		Schema::dropIfExists("order_item");
	}

}
