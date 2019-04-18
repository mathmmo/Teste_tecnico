<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Refund extends Migration
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
			//request information
			$table->integer('user_id')->unsined();
			$table->int('status', 1);
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
		Schema::drop('refund');
    }
}
