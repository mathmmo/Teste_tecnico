<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateItemsTable.
 */
class CreateItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table) {
            $table->increments('id');
			//item information
			$table->integer('refund_id')->unsined();
			$table->integer('type_id' )->unsined();
			$table->float('value');
			$table->date('use_date');
			
			$table->timestamps();

			//foreign key
			$table->foreign('refund_id')->references('id')->on('refunds');
            $table->foreign('type_id')->references('id')->on('types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('', function (Blueprint $table){
			$table->dropForeign('items_refund_id_foreign');
			$table->dropForeign('items_type_id_foreign');
		});
		Schema::drop('items');
	}
}
