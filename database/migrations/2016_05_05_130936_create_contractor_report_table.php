<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_reports', function (Blueprint $table) {
            $table->increments('Contractor_Id')->unsigned();
            $table->string('Name', 150);
            $table->string('Goverment', 100);
            $table->string('City', 100)->nullable();
            $table->string('Address', 150)->nullable();
            $table->string('Education')->nullable();
            $table->string('Has_Facebook', 150)->nullable();
            $table->string('Facebook_Account', 150)->nullable();
            $table->string('Computer')->nullable();
            $table->string('Email', 150)->nullable();
            $table->string('Birthday')->nullable();
            $table->string('Tele1')->unique();
            $table->string('Tele2')->unique()->nullable();
            $table->string('Job', 100)->nullable();
            $table->string('Class', 50)->nullable();
            $table->string('Phone_Type')->nullable();
            $table->string('Nickname', 50)->nullable();
            $table->integer('Pormoter_Id')->unsigned();
            $table->foreign('Pormoter_Id')
                  ->references('Pormoter_Id')->on('promoters')
                  ->onDelete('cascade')
                  ->onupdate('cascade');

            $table->string('Religion')->nullable();
            $table->string('Home_Phone')->unique()->nullable();
            $table->string('Code',40)->unique();
            $table->string('Fame',40)->nullable();        

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
        //
    }
}
