<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('awards', function(Blueprint $table)
		{
			$table->increments('Awards_Id');
			$table->timestamps();
			$table->string('Name', 100)->unique();
			$table->integer('Total_Amount')->unsigned();
			$table->decimal('Cost')->unsigned();
			$table->integer('Status')->unsigned();		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('awards');
	}

}
