<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('competitions', function(Blueprint $table)
		{
			$table->increments('Competitions_Id')->unique();
			$table->timestamps();
			$table->string('Code',40)->unique();
			$table->string('Government',150);
			$table->string('City',150)->nullable();
			$table->string('Name', 150);	
			$table->integer('Period')->unsigned();
			$table->date('Start_Date');
			$table->date('End_Date');



		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('competitions');
	}

}
