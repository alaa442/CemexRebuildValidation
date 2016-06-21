<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('Review_Id');

            $table->float('Long')->nullable();
            $table->float('Lat')->nullable();

            $table->integer('Project_NO')->nullable()->unsigned();
            $table->integer('Portland_Cement')->nullable()->unsigned();
            $table->integer('Resisted_Cement')->nullable()->unsigned();
            $table->integer('Eng_Cement')->nullable()->unsigned();
            $table->integer('Saed_Cement')->nullable()->unsigned();
            $table->integer('Fanar_Cement')->nullable()->unsigned(); 
            $table->integer('Workers')->nullable()->unsigned();            
            $table->integer('Cement_Consuption')->nullable()->unsigned();
            $table->integer('Cement_Bricks')->nullable()->unsigned();
            $table->integer('Steel_Consumption')->nullable()->unsigned();

            $table->string('Has_Wood')->nullable();

            $table->integer('Wood_Meters')->nullable()->unsigned();
            $table->integer('Wood_Consumption')->nullable()->unsigned();

            $table->string('Has_Mixers')->nullable();

            $table->integer('No_Of_Mixers')->nullable()->unsigned();
            $table->integer('Capital')->nullable()->unsigned();
            $table->string('Credit_Debit')->nullable();

            $table->string('Has_Sub_Contractor', 150)->nullable();
            $table->string('Sub_Contractor1', 150)->nullable();
            $table->string('Sub_Contractor2', 150)->nullable();

            $table->string('Seller1', 50)->nullable();
            $table->string('Seller2', 50)->nullable();
            $table->string('Seller3', 50)->nullable();
            $table->string('Seller4', 50)->nullable();
            $table->string('Status',50)->nullable();
            $table->string('Call_Status',50)->nullable();
            $table->string('Area',50)->nullable();
            $table->string('Cont_Type',50)->nullable();


            $table->timestamps();
            
            $table->integer('Contractor_Id')->unsigned();
            $table->foreign('Contractor_Id')->references('Contractor_Id')->on('contractors')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reviews');
    }
}
