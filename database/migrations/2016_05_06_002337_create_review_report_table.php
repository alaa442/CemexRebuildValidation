<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_reports', function (Blueprint $table) {
            $table->increments('Review_Id');

            $table->string('Long', 500)->nullable();
            $table->string('Lat', 500)->nullable();

            $table->string('Project_NO')->nullable();
            $table->string('Portland_Cement')->nullable();
            $table->string('Resisted_Cement')->nullable();
            $table->string('Eng_Cement')->nullable();
            $table->string('Saed_Cement')->nullable();
            $table->string('Fanar_Cement')->nullable(); 
            $table->string('Workers')->nullable();            
            $table->string('Cement_Consuption')->nullable();
            $table->string('Cement_Bricks')->nullable();
            $table->string('Steel_Consumption')->nullable();

            $table->string('Has_Wood')->nullable();

            $table->string('Wood_Meters')->nullable();
            $table->string('Wood_Consumption')->nullable();

            $table->string('Has_Mixers')->nullable();

            $table->integer('No_Of_Mixers')->nullable();
            $table->string('Capital', 150)->nullable();
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
        //
    }
}
