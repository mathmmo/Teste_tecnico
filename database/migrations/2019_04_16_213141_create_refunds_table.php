<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateRefundsTable.
 */
class CreateRefundsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('refunds', function(Blueprint $table) {
            $table->increments('id');
			//item information
			$table->integer('user_id')->unsined();
			$table->varchar('type_id', 50);
			$table->float('value');
			$table->date('use_date');
			
			$table->timestamps();

			//foreign key
			$table->foreign('user_id')->references('id')->on('users');
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
			$table->dropForeign('refund_userid_foreign');
		});
		Schema::drop('refunds');
	}
}
