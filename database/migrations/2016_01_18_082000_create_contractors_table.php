<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractors', function (Blueprint $table) {
            $table->increments('Contractor_Id')->unsigned();
            $table->string('Name', 150);
            $table->string('Goverment', 100)->nullable();
            $table->string('City', 100)->nullable();
            $table->string('Address', 150)->nullable();
            $table->string('Education')->nullable();
            $table->string('Has_Facebook', 150)->nullable();
            $table->string('Facebook_Account', 150)->nullable();
            $table->string('Computer')->nullable();
            $table->string('Email', 150)->nullable();
            $table->date('Birthday')->nullable();
            $table->integer('Tele1')->unique()->unsigned()->default(null);
            $table->integer('Tele2')->unique()->nullable()->unsigned()->default(null);
            $table->string('Job', 100)->nullable();
            $table->string('Class', 50)->nullable();
            $table->string('Phone_Type')->nullable();
            $table->string('Nickname', 50)->nullable();
            $table->integer('Pormoter_Id')->unsigned()->nullable();
            $table->foreign('Pormoter_Id')
                  ->references('Pormoter_Id')->on('promoters')
                  ->onDelete('cascade')
                  ->onupdate('cascade');

            $table->string('Religion')->nullable();
            $table->integer('Home_Phone')->unique()->nullable()->unsigned()->default(null);
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
        Schema::drop('contractors');
    }
}

