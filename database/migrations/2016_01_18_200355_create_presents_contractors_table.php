<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentsContractorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('presents_contractors', function(Blueprint $table)
		{		

            $table->integer('Present_Id')->unsigned();
			$table->integer('Contractor_Id')->unsigned();
			$table->foreign('Present_Id')
			      ->references('Presents_Id')->on('presents')
			      ->onDelete('cascade')
			      ->onupdate('cascade');
		    $table->foreign('Contractor_Id')
			      ->references('Contractor_Id')->on('contractors')
			      ->onDelete('cascade')
			      ->onupdate('cascade');
			     
			$table->integer('Ranking');
			$table->timestamps();
			$table->primary(['Present_Id', 'Contractor_Id','Ranking']);
		});
	}


	/**
	 * Reverse the migrations.
	 *



	 * @return void
	 */
	public function down()
	{
		Schema::drop('presents_contractors');
	}

}
