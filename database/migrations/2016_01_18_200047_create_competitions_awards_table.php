<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionsAwardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('award_competition', function(Blueprint $table)
		{
			
			$table->integer('Total_Amount')->unsigned();
			$table->integer('competition_id')->unsigned();
			$table->integer('award_id')->unsigned();
			
			$table->foreign('competition_id')
			      ->references('Competitions_Id')->on('competitions')
			      ->onDelete('cascade')
			      ->onupdate('cascade');
		    $table->foreign('award_id')
			      ->references('Awards_Id')->on('awards')
			      ->onDelete('cascade')
			      ->onupdate('cascade');
			     
			     $table->primary(['award_id', 'competition_id','Total_Amount']);
			     
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
		Schema::drop('award_competition');
	}

}
