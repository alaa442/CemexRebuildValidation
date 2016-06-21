<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentsAwardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('award_present', function(Blueprint $table)
		{
			$table->integer('prese_id')->unsigned();
			$table->integer('award_id')->unsigned();
			$table->integer('Amount')->unsigned();

			$table->foreign('prese_id')
			      ->references('Presents_Id')->on('presents')
			      ->onDelete('cascade')
			      ->onupdate('cascade');
		    $table->foreign('award_id')
			      ->references('Awards_Id')->on('awards')
			      ->onDelete('cascade')
			      ->onupdate('cascade');

			     
			     
			 $table->primary(['award_id', 'prese_id','Amount']);

			       $table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('award_present');
	}

}
