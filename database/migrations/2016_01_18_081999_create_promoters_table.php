<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promoters', function (Blueprint $table) {
            $table->increments('Pormoter_Id')->unsigned();
            $table->string('Pormoter_Name',120);
            $table->integer('TelephonNo')->unique();
            $table->string('Government',150)->nullable();
            $table->string('City',150)->nullable();
            $table->string('Email',200)->unique();
            $table->string('Facebook_Account',200)->nullable();
            $table->string('Instegram_Account',200)->nullable();
            $table->string('User_Name',120)->unique();
            $table->string('Password',100)->unique();
            $table->string('Code',40)->unique();
            $table->integer('Experince')->nullable();
            $table->date('Start_Date');
            $table->integer('Salary');




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
        Schema::drop('promoters');
    }
}
