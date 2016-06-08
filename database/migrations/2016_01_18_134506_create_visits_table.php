<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('Visits_id')->unsigned();
            $table->string('Government',150);
            $table->string('City',150);
            $table->integer('Month');
            $table->string('Adress',150);
            $table->string('GPS',500)->nullable();
            $table->string('Backcheck')->nullable();
            $table->string('Comments',100)->nullable();
            $table->string('Project_Type')->nullable();
            $table->string('Project_Current_State',300)->nullable();
            $table->string('Cement_Type')->nullable();
            $table->integer('Cement_Quantity')->nullable();
            $table->string('Visit_Reason')->nullable();
            $table->string('Call_Reason')->nullable();
            $table->date('Date_Visit_Call');
            $table->integer('Points')->nullable();
            $table->integer('OrderNo')->nullable();
            $table->string('CV_Comments',500)->nullable();
            $table->string('Seller_Name')->nullable();
            $table->string('Project_Type_Comments',500)->nullable();
            $table->integer('Pormoter_Id')->unsigned();
            $table->integer('Contractor_Id')->unsigned();

            $table->foreign('Pormoter_Id')->references('Pormoter_Id')->on('promoters')
                                          ->onDelete('cascade')
                                          ->onUpdate('cascade');
             
             

             $table->foreign('Contractor_Id')->references('Contractor_Id')->on('contractors')
                                            ->onDelete('cascade')
                                            ->onupdate('cascade');

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
        Schema::drop('visits');
        Schema::drop('promoters');

    }
}