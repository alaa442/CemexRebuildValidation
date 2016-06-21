<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('presents', function(Blueprint $table)
		{
			$table->increments('Presents_Id');
			$table->integer('contractor_id')->unsigned();
			$table->integer('Ranking')->unsigned();
			$table->timestamps();
			$table->date('Delivery_Date');
			$table->integer('competition_id')->unsigned();
            $table->foreign('competition_id')
			      ->references('Competitions_Id')->on('competitions')
			      ->onDelete('cascade')
			      ->onupdate('cascade');
		    $table->foreign('contractor_id')
			      ->references('Contractor_Id')->on('contractors')
			      ->onDelete('cascade')
			      ->onupdate('cascade');
	

					});
	}

	/**
	 * Reverse the migrations.

	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('presents');
	}

}
